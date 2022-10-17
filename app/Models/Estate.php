<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'number',
        'deed_no',
        'price',
        'type_id',
        'size',
        'unit_id',
        'build_year',
        'des',
    ];

    public function project_id()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }

    public function estate_type()
    {
        return $this->hasOne(EstateType::class,'id','type_id');
    }
    public function project()
    {
        return $this->hasOne(Project::class,'id','project_id');
    }
    public function unit()
    {
        return $this->hasOne(Unit::class,'id','unit_id');
    }
}
