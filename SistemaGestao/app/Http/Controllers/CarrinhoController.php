<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\User;
use App\Models\CarrinhoItem;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class CarrinhoController
 *
 * Lógica do carrinho de compras: adicionar, listar, alterar quantidades e
 * remover itens. Mantém a totalização do carrinho e cria/atualiza `Carrinho`.
 */
class CarrinhoController extends Controller
{
    /**
        * Exibe o carrinho do utilizador: itens activos e o total associado.
     */
    public function index()
    {
        if (CarrinhoItem::exists()){
            
            if (CarrinhoItem::where('status','activo')->exists() && Carrinho::where('user_id', Auth()->id())->exists()){

                $carrinho = Carrinho::where('user_id', Auth()->id())->first();
                $items = CarrinhoItem::where('carrinho_id', $carrinho->id)->where('status','activo')->get();

            }else{

                $items = [];
                $carrinho = null;
            }

        }else{

            $items = [];
            $carrinho = null;
        }

        return view('cliente/carrinho',['items' => $items, 'carrinho' => $carrinho]);
    }

    /**
        * Adiciona um produto ao carrinho do utilizador autenticado. Cria o
        * carrinho se ainda não existir e previne duplicação do mesmo produto.
     */
    public function adicionar(Request $request)
    {
        if (Carrinho::where('user_id', Auth()->id())->exists()){

            $carrinho = Carrinho::where('user_id', Auth()->id())->first();

        }else{

            $carrinho = new Carrinho;
            $carrinho->user_id = Auth()->id();
            $carrinho->save();

        }

        $produto = Produto::find($request->produto);

        if (CarrinhoItem::where('carrinho_id', $carrinho->id)->where('status', 'activo')->where('produto_id', $produto->id)->exists()){

            return redirect()->back()->with('error' ,'O produto já está no carrinho');

        }else{

            $items = new CarrinhoItem;

            $items->carrinho_id = $carrinho->id;
            $items->produto_id = $produto->id;
            $items->quantidade = $request->quantidade;
            $items->preco = $produto->price;
            $carrinho->total = (float) $carrinho->total + ($request->quantidade * $produto->price);
            $items->save();
            $carrinho->save();

            return redirect()->back()->with('success' ,'Produto Adicionado Ao Carrinho');
        }

    }

    /**
        * Mostra o formulário para alterar a quantidade de um item no carrinho.
        */
        public function alterForm($id)
    {
        $produto = Produto::find($id);
        $carrinho = Carrinho::where('user_id', Auth()->id())->first();

        $items = CarrinhoItem::where('carrinho_id', $carrinho->id)
        ->where('produto_id', $id)->where('status', 'activo')->first();
        $quantidade = $items->quantidade;

        return view('cliente/alter', ['produto' => $produto, 'quantidade' => $quantidade]);
    }

    /**
        * Atualiza a quantidade de um item no carrinho e ajusta o total.
        */
        public function alter(Request $request)
    {
        $carrinho = Carrinho::where('user_id', Auth()->id())->first();
        $produto = Produto::find($request->produto);
        $items = CarrinhoItem::where('carrinho_id', $carrinho->id)->where('produto_id', $produto->id)->where('status', 'activo')->first();
        $items->quantidade = $request->quantidade;
        $carrinho = $carrinho->total + ($request->quantidade * $produto->price);
        $items->save();
        $carrinho->save();

        return redirect()->route('carrinho');
    }

    /**
     * Remove um item do carrinho identificado por `$id`.
     */
    public function destroy($id)
    {
        $item = CarrinhoItem::find($id);
        $item->delete();
        return redirect()->back()->with('success','Produto Removido Do Carrinho!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrinho $carrinho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
}
