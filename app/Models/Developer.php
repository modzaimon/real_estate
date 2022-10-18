<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'des',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    
}
