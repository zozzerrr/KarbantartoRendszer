<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //use HasFactory; //?
    public $timestamps = false; 
    // Explanation : By default laravel will expect created_at & updated_at column in your table. 
    //By making it to false it will override the default setting.

    protected $fillable = [
        'name',
        'minterval'
    ];
    
    protected $hidden = [
        'id'
    ];
}