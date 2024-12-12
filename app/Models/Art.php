<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $fillable= [
        'title',
        'artistname',
        'about',
        'image',
        'created_at',
        'update_at',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}