<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $table= "szakember";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'szerepkorID',
        'email',
        'nev',
        'jelszo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'jelszo'
    ];

    public function getAuthPassword()
    {
        return $this->jelszo;
    }

    /**
     * Get the role that owns the user.
     */
    public function szerepkor()
    {
        return $this->belongsTo(Role::class,'szerepkorID');
    }

    public function hasRole($role)
    {
        return $this->szerepkor->nev == $role;
    }

    public function kepesitesek()
    {
        return $this->belongsToMany(Vegzettseg::class,'kepesites','dolgozoid', 'vegzettsegid');
    }
}
