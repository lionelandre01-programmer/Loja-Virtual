<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('categoria/create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria;

        $categoria->name = $request->name;
        $categoria->save();
        return redirect()->back()->with('success' ,'Categoria Criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categorias = Categoria::all();
        return view('categoria/show', ['categorias' => $categorias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encomenda $encomenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encomenda $encomenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encomenda $encomenda)
    {
        //
    }
}