<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimentos = Movimento::all();
        return view('sistema.movimento', ['movimentos' => $movimentos]);
    }

    public function show($id)
    {
        $movimento = Movimento::find($id);
        return view('sistema.movimentodetalhes',['movimento' => $movimento]);
    }
}
