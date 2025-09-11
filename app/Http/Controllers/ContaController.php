<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conta;

class ContaController extends Controller
{
    public function index(){
        $contas = Conta::all();
        return view('criarconta.index', ['criarconta' => $contas]);
    }

    public function create(){
        return view('criarconta.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'tipo' => 'required',
        ]);

        $newConta = Conta::create($data);

        return redirect(route('conta.index'));
    }

    public function edit(Conta $conta){
        return view('criarconta.edit', ['criarconta' => $conta]);
    }

    public function update(Conta $conta, Request $request) {
        $data = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
            'tipo' => 'required',
        ]);

        $conta->update($data);

        return redirect(route('conta.index'))->with('success', 'atualizado com sucesso');
    }

    public function destroy(Conta $conta){
        $conta->delete();
        return redirect(route('conta.index'))->with('success', 'deletado com sucesso');
    }
}
