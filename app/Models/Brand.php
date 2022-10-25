<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'des',
    ];

    public function developer()
    {
        return $this->hasMany(developer::class,'brand_id');
    }

    


    /* Example Relationship */

    // public function comments(): HasManyThrough
    // {
    //     return $this->hasManyThrough(Comment::class, Post::class);
    // }

    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    // }
}
