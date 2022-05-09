<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $table= "kategoria";

    protected $fillable = [
        'id',
        'szuloid',
        'nev',
        'intervallum',
        'normaido',
        'karbantartasInstrukcio'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'szuloid');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'szuloid');
    }

    public function tools()
    {
        return $this->hasMany(Tool::class, 'kategoriaid');
    }

    public function vegzettseg()
    {
        return $this->belongsToMany(Vegzettseg::class,'vegoria','kategoria_id', 'vegzettseg_id');
    }
}
