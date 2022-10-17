<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDistrictByName(Request $request){

        // return json_encode($request,true);
        return response()->json(
            // District::with(['amphure'=>function($query){
            //         $query->select('id','name_th')->with('province');
            //     }])
            District::with(['amphure'=>function($query){
                $query->select('id','name_th','province_id')->with(['province' => function($query){
                    $query->select('id','name_th');
                }]);
            }])
                ->select('id','name_th','zip_code','amphure_id')
                ->where('name_th', 'like','%'.$request->name.'%')
                ->where('name_th', 'not like','%*%')
                ->get());


            // $mainQuery=StockTransactionLog::with(['supplier','customer','warehouse','stockInDetails'=>function($query) use ($productId){
            //         $query->with(['product'])->where('product_stock_in_details.product_id',$productId);
            //     },
            //     'stockOutDetails'=>function($query) use ($productId){
            //         $query->with(['product'])->where('product_stock_out_details.product_id',$productId);
            //     },
            //     'stockDamage'=>function($query) use ($productId){
            //         $query->with(['product'])->where('product_damage_details.product_id',$productId);
            //     },
            //     'stockReturn'=>function($query) use ($productId){
            //         $query->select('id','return_id','product_id');
            //         $query->with(['product'])->where('product_return_details.product_id',$productId);
            //     }
            // ]);


               



    }

    public function getDistrictByZipcode(Request $request){

        // return json_encode($request,true);
        return response()->json(District::select('id','zip_code','name_th','amphure_id')->where('zip_code', 'like',$request->zipcode.'%')->get());
    }

}
