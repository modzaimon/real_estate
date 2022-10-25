<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CustomerController extends Controller
{
  
    public function index()
    {
        $data = Customer::paginate(20);
        return view('module.customer.index',compact('data',$data));
    }

   
    public function create()
    {
        return view('module.customer.create');
        
    }

   
    public function store(Request $request)
    {
        try {

            $this->validate($request,[
                "firstname" =>  "required | max:100",
                "lastname"  =>  "max:100",
                "tel"       =>  "required | max:10"
            ]);
            $birthdate=null;
            if(!is_null($request->birthdate)){
                $d =  explode('-',$request->birthdate);
                $birthdate = $d[2].'-'.$d[1].'-'.$d[0];
            }
            Customer::create([
                "first_name"=>  $request->firstname,
                "last_name" =>  $request->lastname,
                "birthdate" =>  $birthdate,
                "tel"       =>  $request->tel,
                "des"       =>  $request->des
            ]);    
            return redirect()->route('customer.index')->with('success','Customer '.$request->firstname.' is Create Successfully.');
        } catch (Exception $e) {
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
        
    }

    public function show(Customer $customer)
    {
        return view('module.customer.view')->with('data',$customer);
    }

    public function edit(Customer $customer)
    {
        return view('module.customer.edit')->with('data',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        try {

            $this->validate($request,[
                "firstname" =>  "required | max:100",
                "lastname"  =>  "max:100",
                "tel"       =>  "required | max:10"
            ]);
            $birthdate=null;
            if(!is_null($request->birthdate)){
                $d =  explode('-',$request->birthdate);
                $birthdate = $d[2].'-'.$d[1].'-'.$d[0];
            }
            $customer->update([
                "first_name"=>  $request->firstname,
                "last_name" =>  $request->lastname,
                "birthdate" =>  $birthdate,
                "tel"       =>  $request->tel,
                "des"       =>  $request->des
            ]);    
            return redirect()->route('customer.index')->with('success','Customer '.$request->firstname.' is Update Successfully.');
        } catch (Exception $e) {
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        try{
            $customer->delete();
            return redirect()->route('customer.index')->with('success',"Customer ".$customer->name." is Deleted successfully.");
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }

    public function getCustomerByName(Request $request)
    {
        try{
            return response()->json(
                Customer::select('id','first_name','last_name')
                    ->where('first_name', 'like','%'.$request->name.'%')
                    ->orwhere('last_name', 'like','%'.$request->name.'%')
                    // ->whereNotIn('id',$request->exsit)
                    ->get());
        }catch(Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
