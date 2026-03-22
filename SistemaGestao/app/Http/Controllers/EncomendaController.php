<?php

namespace App\Http\Controllers;

use App\Models\Encomenda;
use App\Models\EncomendaItem;
use App\Models\Carrinho;
use App\Models\Movimento;
use App\Models\Produto;
use App\Models\CarrinhoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            
            $movimentos = new Movimento;
            $movimentos->user_id = Auth()->id();
            $movimentos->movimento = "Encomenda Feita";
            $movimentos->objecto = "Encomenda";
            $movimentos->codigo = $encomenda->id;
            $movimentos->category = "Encomenda";
            $movimentos->save();

            
            $items = CarrinhoItem::where('carrinho_id', $carrinho->id)->where('status','activo')->get();

            foreach ( $items as $item ){

                $encomendaItems = new EncomendaItem;
                $encomendaItems->encomenda_id = $encomenda->id;
                $encomendaItems->produto_id = $item->produto_id;
                $encomendaItems->quantidade = $item->quantidade;
                $encomendaItems->preco = $item->produto->price;
                $encomendaItems->save();

                $produto = Produto::find($item->produto_id);
                $produto->quantity = $produto->quantity - $item->quantidade;
                $produto->save();

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

    public function cancelar($id)
    {
        $encomenda = Encomenda::find($id);

        if ($encomenda->created_at->diffInMinutes(Carbon::now()) > 5){

            return redirect()->back()->with('error', 'Já não pode cancelar a encomenda!');

        }else {

            $encomenda->estado = 'reembolso';
            $encomenda->save();

            $movimentos = new Movimento;
            $movimentos->user_id = Auth()->id();
            $movimentos->movimento = "Encomenda Cancelada";
            $movimentos->objecto = "Encomenda";
            $movimentos->codigo = $encomenda->id;
            $movimentos->category = "Encomenda";
            $movimentos->save();

            return redirect()->back()->with('success', 'Encomenda Cancelada');
            
        }
    }

    public function enviado($id)
    {
        $encomenda = Encomenda::find($id);

        if (Auth::user()->role != 'administrador' && Auth::user()->role != 'gestor'){

            return redirect()->back()->with('error', 'Não tem autorização para realizar tal acção!');

        }else {

            $encomenda->estado = 'enviado';
            $encomenda->save();

            $movimentos = new Movimento;
            $movimentos->user_id = Auth()->id();
            $movimentos->movimento = "Encomenda Enviada";
            $movimentos->objecto = "Encomenda";
            $movimentos->codigo = $encomenda->id;
            $movimentos->category = "Encomenda";
            $movimentos->save();

            return redirect()->back()->with('success', 'Encomenda Enviada');
            
        }
    }

    public function entregue($id)
    {
        $encomenda = Encomenda::find($id);

        if (Auth::user()->role != 'administrador' && Auth::user()->role != 'gestor'){

            return redirect()->back()->with('error', 'Não tem autorização para realizar tal acção!');

        }else {

            $encomenda->estado = 'entregue';
            $encomenda->save();

            $movimentos = new Movimento;
            $movimentos->user_id = Auth()->id();
            $movimentos->movimento = "Encomenda Entregue";
            $movimentos->objecto = "Encomenda";
            $movimentos->codigo = $encomenda->id;
            $movimentos->category = "Encomenda";
            $movimentos->save();

            return redirect()->back()->with('success', 'Entrega Confirmado');
            
        }
    }

    public function reembolso($id)
    {
        $encomenda = Encomenda::find($id);

        if (Auth::user()->role != 'administrador' && Auth::user()->role != 'gestor'){

            return redirect()->back()->with('error', 'Não tem autorização para realizar tal acção!');

        }else {

            $encomenda->estado = 'reembolsado';
            $encomenda->save();

            $movimentos = new Movimento;
            $movimentos->user_id = Auth()->id();
            $movimentos->movimento = "Cliente Reembolsado";
            $movimentos->objecto = "Encomenda";
            $movimentos->codigo = $encomenda->id;
            $movimentos->category = "Encomenda";
            $movimentos->save();

            return redirect()->back()->with('success', 'Reembolso Confirmado');
            
        }
    }
}
