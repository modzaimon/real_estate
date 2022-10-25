<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'name',
        'tel',
        'type_id',
        'brand_id',
        'des',
    ];

    
    public function estate()
    {
        return $this->hasOne(Estate::class,'id','estate_id');
    }

    public function seller()
    {
        return $this->hasOne(Seller::class,'id','seller_id');
    }
}
