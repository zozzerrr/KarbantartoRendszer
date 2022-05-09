<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feladat;

class FeladatController extends Controller
{
     public function index()
     {
        $feladatok = Feladat::all();


     }

      public function store($request)
      {

      }

}
