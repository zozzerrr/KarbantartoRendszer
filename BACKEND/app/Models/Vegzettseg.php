<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vegzettseg extends Model
{

    public $timestamps = false;

    protected $table= "vegzettseg";

    protected $fillable = [
        'id',
        'kepesites'
    ];

    public function kategoria()
    {
        return $this->belongsToMany(Category::class,'vegoria','vegzettseg_id', 'kategoria_id');
    }
}
