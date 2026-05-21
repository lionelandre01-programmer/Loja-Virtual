<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use Illuminate\Http\Request;

/**
 * Class MovimentoController
 *
 * Exibe movimentos registados no sistema (logs funcionais).
 * Fornece listagem geral e visualização de detalhes de cada movimento.
 */
class MovimentoController extends Controller
{
    /**
     * Lista todos os movimentos registados no sistema para visualização.
     */
    public function index()
    {
        $movimentos = Movimento::all();
        return view('sistema.movimento', ['movimentos' => $movimentos]);
    }

    /**
     * Mostra detalhes de um movimento identificado por `$id`.
     */
    public function show($id)
    {
        $movimento = Movimento::find($id);
        return view('sistema.movimentodetalhes',['movimento' => $movimento]);
    }
}
