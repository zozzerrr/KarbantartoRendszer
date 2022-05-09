<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feladat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeladatController extends Controller
{
     public function index()
     {
        $feladatok = DB::table('feladat')
            ->join('karbantartas', 'karbantartas.id', '=', 'feladat.karbantartasid')
            ->join('eszkoz', 'eszkoz.id', '=', 'karbantartas.eszkozid')
            ->join('kategoria', 'kategoria.id', '=', 'eszkoz.kategoriaid')
            ->select('eszkoz.nev','eszkoz.elhelyezkedes','feladat.idopont','karbantartas.sulyossag','karbantartas.allapot','karbantartas.leiras','kategoria.karbantartasInstrukcio','kategoria.normaido')
            ->where('feladat.szakemberid','=', Auth::user()->id)
            ->where(DB::raw('DATE(feladat.idopont)') ,'=',DB::raw('CURDATE()'))
            ->whereIn('karbantartas.allapot', ["Ütemezve","Megkezdve"])
            ->Where(function ($query) {
                $query->whereNull("feladat.elfogadtaE");
                $query->orWhere("feladat.elfogadtaE", "=",1);
            })
            ->orderByDesc('karbantartas.allapot')
            ->orderByDesc('karbantartas.sulyossag')
            ->get();

     }

      public function store($request)
      {
            
      }

}
