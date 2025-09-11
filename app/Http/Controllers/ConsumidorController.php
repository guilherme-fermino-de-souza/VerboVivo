<?php

namespace App\Http\Controllers;

use App\Models\Consumidor;
use App\Models\User;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConsumidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('consumidor.create');
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
            'email' => 'required|lowercase|email|unique:users,email',
            'password' => 'required|string|min:6|max:255',
            'cpf' => 'required|digits:11',
            'data_nascimento' => 'required|date',
            'cep' => 'nullable|string|max:255',
            'logradouro' => 'nullable|string|max:255',
            'endereco' => 'nullable|string|max:255',
            'rua' => 'nullable|string|max:255',
            'bairro' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'tipo_usuario' => 'required|in:2',
            'numero_telefone' => 'required|array|min:1',
            'numero_telefone.*' => 'required|string|max:20'
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.lowercase' => 'O campo email não deve conter letras maiúsculas',
            'email.email' => 'O campo email deve ser preenchido corretamente',
            'email.unique' => 'este email já eestá cadastrado',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'Senha deve conter ao menos 6 caracteres',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.digits' => 'O CPF deve conter exatamente 11 dígitos numéricos',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório',
            'numero_telefone.required' => 'O campo número de telefone é obrigatório (ao menos 1)',
            'numero_telefone.*.required' => 'O campo número de telefone é obrigatório (ao menos 1)',
        ]);

        if ($request->tipo_usuario != 2) { // 0.5 Define tipo Consumidor
            abort(403, 'Tentativa de fraude no tipo de usuário.');
        }

        // 1. Criar Usuário Padrão
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'endereco' => $request->endereco,
            'rua' => $request->rua,
            'bairro' => $request->bairro,
            'numero' => $request->numero,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'complemento' => $request->complemento,
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        // 2. Criar Dados Específicos Admin
        Consumidor::create([
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

        return redirect()->route('welcome')->with('Sucesso', 'Conta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumidor $consumidor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumidor $consumidor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consumidor $consumidor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumidor $consumidor)
    {
        //
    }
}
