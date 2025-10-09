<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contato;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{

    public function index()
    {
        $contatos = Contato::paginate(10);

        return view('admin.contato.index', ['contatos' => $contatos]); //View pega DATA do CONTROLLER
    }

    public function create()
    {
        return view('content.contatos.create');
    }

    public function store(Request $request)
    { //Salvar
        $user = Auth::user();

        $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:255',
            'assunto' => 'required|max:255',
            'texto' => 'required|max:755',
        ]);

        Contato::create([
            'name' => $user->name,
            'email' => $user->email,
            'assunto' => $request->assunto,
            'texto' => $request->texto,
        ]);

        return redirect(route('welcome'));
    }

    public function edit(Contato $contato)
    {
        return view('content.contatos.edit', ['contato' => $contato]);
    }

    public function update(Contato $contato, Request $request)
    { //Recebe $data do form e atualiza $contato

        $user = Auth::user();

        $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:255',
            'assunto' => 'required|max:255',
            'texto' => 'required|max:755',
        ]);

        Contato::update([
            'name' => $user->name,
            'email' => $user->email,
            'assunto' => $request->assunto,
            'texto' => $request->texto,
        ]);

        return redirect(route('content.contato.index'))->with('success', 'Contato atualizado com sucesso');
    }

    public function destroy(Contato $contato)
    {
        $contato->delete();
        return redirect(route('content.contato.index'))->with('success', 'Contato apagado conm sucesso');
    }

    public function responder(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'mensagem' => 'required|string',
        ]);

        Mail::raw($request->mensagem, function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Resposta do Administrador - Espectrum');
        });

        return back()->with('success', 'Resposta enviada com sucesso!');
    }
}
