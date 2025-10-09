<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Listar todos os administradores
     */
    public function index(Request $request)
    {
        $query = User::query()->where('tipo_usuario', 1); // apenas admins

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $ordem = $request->input('ordem', 'desc');
        $admins = $query->orderBy('created_at', $ordem)->paginate(10)->appends($request->all());

        return view('admin.administradores.index', compact('admins'));
    }

    /**
     * Exibir formulário para criar novo admin
     */
    public function create()
    {
        return view('admin.create-admin.index');
    }

    /**
     * Armazenar novo administrador
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|max:255',
                'cpf' => 'required|digits:11',
                'data_nascimento' => 'required|date',
                'numero_telefone' => 'required|array|min:1',
                'numero_telefone.*' => 'required|string|max:20',
                'foto' => 'nullable|image|mimes:png,jpg,gif|max:2048', // até 2MB
            ],
            [ //msg erros validação
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

                'foto.image' => 'O arquivo deve ser uma imagem.',
                'foto.mimes' => 'A imagem deve estar nos formatos PNG, JPG ou GIF.',
                'foto.max' => 'A imagem pode ter no máximo 2MB.',
            ]
        );

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = Storage::disk('public')->put('/images/perfil', $request->file('foto'));
        }

        // Criar usuário como admin
        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'tipo_usuario' => 1, // 1 = admin
            'status_conta' => 1, // ativo
            'foto' => $foto,
        ]);

        // Relacionar na tabela admins
        Admin::create([
            'usuario_id' => $user->id,
        ]);

        // 3. Criar Telefone(s)
        foreach ($request->numero_telefone as $telefone) {
            Telefone::create([
                'usuario_id' => $user->id,
                'numero_telefone' => $telefone,
            ]);
        }

        return redirect()->route('admin.index')->with('success', 'Administrador criado com sucesso!');
    }

    /**
     * Remover um administrador
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->back()->with('error', 'O administrador chefe não pode ser excluído!');
        }

        $user = User::where('tipo_usuario', 1)
            ->where('id', $id)
            ->firstOrFail();

        $user->delete();

        return redirect()->back()->with('success', 'Administrador excluído com sucesso!');
    }
}
