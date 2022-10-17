<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'name',
        'address',
        'district_id',
        'postcode',
        'location',
        'note',
        'type_id',
        'is_active',
    ];

    public function developer()
    {
        return $this->hasOne(Developer::class,'id','developer_id');
    }

    public function project_type()
    {
        return $this->hasOne(ProjectType::class,'id','type_id');
    }
    public function district()
    {
        return $this->hasOne(District::class,'id','district_id');
    }
}
