<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Vegzettseg;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class OperatorController extends Controller
{
    public function getAllKarbantarto()
    {
        $karbantartok = User::all();
        //dd($karbantartok);
        foreach($karbantartok as $key => $karbantarto) {
            //dd($karbantarto->szerepkor->nev);
            if(!$karbantarto->hasRole("Karbantartó")){
                unset($karbantartok[$key]);
            }
        }

        return view('karbantartok', ['karbantartok' => $karbantartok]);
    }

    public function getAvailableVegzettsegek($id)
    {
        $karbantarto = User::find($id);

        if ( $karbantarto ) {
            $kepesitesek = $karbantarto->kepesitesek;
            $veg_ids = [];
            foreach ($kepesitesek as $veg) {
                $veg_ids[] = $veg->id;
            }

            $availableVegzettsegek = Vegzettseg::select('id','kepesites')->whereNotIn('id', $veg_ids)->get();

            return view('karbantarto', ['vegzettsegek' => $availableVegzettsegek, 'karbantarto' => $karbantarto,'empty' => false]);
        }

        return view('karbantarto', ['empty' => true]);
    }

    public function addVegzettseg(Request $request)
    {
        DB::table('kepesites')->insert(
            ['dolgozoid' => $request->get('dolgozoid'), 'vegzettsegid' => $request->get('vegzettsegid')]
        );

        return redirect('karbantartok');
    }
}
