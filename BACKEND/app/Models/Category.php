<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'normaido'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'szuloid');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'szuloid');
    }

    /**
     * Get the comments for the blog post.
     */
    public function tools()
    {
        return $this->hasMany(Tool::class, 'kategoriaid');
    }

    public function vegzettseg()
    {
        //return $this->belongsToMany(Vegzettseg::class,'vegoria')->withPivot('kategoria_id');
        return $this->belongsToMany(Vegzettseg::class,'vegoria','kategoria_id', 'vegzettseg_id');
    }
}
