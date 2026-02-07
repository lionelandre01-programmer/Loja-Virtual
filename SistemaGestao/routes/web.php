<?php

use Illuminate\Support\Facades\Route;
use App\Models\Encomenda;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\UserController;

Route::get('/', [ProdutoController::class, 'index'])->name('index');

Route::get('/loja', [ProdutoController::class, 'loja'])->name('loja');


Route::group(['prefix' => 'produto'], function(){

    Route::get('/create', [ProdutoController::class, 'create'])->name('create');
    Route::post('/store', [ProdutoController::class, 'store'])->name('store');
    Route::get('/roupeiro-masculino', [ProdutoController::class, 'masculino'])->name('masculino');
    Route::get('/show/{id}', [ProdutoController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProdutoController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProdutoController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [ProdutoController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'loja'], function(){

    Route::get('/roupeiro-feminino', [ProdutoController::class, 'feminino'])->name('feminino');
    Route::get('/joias', [ProdutoController::class, 'joias'])->name('joias');
    Route::get('/joias/masculinas', [ProdutoController::class, 'joias_masc'])->name('joias_masc');
    Route::get('/joias/femininas', [ProdutoController::class, 'joias_femi'])->name('joias_femi');
});

Route::group(['prefix' => 'masculino'], function(){

    Route::get('/joias', [ProdutoController::class, 'joias_masculinas'])->name('joias_masculinas');
    Route::get('/camisas', [ProdutoController::class, 'camisas'])->name('camisas');
    Route::get('/calcas', [ProdutoController::class, 'calcas_masculinas'])->name('calcas_masculinas');
    Route::get('/carteiras', [ProdutoController::class, 'carteiras_masculinas'])->name('carteiras_masculinas');
    Route::get('/chinelos', [ProdutoController::class, 'chinelos_masculinas'])->name('chinelos_masculinas');
    Route::get('/chapeus', [ProdutoController::class, 'chapeus_masculinas'])->name('chapeus_masculinas');
    Route::get('/calcados', [ProdutoController::class, 'calcados_masculinas'])->name('calcados_masculinas');
    Route::get('/mochilas', [ProdutoController::class, 'mochilas_masculinas'])->name('mochilas_masculinas');
    Route::get('/casacos', [ProdutoController::class, 'casacos_masculinas'])->name('casacos_masculinas');
    Route::get('/macacoes', [ProdutoController::class, 'macacoes_masculinas'])->name('macacoes_masculinas');
});

Route::group(['prefix' => 'feminino'], function(){

    Route::get('/femininas/joias', [ProdutoController::class, 'joias_femininas'])->name('joias_femininas');
    Route::get('/femininas/blusas', [ProdutoController::class, 'blusas'])->name('blusas');
    Route::get('/femininas/calcas', [ProdutoController::class, 'calcas_femininas'])->name('calcas_femininas');
    Route::get('/femininas/carteiras', [ProdutoController::class, 'carteiras_femininas'])->name('carteiras_femininas');
    Route::get('/femininas/chinelos', [ProdutoController::class, 'chinelos_femininas'])->name('chinelos_femininas');
    Route::get('/femininas/chapeus', [ProdutoController::class, 'chapeus_femininas'])->name('chapeus_femininas');
    Route::get('/femininas/calcados', [ProdutoController::class, 'calcados_femininas'])->name('calcados_femininas');
    Route::get('/femininas/mochilas', [ProdutoController::class, 'mochilas_femininas'])->name('mochilas_femininas');
    Route::get('/femininas/casacos', [ProdutoController::class, 'casacos_femininas'])->name('casacos_femininas');
    Route::get('/femininas/macacoes_e_vestidos', [ProdutoController::class, 'macacoes_femininas'])->name('macacoes_femininas');
});

Route::group(['prefix' => 'carrinho', 'middleware' => 'auth'], function(){

    Route::get('/', [CarrinhoController::class, 'index'])->name('carrinho');
    Route::post('/adicionar/{id}', [CarrinhoController::class, 'adicionar'])->name('adicionar');
    Route::get('/alterForm/{id}', [CarrinhoController::class, 'alterForm'])->name('alterForm');
    Route::post('/alter/{id}', [CarrinhoController::class, 'alter'])->name('alter');
});

Route::group(['prefix' => 'user'], function(){

    Route::get('/registrar', [UserController::class, 'index'])->name('registrar');
    Route::post('/postRegistrar', [UserController::class, 'store_user'])->name('registrar.post');
    Route::get('/fazerLogin', [UserController::class, 'login'])->name('login');
    Route::post('/postLogin', [UserController::class, 'logar'])->name('login.post');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});