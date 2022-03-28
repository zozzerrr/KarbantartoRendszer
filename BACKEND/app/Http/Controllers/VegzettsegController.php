<?php

namespace App\Http\Controllers;

use App\Models\Vegzettseg;
use Illuminate\Http\Request;

class VegzettsegController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vezgettsegek = Vegzettseg::all();

        return view('vegzettsegek', ['vegzettsegek' => $vezgettsegek]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createvegzettseg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Models\Vegzettseg::create([
          'kepesites' => $request->get('kepesites')

        ]);

        return redirect('/vegzettsegek');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCategory($id)
    {
        $vegzettseg = Vegzettseg::find($id);

        if (! $vegzettseg ) {
            $foglalt_kat = $vegzettseg->kategoria;

            $kat_ids = [];
            foreach ($foglalt_kat as $kat) {
                $kat_ids[] = $kat->id;
            }

            dd($kat_ids);
        }
    }
}
