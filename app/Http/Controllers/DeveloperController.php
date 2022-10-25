<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{

    public function index()
    {

        $data = Developer::with('brand')->paginate(20);
        return view('module.developer.index',compact('data'));

    }

    public function create()
    {
        $data = Brand::all();
        return view('module.developer.create',compact('data'));
    }


    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'brand_id'      =>'required',
                'name'          =>'required|min:3|max:100|unique:developers'
            ]);

            Developer::create([
                'brand_id'  => $request->brand_id,
                'name'      => $request->name,
                'des'       => $request->des,
            ]);
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
        return redirect()->route('developer.index')->with('success',"Developer ".$request->name." is Create successfully.");
    }

    public function show(Developer $developer)
    {
        return view('module.developer.view')->with('data',$developer);
        
    }

    public function edit(Developer $developer)
    {   
        $brand = Brand::all();
        return view('module.developer.edit')->with('data',$developer)->with('brand',$brand);
        
    }

    public function update(Request $request, Developer $developer)
    {
        try{
            $this->validate($request,[
                'brand_id'      =>'required',
                'name'          =>'required|min:3|max:100|unique:developers,name,'.$developer->id
            ]);

            $developer->update([
                'name'      => $request->name,
                'des'       => $request->des,
            ]);
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
        return redirect()->route('developer.index')->with('success',"Developer ".$request->name." is Update successfully.");
    }

 
    public function destroy(Developer $developer)
    {
        try{
            $developer->delete();
            return redirect()->route('developer.index')->with('success',"Developer ".$developer->name." is Deleted successfully.");
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }
}
