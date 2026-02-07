<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\User;
use App\Models\CarrinhoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (CarrinhoItem::exists()){
            if (CarrinhoItem::where('status','activo')->exists()){

                $items = CarrinhoItem::where('status','activo')->get();

            }else{

                $items = [];
            }

        }else{

            $items = [];
        }

        return view('cliente/carrinho',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function adicionar(Request $request, $id)
    {
        if (Carrinho::where('user_id', $id)->exists()){

            $carrinho = Carrinho::where('user_id', $id)->first();

        }else{

            $user = User::where('id',$id)->first();
            $carrinho = new Carrinho;
            $carrinho->user_id = $user->id;
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
            $items->save();

            return redirect()->back()->with('success' ,'Produto Adicionado Ao Carrinho');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function alterForm($id)
    {
        $produto = Produto::find($id);
        $user = User::find(Auth::user()->id);
        $carrinho = Carrinho::find($user->id);

        $items = CarrinhoItem::where('carrinho_id', $carrinho->id)->where('produto_id', $produto->id)->where('status', 'activo');
        $quantidade = $items->quantidade;

        return view('cliente/alter', ['produto' => $produto, 'quantidade' => $quantidades]);
    }

    /**
     * Display the specified resource.
     */
    public function alter(Request $request, $id)
    {
        $user = User::find($id);
        $carrinho = Carrinho::where('user_id', $user->id);
        $produto = Produto::find($request->produto);
        $items = CarrinhoItem::where('carrinho_id', $carrinho->id)->where('produto_id', $produto->id);
        $items->quantidade = $request->quantidade;
        $items->save();

        return redirect()->route('carrinho');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrinho $carrinho)
    {
        //
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
    public function destroy(Carrinho $carrinho)
    {
        //
    }
}
