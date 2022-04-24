<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createcategory', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::find($request->get('szuloid'));
        
        if($category || $request->get('szuloid') == 0)
        {
            $request->validate([
                'nev' => ['required', 'string', 'max:255'],
                'szuloid' => ['required', 'numeric'],
                'normaido' => ['required'],
                'karbantartasInstrukcio' => ['required', 'string', 'max:255']
            ]);

            // 4. Fő kategória, nincs megadva | nem
            if($request->get('szuloid') == 0 && null === $request->get('intervallum'))
            {
                return back()->with('error', 'Fő kategória esetén meg kell adni az intervallumot!');
            }

            // 1. Nem fő kategória, van megadva intervallum | mehet
            // 2. Nem fő kategória, nincs megadva intervallum | mehet
            // 3. Fő kategória, van megadva | mehet
            $intervallum = $request->get('intervallum') ? $request->get('intervallum') : Category::find($request->get('szuloid'))->intervallum;

            Category::create([
                'szuloid' => $request->get('szuloid'),
                'nev' => $request->get('nev'),
                'intervallum' => $intervallum,
                'normaido'=> $request->get('normaido'),
                'karbantartasInstrukcio' => $request->get('karbantartasInstrukcio')
            ]);

            return redirect('/categories');
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
