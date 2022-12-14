<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandSeller;
use App\Models\Seller;
use App\Models\SellerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seller::with('brand','seller_type')->paginate(20);
        return view('module.seller.index',compact('data',$data));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // print_r(json_encode(DB::table('brand_seller')->join('brands','brands.id','=','brand_seller.brand_id')->get()));
        $data['seller_type'] = SellerType::all();
        $data['brand'] = Brand::all();
        return view('module.seller.create',compact('data',$data));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        try {
            $this->validate($request,[
                "name"  =>  "required | max:100 | unique:sellers",
                "tel"   =>  "required | numeric ",
                "type"  =>  "required"

            ]);

            $seller = Seller::create([
                "name"      => $request->name,
                "tel"       => $request->tel,
                "type_id"   => $request->type,
                "brand_id"  =>  $request->brand,
                "des"       => $request->des
            ]);

            return redirect()->route('seller.index')->with('success','Seller '.$request->name." is Create successfully");

        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        $data = Seller::where('id',$seller->id)->first();
        return view('module.seller.view',compact('data',$data));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        $data['seller'] = $seller;
        $data['seller_type'] = SellerType::all();
        $data['brand'] = Brand::all();
        return view('module.seller.edit',compact('data',$data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        
        try {
            $this->validate($request,[
                "name"  =>  'required | max:100 | unique:sellers,name,'.$seller->id,
                "tel"   =>  "required | numeric",
                "type"  =>  "required"
            ]);

            $seller->update([
                "name"  =>  $request->name,
                "tel"   =>  $request->tel,
                "type_id"   =>  $request->type,
                "brand_id"  =>  $request->brand,
                "des"   =>  $request->des
            ]);
            return redirect()->route('seller.index')->with('success','Seller '.$request->name.' is Update Successfully.');
        } catch (Exception $e) {
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        try{
            $seller->delete();
            return redirect()->route('seller.index')->with('Success','Seller '.$seller->name.' is Deleted Successfully.');
        }catch(Exception $e){
            return back()->withErrors('error',$e->getMessage())->withInput();
        }
    }
}
