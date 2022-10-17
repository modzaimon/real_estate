<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amphure extends Model
{
    use HasFactory;

    protected $table = "amphures";

    public function province()
    {
        return $this->hasOne(Province::class,'id','province_id');
    }

}
