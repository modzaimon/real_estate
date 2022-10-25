<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\EstateType;
use App\Models\Project;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstateController extends Controller
{
    
    public function index()
    {
        $data = Estate::with(['project'=>function($query){
            $query->with(['developer']);
        },'estate_type'])
        
        ->paginate(20);
        return view('module.estate.index',compact('data'));
    }

    public function create()
    {
        $data['estate_type'] = EstateType::all();
        $data['project'] = Project::all();
        $data['unit'] = Unit::all();
        return view('module.estate.create',compact('data'));
    }

    
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'number'    =>'required|min:3|max:20',
                'price'     =>'required|numeric',
                'size'     =>'numeric',
                'type'      =>'required',
                'size'     =>'date_format:Y', 

            ]);
            // return $request->all();
            Estate::create([
                'number'        =>$request->number,
                'deed_no'       =>$request->deed_no,
                'project_id'    =>$request->project_id,
                'type_id'       =>$request->type,
                'size'          =>$request->size,
                'unit_id'       =>$request->unit_id,
                'price'         =>$request->price,
                'build_year'    =>$request->build_year,
                'des'           =>$request->des,
            ]);
        }catch(Exception $e){
            return back()->with('error',$e->getMessage())->withInput();
        }

        return redirect()->route('estate.index')->with('Success','Estate is Create Successfully.');
    }

    
    public function show(Estate $estate)
    {
        $data = $estate->with(['project','estate_type','unit'])->where('id',$estate->id)->first();   
        return view('module.estate.view',compact('data'));
    }

    
    public function edit(Estate $estate)
    {
        $data['estate_type'] = EstateType::all();
        $data['project'] = Project::all();
        $data['unit'] = Unit::all();
        $data['estate'] = $estate->with(['project','estate_type','unit'])->where('id',$estate->id)->first();   
        return view('module.estate.edit',compact('data'));
    }

    
    public function update(Request $request, Estate $estate)
    {
        try{
            $this->validate($request,[
                'number'    =>'required|min:3|max:20',
                'price'     =>'required|numeric',
                'size'     =>'numeric',
                'type'      =>'required',
                'size'     =>'date_format:Y', 
            ]);

            $estate->update([
                'number'        =>$request->number,
                'deed_no'       =>$request->deed_no,
                'project_id'    =>$request->project_id,
                'type_id'       =>$request->type,
                'size'          =>$request->size,
                'unit_id'       =>$request->unit_id,
                'price'         =>$request->price,
                'build_year'    =>$request->build_year,
                'des'           =>$request->des,
            ]);

        }catch(Exception $e){
            return back()->with('error',$e->getMessage())->withInput();
        }
        return redirect()->route('estate.index')->with('Success','Estate is Updated Successfully.');
    }

    
    public function destroy(Estate $estate)
    {
        try{
            $estate->delete();
        }catch(Exception $e){
            return back()->with('error',$e->getMessage())->withInput();
        }
        return redirect()->route('estate.index')->with('Success','Estate is Deleted Successfully.');

    }

    public function getEstateByName(Request $request)
    {
        try{
            // return response()->json(
            //     Estate::select('id','number','project_id')
            //         ->with(['project'=>function($query){
            //             $query->with(['developer'=>function($query){
            //                 $query->select('id','name','brand_id')->with(['brand'=>function($query){
            //                     $query->select('id','name');
            //                 }]);
            //             }])->select('id','name','developer_id');
            //         }])
            //     ->get()
            // );
            return response()->json(
                DB::table('estates as e')
                    ->join('projects as p','e.project_id','=','p.id')
                    ->join('developers as d','p.developer_id','=','d.id')
                    ->join('brands as b','d.brand_id','=','b.id')
                    ->where('e.number','LIKE','%'.$request->name.'%')
                    ->orwhere('p.name','LIKE','%'.$request->name.'%')
                    ->orwhere('b.name','LIKE','%'.$request->name.'%')
                    ->get(['e.id','e.number','p.name as project_name','d.name as developer_name','b.id as brand_id','b.name as brand_name'])
            );

        }catch(Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
