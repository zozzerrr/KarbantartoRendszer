<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tool;
use App\Models\Vegzettseg;
use App\Models\Karbantartas;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = Tool::all();


        return view('tools', ['allTools' => $tools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('createtool', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::find($request->get('kategoriaid'));

        if($category)
        {   
           Tool::create([
                'id' => $request->get('id'),
                'kategoriaid' => $request->get('kategoriaid'),
                'nev' => $request->get('nev'),
                'leiras' => $request->get('leiras'),
                'elhelyezkedes'  => $request->get('elhelyezkedes'),
                'kovetkezokarbantartas' => $request->get('kovetkezokarbantartas')
            ]);

            Karbantartas::create([
                'eszkozid' => $request->get('id'),
                'hibaE' => 0,
                'sulyossag' => 1,
                'idopont'  => $request->get('kovetkezokarbantartas'),
                'allapot' => 'Ütemezve'
            ]);

            return redirect('/tools');
        }
        else
        {
            return back()->with('error', 'Válasszon kategóriát!');
        }
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
}
