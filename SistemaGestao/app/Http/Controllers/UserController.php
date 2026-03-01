<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'administrador')->exists();
        return view('sistema/cadastro', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store_user(Request $request)
    {
        if ($request->password == $request->password_confirm){

            if ( !$request->filled('role') ){

                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'role' => 'cliente',
                    'password' => $request->password
                ]);

                Auth::login($user);
                return redirect()->route('index');

            }else{

                if (User::count() != 0 && (Auth::user()->role != 'administrador' && Auth::user()->role != 'gestor')){

                    $user = User::create([
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'role' => 'cliente',
                        'password' => $request->password
                    ]);

                    Auth::login($user);
                    return redirect()->route('index');

                }else{

                    if (User::count() != 0 && Auth::user()->role == 'gestor' && ($request->role == 'gestor' or $request->role == 'administrador')){

                        return redirect()->back()->with('error', 'Não está autorizado a delegar tal função!');

                    }else{

                        $user = User::create([
                            'first_name' => $request->first_name,
                            'last_name' => $request->last_name,
                            'phone' => $request->phone,
                            'email' => $request->email,
                            'role' => $request->role,
                            'password' => $request->password
                        ]);

                        $movimentos = new Movimento;
                        $movimentos->movimento = "Novo Usuário";
                        $movimentos->codigo = $user->id;
                        $movimentos->user_id = Auth()->id();
                        $movimentos->objecto = $user->first_name . "" . $user->last_name;
                        $movimentos->category = "Usuário";
                        $movimentos->save();

                        return redirect()->back()->with('success', 'Novo Usuário Cadastrado!');
                    }

                }

            }
            

        }else{

            return redirect()->back()->with('error', 'A palavra-passe e a confirmação da palavra-passe devem ser idênticas!');
        }

        
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
     * Display the user profile page.
     */
    public function showProfile()
    {
        $user = Auth::user();
        
        return view('sistema.meuperfil', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        $user = auth()->user();
        $user->update($request->all());

        return redirect()->back()->with('success', 'Dados actualizados com sucesso!');

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
