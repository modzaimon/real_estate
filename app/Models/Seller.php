<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tel',
        'type_id',
        'brand_id',
        'des',
    ];

    
    public function seller_type()
    {
        return $this->hasOne(SellerType::class,'id','type_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
        // return $this->hasMany(BrandSeller::class);
        // return DB::table('sellers')
        //             ->join('brand_seller','sellers.id','=','brand_seller.seller_id')
        //             ->first();
    }
}
