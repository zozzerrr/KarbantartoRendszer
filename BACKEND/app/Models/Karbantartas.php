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
        'allapot',
        'leiras'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'feladat','karbantartasid', 'szakemberid');
    }

    public function kategoria()
    {
        return $this->belongsToMany(Category::class,'feladat','karbantartasid', 'szakemberid');
    }

    public function tools()
    {
        return $this->belongsTo(Tool::class, 'eszkozid');
    }

    public function feladat()
    {
        return $this->hasMany(Feladat::class, 'karbantartasid');
    }
}
