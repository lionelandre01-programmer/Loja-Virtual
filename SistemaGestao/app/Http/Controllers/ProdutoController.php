<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Função que leva para a home
     */
    public function index()
    {
        return view('sistema/index');
    }

    /**
     * Função que leva para a loja
     */
    public function loja()
    {
        $produtos = Produto::all();
        return view('produto/produto', ['produtos' => $produtos]);
    }

    /**
     * Função que leva para o formulário de cadastro de produto
     */
    public function create()
    {
        return view('produto/create');
    }

    /**
     * Função que armazena o produto na base de dados
     */
    public function store(Request $request)
    {
        $produto = new Produto;

        $produto->name = $request->name;
        $produto->price = $request->price;
        $produto->category = $request->category;
        $produto->genero = $request->genero;
        $produto->description = $request->description;
        
        //upload da imagem
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . $produto->id) . '.' . $extension;

            $requestImage->move(public_path('imagens/img_product'), $imageName);

            $produto->image = $imageName;
        }

        $produto->save();

        return redirect()->route('loja');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produto/show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('produto/edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);

        $produto->name = $request->name;
        $produto->price = $request->price;
        $produto->category = $request->category;
        $produto->genero = $request->genero;
        $produto->description = $request->description;

        //upload da imagem
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . $produto->id) . '.' . $extension;

            $requestImage->move(public_path('imagens/img_product'), $imageName);

            $produto->image = $imageName;
        }

        $produto->save();

        return redirect()->route('loja');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('loja');
    }

    // Funções que separam produtos por género

    public function masculino()
    {
        $produtos = Produto::Where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);  
    }

    public function feminino()
    {
        $produtos = Produto::Where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);  
    }

    public function joias()
    {
        $produtos = Produto::Where('category','joia')->get();
        return view('produto/joias', ['produtos' => $produtos]);  
    }

    public function joias_masc()
    {
        $produtos = Produto::Where('category','joia')->where('genero','masculino')->get();
        return view('produto/joias', ['produtos' => $produtos]);  
    }

    public function joias_femi()
    {
        $produtos = Produto::Where('category','joia')->where('genero','feminino')->get();
        return view('produto/joias', ['produtos' => $produtos]);  
    }

    // Funções que separem produtos por categoria e gênero

    //Do lado Masculino

    public function joias_masculinas()
    {
        $produtos = Produto::Where('category','joia')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function camisas()
    {
        $produtos = Produto::Where('category','camisa')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function calcas_masculinas()
    {
        $produtos = Produto::Where('category','calça')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function carteiras_masculinas()
    {
        $produtos = Produto::Where('category','carteira')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function chinelos_masculinas()
    {
        $produtos = Produto::Where('category','chinelo')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function chapeus_masculinas()
    {
        $produtos = Produto::Where('category','chapeu')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function calcados_masculinas()
    {
        $produtos = Produto::Where('category','calçado')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function mochilas_masculinas()
    {
        $produtos = Produto::Where('category','mochila')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function casacos_masculinas()
    {
        $produtos = Produto::Where('category','casaco')->where('genero','masculino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

    public function macacoes_masculinas()
    {
        $produtos = Produto::Where('category','macacao')->where('genero','feminino')->get();
        return view('produto/masculino', ['produtos' => $produtos]);
    }

        //Do lado Feminino

    public function joias_femininas()
    {
        $produtos = Produto::Where('category','joia')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function blusas()
    {
        $produtos = Produto::Where('category','blusa')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function calcas_femininas()
    {
        $produtos = Produto::Where('category','calça')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function carteiras_femininas()
    {
        $produtos = Produto::Where('category','carteira')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function chinelos_femininas()
    {
        $produtos = Produto::Where('category','chinelo')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function chapeus_femininas()
    {
        $produtos = Produto::Where('category','chapeu')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function calcados_femininas()
    {
        $produtos = Produto::Where('category','calçado')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function mochilas_femininas()
    {
        $produtos = Produto::Where('category','mochila')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function casacos_femininas()
    {
        $produtos = Produto::Where('category','casaco')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

    public function macacoes_femininas()
    {
        $produtos = Produto::Where('category','macacao')->orWhere('category','vestido')->where('genero','feminino')->get();
        return view('produto/feminino', ['produtos' => $produtos]);
    }

}
