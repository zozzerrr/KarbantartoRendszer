<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public $timestamps = false; 
    //protected $table= "eszkozok";

    protected $fillable = [
        'id',
        'name',
        'place',
        'category_id'
    ];
}
