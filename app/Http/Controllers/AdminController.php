<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 0. Validar Dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|lowercase|email|unique:tb_usuario,email',
            'password' => 'required|string|min:6|max:255',
            'cpf' => 'required|digits:11',
            'data_nascimento' => 'required|date',
            'tipo_usuario' => 'required|in:1',
            'numero_telefone' => 'required|array|min:1',
            'numero_telefone.*' => 'required|string|max:20'
        ]);

        if ($request->tipo_usuario != 1) { // 0.5 Define tipo Admin = 1
            abort(403, 'Tentativa de fraude no tipo de usuário.');
        }

        // 1. Criar Usuário Padrão
        $usuario = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        // 2. Criar Dados Específicos Admin
        Admin::create([
            'usuario_id' => $usuario->id,
        ]);
        // 3. Criar Telefone(s)
        foreach ($request->numero_telefone as $telefone) {
            Telefone::create([
                'usuario_id' => $usuario->id,
                'numero_telefone' => $telefone,
            ]);
        }

        Auth::login($usuario); //entra direto nessa bagaça

        return redirect()->route('welcome')->with('Sucesso', 'Usuário Tipo Admin cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
