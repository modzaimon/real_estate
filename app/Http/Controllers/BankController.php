<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    
    public function index()
    {
        $data = Bank::paginate(20);
        return view ('module.bank.index',compact('data',$data));
    }

 
    public function create()
    {
        return view ('module.bank.create');
        
    }

    
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                "name"  =>  "required | max:100 | unique:banks"
            ]);
    
            Bank::create([
               "name"   =>  $request->name, 
               "des"   =>  $request->des 
            ]);
            
            return redirect()->route('bank.index')->with('success','Bank "'.$request->name.' is create successfully.');
        } catch (Exception $e) {
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
        
    }

 
    public function show(Bank $bank)
    {
        return view('module.bank.view')->with('data',$bank);
    }

    
    public function edit(Bank $bank)
    {
        return view('module.bank.edit')->with('data',$bank);
    }

    
    public function update(Request $request, Bank $bank)
    {
        try {

            $this->validate($request,[
                "name"  =>  "required | max:100 | unique:banks,".$bank->id
            ]);

            $bank->update([
                "name"      =>  $request->name,
                "des"       =>  $request->des
            ]);    
            return redirect()->route('bank.index')->with('success','Bank '.$request->name.' is Update Successfully.');
        } catch (Exception $e) {
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }

    
    public function destroy(Bank $bank)
    {
        try{
            $bank->delete();
            return redirect()->route('bank.index')->with('success',"Bank ".$bank->name." is Deleted successfully.");
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }
}
