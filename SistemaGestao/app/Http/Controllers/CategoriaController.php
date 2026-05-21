<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class CategoriaController
 *
 * Controlador para gestão de categorias de produto (CRUD básico).
 * Inclui criação, listagem e registo de movimentos ao criar categorias.
 */
class CategoriaController extends Controller
{
    /**
     * Mostra o formulário de criação de categoria.
     */
    public function create()
    {
        return view('categoria/create');
    }

    /**
     * Persiste uma nova categoria na base de dados e regista o movimento.
     */
    public function store(Request $request)
    {
        $categoria = new Categoria;

        $categoria->name = $request->name;
        $categoria->save();

        $movimentos = new Movimento;
        $movimentos->objecto = $categoria->name;
        $movimentos->category = "Categoria";
        $movimentos->codigo = $categoria->id;
        $movimentos->movimento = "Cadastrar Categoria";
        $movimentos->user_id = Auth()->id();
        $movimentos->save();

        return redirect()->back()->with('success' ,'Categoria Criada com sucesso!');
    }

    /**
     * Lista todas as categorias disponíveis para gestão.
     */
    public function show()
    {
        $categorias = Categoria::all();
        return view('categoria/show', ['categorias' => $categorias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}