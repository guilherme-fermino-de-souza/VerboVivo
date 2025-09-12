<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        $categorias = Categoria::all();

        return view('livros.index', compact('livros', 'categorias'));
    }
    public function create()
    {
        $categorias = Categoria::all();
        return view('livros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:555',
            'autor' => 'required|string|max:255',
            'idioma' => 'required|string|max:255',
            'paisorigem' => 'required|string|max:255',
            'anolancamento' => 'integer|min:500|max:' . date('Y'),
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|numeric',
            'image' => 'nullable|image|mimes:png,jpg,gif|max:2048', // até 2MB
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            //$image = $request->file('image')->store(options: 'public/images/livros');
            $image = Storage::disk('public')->put('/images/livros', $request->file('image'));
        }

        $livro = Livro::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'autor' => $request->autor,
            'idioma' => $request->idioma,
            'paisorigem' => $request->paisorigem,
            'anolancamento' => $request->anolancamento,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            'image' => $image,
        ]);

        $livro->save();

        if ($request->has('categorias')) {
            $livro->categorias()->attach($request->categorias);
        }

        return redirect()->route('livro.index');
    }

    public function edit(Livro $livro)
    {
        return view('livro.edit', ['livro' => $livro]);
    }

    public function update(Livro $livro, Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:555',
            'autor' => 'required|string|max:255',
            'idioma' => 'required|string|max:255',
            'paisorigem' => 'required|string|max:255',
            'anolancamento' => 'nullable|date',
            'preco' => 'required|decimal:2',
            'quantidade' => 'required|numeric',
            'image' => 'nullable|image|max:2048', // até 2MB
            'size' => 'nullable|image|max:2048', // até 2MB
        ]);

        $image = $request->file('image');

        if ($image) {
            $name = $image->getClientOriginalName();
            $size = $image->getSize();
            $image->storeAs('public/Images/livros', $name);
        } else {
            // imagem padrão
            $name = 'book-cover-default.jpg';
            $size = 100; // opcional, se quiser
        }

        // Atualiza o livro
        $livro->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'autor' => $request->autor,
            'idioma' => $request->idioma,
            'paisorigem' => $request->paisorigem,
            'anolancamento' => $request->anolancamento,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            'name' => $name,
            'size' => $size,
        ]);

        if ($request->has('categorias')) {
            $livro->categorias()->sync($request->categorias); // use sync para não duplicar
        }

        return redirect()->route('livro.index')->with('success', 'Livro atualizado com sucesso');
    }

    public function destroy(Livro $livro)
    { //Exclude
        $livro->delete();
        return redirect()->route('livro.index')->with('success', 'Livro deletado com sucesso');
    }
}
