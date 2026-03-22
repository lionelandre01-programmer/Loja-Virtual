<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/produto', [ProdutoController::class, 'index_API']);