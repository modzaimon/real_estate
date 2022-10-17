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
        return view('developer.index',compact('data'));

    }

    public function create()
    {
        $data = Brand::all();
        return view('developer.create',compact('data'));
    }


    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'brand_id'      =>'required',
                'name'          =>'required|min:3|max:255|unique:developers',
                'des'           =>'max:255',
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
        return view('developer.view')->with('data',$developer);
        
    }

    public function edit(Developer $developer)
    {   
        $brand = Brand::all();
        return view('developer.edit')->with('data',$developer)->with('brand',$brand);
        
    }

    public function update(Request $request, Developer $developer)
    {
        try{
            $this->validate($request,[
                'brand_id'      =>'required',
                'name'          =>'required|min:3|max:255|unique:developers,name,'.$developer->id,
                'des'           =>'max:255',
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
