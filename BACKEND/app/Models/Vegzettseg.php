<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegzettseg extends Model
{
    
    public $timestamps = false; 
    protected $table= "vegzettsegek";

    protected $fillable = [
        'kepesites'
    ];
    
    
    protected $primaryKey = 'id';

   

}
