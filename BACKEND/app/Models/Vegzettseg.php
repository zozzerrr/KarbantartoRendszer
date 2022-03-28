<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vegzettseg extends Model
{

    public $timestamps = false;
    protected $table= "vegzettseg";

    protected $fillable = [
        'kepesites'
    ];

    protected $primaryKey = 'id';

}
