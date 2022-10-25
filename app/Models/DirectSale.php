<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directsale extends Model
{
    use HasFactory;

    protected $table = "direct_sales";

    protected $fillable = [
        'name',
        'tel',
        'bank_id',
        'des'
    ];
    public function bank()
    {
        return $this->hasOne(Bank::class,'id','bank_id');
    }
}
