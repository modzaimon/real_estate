<?php

namespace App\Http\Controllers;

use App\Models\DirectSale;
use App\Models\Bank;
use Illuminate\Http\Request;

class DirectsaleController extends Controller
{

    public function index()
    {
        $data = Directsale::with('bank')->paginate(20);
        return view('module.directsale.index',compact('data',$data));
    }

    
    public function create()
    {
        $data['bank'] = Bank::all();
        return view('module.directsale.create',compact('data',$data));
        
    }


    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                "name"  =>  "required | max:100 | unique:direct_sales",
                "tel"  =>  "required | max:10",
                "bank"  =>  "required"

            ]);
    
            Directsale::create([
               "name"       =>  $request->name, 
               "tel"        =>  $request->tel, 
               "bank_id"    =>  $request->bank, 
               "des"        =>  $request->des 
            ]);
            
            return redirect()->route('directsale.index')->with('success','Directsale "'.$request->name.' is create successfully.');
        } catch (Exception $e) {
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }


    public function show(Directsale $directsale)
    {
        return view('module.directsale.view')->with('data',$directsale);
    }


    public function edit(Directsale $directsale)
    {
        $data['bank'] = Bank::all();
        $data['directsale'] = $directsale;
        return view('module.directsale.edit')->with('data',$data);
    }


    public function update(Request $request, Directsale $directsale)
    {
        try {
            $this->validate($request,[
                "name"  =>  "required | max:100 | unique:direct_sales,name,".$directsale->id,
                "tel"  =>  "required | max:10",
                "bank"  =>  "required"

            ]);
    
            $directsale->update([
               "name"       =>  $request->name, 
               "tel"        =>  $request->tel, 
               "bank_id"    =>  $request->bank, 
               "des"        =>  $request->des 
            ]);
            
            return redirect()->route('directsale.index')->with('success','Directsale "'.$request->name.' is create successfully.');
        } catch (Exception $e) {
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }


    public function destroy(Directsale $directsale)
    {
        try{
            $directsale->delete();
            return redirect()->route('directsale.index')->with('Success','Directsale '.$directsale->name.' is Deleted Successfully.');
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }
}
