<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karbantartas extends Model
{
    public $timestamps = false;

    protected $table= "karbantartas";

    protected $fillable = [
        'id',
        'eszkozid',
        'hibaE',
        'sulyossag',
        'idopont',
        'allapot'
    ];
}
