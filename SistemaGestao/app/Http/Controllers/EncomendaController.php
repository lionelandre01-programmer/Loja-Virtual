<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use App\Models\EncomendaItem;
use App\Models\Carrinho;
use App\Models\CarrinhoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncomendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role != 'cliente'){

            $encomendas = Encomenda::all();

        }else{

            $encomendas = Encomenda::where('user_id', Auth()->id())->get();

        }
        
        return view('sistema/encomenda', ['encomendas' => $encomendas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $carrinho = Carrinho::where('user_id', Auth()->id())->first();

        if (CarrinhoItem::where('carrinho_id', $carrinho->id)->where('status','activo')->exists()){

            if ($request->endereco){

                $encomenda = new Encomenda;
                $encomenda->user_id = Auth()->id();
                $encomenda->endereco = $request->endereco;
                $encomenda->save();

            }else{

                $encomenda = new Encomenda;
                $encomenda->user_id = Auth()->id();
                $encomenda->save();

            }
            

            
            $items = CarrinhoItem::where('carrinho_id', $carrinho->id)->where('status','activo')->get();

            foreach ( $items as $item ){

                $encomendaItems = new EncomendaItem;
                $encomendaItems->encomenda_id = $encomenda->id;
                $encomendaItems->produto_id = $item->produto_id;
                $encomendaItems->quantidade = $item->quantidade;
                $encomendaItems->preco = $item->produto->price;
                $encomendaItems->save();

            }

            CarrinhoItem::where('carrinho_id', $carrinho->id)->where('status','activo')->update(['status' => 'finalizado']);

            $encomenda->total = $carrinho->total;
            $encomenda->save();
            $carrinho->total = null;
            $carrinho->save();

            return redirect()->back()->with('success', 'Produtos Encomendados!');

        }else{

            return redirect()->back()->with('error', 'Nenhum Produto Adicionado Ao Carrinho');

        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $encomenda = Encomenda::find($id);
        $encomendas = EncomendaItem::where('encomenda_id', $encomenda->id)->get();
        
        return view('sistema.factura', ['encomendas' => $encomendas, 'encomenda' => $encomenda]);
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
