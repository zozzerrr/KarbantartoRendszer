<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    public $timestamps = false; 
    //protected $table= "eszkozok";
    public $incrementing = false;
     protected $table= "eszkoz";

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'kategoriaid',
        'nev',
        'leiras',
        'elhelyezkedes',
        'kovetkezokarbantartas'

    ];
}
