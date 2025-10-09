<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:255',
        ]);

        // Criar usuário como admin
        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'tipo_usuario' => 1, // 1 = admin
        ]);

        // Relacionar na tabela admins
        Admin::create([
            'usuario_id' => $user->id,
        ]);

        return redirect()->route('admin.index')->with('success', 'Administrador criado com sucesso!');
    }

    /**
     * Remover um administrador
     */
    public function destroy($id)
    {
        $user = User::where('tipo_usuario', 1)->findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Administrador excluído com sucesso!');
    }
}
