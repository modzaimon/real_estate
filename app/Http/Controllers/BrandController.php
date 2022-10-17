<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $data = Brand::paginate(20);
        return view('brand.index',compact('data'));
    }

   
    public function create()
    {
        return view('brand.create');
        
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'name' =>'required|max:255|unique:brands',
                'des'  =>'max:255',
            ]);
    
            Brand::create([
                'name'      => $request->name,
                'des'      => $request->des,
                // 'is_active' => (empty($request->is_active)) ? '0' : '1',
            ]);
            return redirect()->route('brand.index')->with('success',"Brand ".$request->name." is Create successfully.");
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }

    public function show(Brand $brand)
    {
        return view('brand.view')->with('data',$brand);
    }


    public function edit(Brand $brand)
    {
        return view('brand.edit')->with('data',$brand);
    }


    public function update(Request $request, Brand $brand)
    {
        try{
            $this->validate($request,[
                'name'     =>'required|min:3|max:255|unique:brands,name,'.$brand->id,
                'des'      =>'max:255',
            ]);

            $brand->update([
                'name'     => $request->name,
                'des'      => $request->des,
            ]);
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }

        return redirect()->route('brand.index')->with('success',"Brand ".$request->name." is Update successfully.");
    }

    public function destroy(Brand $brand)
    {
        try{
            $brand->delete();
            return redirect()->route('brand.index')->with('success',"Brand ".$brand->name." is Deleted successfully.");
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }
}
