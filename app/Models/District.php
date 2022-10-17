<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'zip_code',
        'name_th',
        'name_en',
        'amphure_id'
    ];

    public function amphure()
    {
        return $this->hasOne(Amphure::class,'id','amphure_id');
    }

}
