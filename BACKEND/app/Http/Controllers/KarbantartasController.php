<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karbantartas;
use App\Models\Tool;


class KarbantartasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karbantartasok = Karbantartas::all();


        return view('karbantartasok', ['allKarbantartasok' => $karbantartasok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tools = Tool::all();

        return view('createkarbantartas', ['tools' => $tools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $karbantartas = Karbantartas::where('eszkozid', $request->get('eszkozid'))->get();
        $karbantartas->hibaE = 1;
        $karbantartas->sulyossag = $request->get('sulyossag');
        $karbantartas->idopont = $request->get('idopont');
        $karbantartas->allapot = "Ütemezve";
        dd($karbantartas);
        $karbantartas->save();

        return redirect('/karbantartasok');

        /*Karbantartas::create([
            'eszkozid' => $request->get('eszkozid'),
            'hibaE' => 1,
            'sulyossag' => $request->get('sulyossag'),
            'idopont'  => $request->get('idopont'),
            'allapot' => 'utemezve'
        ]);*/ 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function ujKarbantartas($eszkozid, $idopont)
    {
        Karbantartas::create([
            'eszkozid' => $eszkozid,
            'hibaE' => 0,
            'sulyossag' => 1,
            'idopont'  => $idopont,
            'allapot' => 'Ütemezve'
        ]);
    }
}