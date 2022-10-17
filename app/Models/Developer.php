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
        'note',
        'is_active',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    
}
