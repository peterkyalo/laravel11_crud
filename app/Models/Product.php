<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Accessor and mutators in Laravel
    public function getNameAttribute()
    {
        return ucfirst($this->attributes['name']);
    }

    //How to add mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
        $this->attributes['slug'] = Str::slug($value);
    }
}
