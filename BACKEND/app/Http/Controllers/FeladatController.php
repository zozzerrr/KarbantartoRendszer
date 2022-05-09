<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feladat;
use App\Models\Karbantartas;
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
            ->select('feladat.id', 'eszkoz.nev', 'eszkoz.elhelyezkedes', 'feladat.idopont', 'karbantartas.sulyossag', 'karbantartas.allapot', 'karbantartas.leiras', 'kategoria.karbantartasInstrukcio', 'kategoria.normaido')
            ->where('feladat.szakemberid', '=', Auth::user()->id)
            ->where(DB::raw('DATE(feladat.idopont)'), '=', DB::raw('CURDATE()'))
            ->whereIn('karbantartas.allapot', ["Ütemezve", "Megkezdve", "Elfogadva"])
            ->Where(function ($query) {
                $query->whereNull("feladat.elfogadtaE");
                $query->orWhere("feladat.elfogadtaE", "=", 1);
            })
            ->orderByDesc('karbantartas.allapot')
            ->orderByDesc('karbantartas.sulyossag')
            ->get();

        return view('feladatok', ['allFeladatok' => $feladatok]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $feladat = Feladat::find($request->get('id'))->first();
        $feladat->indoklas = $request->get('indoklas');
        $feladat->elfogadtaE = 0;
        $feladat->save();

        $karbantaras = Karbantartas::find($feladat->karbantartasid);
        $karbantaras->allapot = 'Elutasítva';
        $karbantaras->save();

        return redirect('feladatok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function elfogad(Request $request)
    {
        $feladat = Feladat::find($request->get('id'))->first();
        $feladat->elfogadtaE = 1;
        $feladat->save();

        $karbantaras = Karbantartas::find($feladat->karbantartasid);
        $karbantaras->allapot = 'Elfogadva';
        $karbantaras->save();

        return redirect('feladatok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function megkezd(Request $request)
    {
        $feladat = Feladat::find($request->get('id'))->first();

        $karbantaras = Karbantartas::find($feladat->karbantartasid);
        $karbantaras->allapot = 'Megkezdve';
        $karbantaras->save();

        return redirect('feladatok');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function befejez(Request $request)
    {
        $feladat = Feladat::find($request->get('id'))->first();

        $karbantaras = Karbantartas::find($feladat->karbantartasid);
        $karbantaras->allapot = 'Befejezve';
        $karbantaras->save();

        return redirect('feladatok');
    }
}