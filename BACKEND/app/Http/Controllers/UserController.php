<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Vegzettseg;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $kategoria = Category::find(3);

        $foglalt_vegzet = $kategoria->vegzettseg;
        $a = $kategoria->isEmpty();
        $kat_ids = [];
        foreach ($foglalt_vegzet as $veg) {
            $kat_ids[] = $veg->id;
        }

        dd($kat_ids);

        return view('test',['vegzettsegek' => $vegzettsegek]);
    }
}
