<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\Developer;
use App\Models\EstateType;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $data = Project::with(['developer'=>function($query){
            $query->with('brand');
        }])->paginate(20);
        return view('module.project.index',compact('data'));
    }


    public function create()
    {
        $data['brand'] = Developer::select('id','name','brand_id')->with('brand')->get();
        $data['project_type'] = ProjectType::all();
        return view('module.project.create',compact('data'));
    }

   
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'name'          =>'required|min:3|unique:projects | max:100',
                'type'          =>'required',
                'district_id'   =>'required',
            ]);
            
            Project::create([
                'name'          =>$request->name,
                'type_id'       =>$request->type,
                'developer_id'  =>$request->developer_id,
                'address'       =>$request->address,
                'district_id'   =>$request->district_id,
                'amphure_id'    =>$request->amphure_id,
                'province_id'   =>$request->province_id,
                'location'      =>$request->location,
                'des'           =>$request->des,
            ]);
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
        return redirect()->route('project.index')->with('success','Project : '.$request->name.' is Create Successfully.');
        
        
    }


    public function show(Project $project)
    {
        $data = Project::with(
            [
            'project_type',
            'developer'=>function($query){
                $query->select('id','name','brand_id')->with(['brand' => function($query){
                    $query->select('id','name');
                }]);
            },'district'=>function($query){
                $query->with(['amphure' => function($query){
                    $query->with('province');
                }]);
            }
            ])
        ->where('id',$project->id)->first();

        // return response()->json($data);
        return view('module.project.view',compact('data'));
    }

    
    public function edit(Project $project)
    {
        $data['brand'] = Developer::select('id','name','brand_id')->with('brand')->get();
        $data['project_type'] = ProjectType::all();
        $data['project'] = Project::where('id',$project->id)->with(['district'=>function($query){
            $query->with(['amphure' => function($query){
                $query->with('province');
            }]);
        }])->first();
        return view('module.project.edit',compact('data'));
    }


    public function update(Request $request, Project $project)
    {
        try{
            $this->validate($request,[
                'name'          =>'required|min:3| max:100|unique:projects,name,'.$project->id,
                'type'          =>'required',
                'district_id'   =>'required',
            ]);
            
            $project->update([
                'name'          =>$request->name,
                'type_id'       =>$request->type,
                'developer_id'  =>$request->developer_id,
                'address'       =>$request->address,
                'district_id'   =>$request->district_id,
                'amphure_id'    =>$request->amphure_id,
                'province_id'   =>$request->province_id,
                'location'      =>$request->location,
                'des'           =>$request->des,
            ]);
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
        return redirect()->route('project.index')->with('success','Project '.$request->name.' is Update Successfully.');

    }

  
    public function destroy(Project $project)
    {
        try{
            $project->delete();
            return redirect()->route('project.index')->with('Success','Project '.$project->name.' is Deleted Successfully.');
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }
}
