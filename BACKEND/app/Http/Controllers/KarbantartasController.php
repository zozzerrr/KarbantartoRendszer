<?php

namespace App\Http\Controllers;

use App\Helpers\TaskManager;
use App\Http\Requests\KarbantartasRequest;
use Illuminate\Http\Request;
use App\Models\Karbantartas;
use App\Models\Tool;


class KarbantartasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $karbantartasok = Karbantartas::all();

        return view('karbantartasok', ['allKarbantartasok' => $karbantartasok]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $tools = Tool::all();

        return view('createkarbantartas', ['tools' => $tools]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param KarbantartasRequest $request
     */
    public function store(KarbantartasRequest $request)
    {
        $request->validated();

        $karbantartas = Karbantartas::updateOrCreate(
            [
                'eszkozid' => $request->get('eszkozid')
            ],
            [
                'hibaE' => 1,
                'sulyossag' => $request->get('sulyossag'),
                'idopont' => $request->get('idopont'),
                'allapot' => 'Ütemezve',
                'leiras' => $request->get('leiras')
            ]
        );

        $result = TaskManager::feladatSzakemberhezRendelese($karbantartas);

        return redirect('karbantartasok')->with(["result" => $result]);
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
