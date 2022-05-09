<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feladat extends Model
{
    use HasFactory;

    protected $table= "feladat";

    public $timestamps = false;

    protected $fillable = [
        'karbantartasid',
        'szakemberid',
        'idopont',
        'elfogadtaE',
        'indoklas',
        'kezdesIdopont',
        'vegzesIdopont'
    ];

    public function karbantartas()
    {
        return $this->belongsTo(Karbantartas::class, 'karbantartasid');
    }

}
