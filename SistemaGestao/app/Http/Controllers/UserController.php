<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sistema/cadastro');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store_user(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('login');
    }

    public function login()
    {
        return view('sistema/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function logar(Request $request)
    {
        $credentials = $request->only(['email','password']);

        if (Auth::attempt($credentials)){

            return redirect()->intended(route('index'));

        }else{

            return redirect()->back()->withErrors(['Dados Inválidos']);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
