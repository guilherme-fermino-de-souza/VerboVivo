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
        $livros = Livro::paginate(10);
        $categorias = Categoria::all();

        return view('content.livros.index', compact('livros', 'categorias'));
    }
    public function create()
    {
        $categorias = Categoria::all();
        return view('content.livros.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|string|max:555',
                'autor' => 'required|string|max:255',
                'idioma' => 'required|string|max:255',
                'paisorigem' => 'required|string|max:255',
                'anolancamento' => 'integer|min:500|max:' . date('Y'),
                'preco' => 'required|numeric|min:0',
                'quantidade' => 'required|numeric',
                'image' => 'nullable|image|mimes:png,jpg,gif|max:2048', // até 2MB
            ],
            [
                'titulo.required' => 'O campo título é obrigatório.',
                'titulo.string' => 'O título deve ser um texto válido.',
                'titulo.max' => 'O título pode ter no máximo 255 caracteres.',

                'descricao.required' => 'A descrição é obrigatória.',
                'descricao.string' => 'A descrição deve ser um texto válido.',
                'descricao.max' => 'A descrição pode ter no máximo 555 caracteres.',

                'autor.required' => 'O autor é obrigatório.',
                'autor.string' => 'O autor deve ser um texto válido.',
                'autor.max' => 'O autor pode ter no máximo 255 caracteres.',

                'idioma.required' => 'O idioma é obrigatório.',
                'idioma.string' => 'O idioma deve ser um texto válido.',
                'idioma.max' => 'O idioma pode ter no máximo 255 caracteres.',

                'paisorigem.required' => 'O país de origem é obrigatório.',
                'paisorigem.string' => 'O país de origem deve ser um texto válido.',
                'paisorigem.max' => 'O país de origem pode ter no máximo 255 caracteres.',

                'anolancamento.integer' => 'O ano de lançamento deve ser um número inteiro.',
                'anolancamento.min' => 'O ano de lançamento deve ser no mínimo 500.',
                'anolancamento.max' => 'O ano de lançamento não pode ser maior que o ano atual.',

                'preco.required' => 'O preço é obrigatório.',
                'preco.numeric' => 'O preço deve ser um número.',
                'preco.min' => 'O preço não pode ser negativo.',

                'quantidade.required' => 'A quantidade é obrigatória.',
                'quantidade.numeric' => 'A quantidade deve ser um número.',

                'image.image' => 'O arquivo deve ser uma imagem.',
                'image.mimes' => 'A imagem deve estar nos formatos PNG, JPG ou GIF.',
                'image.max' => 'A imagem pode ter no máximo 2MB.',
            ]
        );

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
            'tipo_image' => "storage",
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
        return view('content.livros.edit', ['livro' => $livro]);
    }

    public function update(Livro $livro, Request $request)
    {
        $request->validate(
            [
                'titulo' => 'required|string|max:255',
                'descricao' => 'required|string|max:555',
                'autor' => 'required|string|max:255',
                'idioma' => 'required|string|max:255',
                'paisorigem' => 'required|string|max:255',
                'anolancamento' => 'nullable|integer',
                'preco' => 'required|decimal:2',
                'quantidade' => 'required|numeric',
                'image' => 'nullable|image|max:2048', // até 2MB
                'size' => 'nullable|image|max:2048', // até 2MB
            ],
            [
                'titulo.required' => 'O campo título é obrigatório.',
                'titulo.string' => 'O título deve ser um texto válido.',
                'titulo.max' => 'O título pode ter no máximo 255 caracteres.',

                'descricao.required' => 'A descrição é obrigatória.',
                'descricao.string' => 'A descrição deve ser um texto válido.',
                'descricao.max' => 'A descrição pode ter no máximo 555 caracteres.',

                'autor.required' => 'O autor é obrigatório.',
                'autor.string' => 'O autor deve ser um texto válido.',
                'autor.max' => 'O autor pode ter no máximo 255 caracteres.',

                'idioma.required' => 'O idioma é obrigatório.',
                'idioma.string' => 'O idioma deve ser um texto válido.',
                'idioma.max' => 'O idioma pode ter no máximo 255 caracteres.',

                'paisorigem.required' => 'O país de origem é obrigatório.',
                'paisorigem.string' => 'O país de origem deve ser um texto válido.',
                'paisorigem.max' => 'O país de origem pode ter no máximo 255 caracteres.',

                'anolancamento.integer' => 'O ano de lançamento deve ser um número inteiro.',
                'anolancamento.min' => 'O ano de lançamento deve ser no mínimo 500.',
                'anolancamento.max' => 'O ano de lançamento não pode ser maior que o ano atual.',

                'preco.required' => 'O preço é obrigatório.',
                'preco.numeric' => 'O preço deve ser um número.',
                'preco.min' => 'O preço não pode ser negativo.',

                'quantidade.required' => 'A quantidade é obrigatória.',
                'quantidade.numeric' => 'A quantidade deve ser um número.',

                'image.image' => 'O arquivo deve ser uma imagem.',
                'image.mimes' => 'A imagem deve estar nos formatos PNG, JPG ou GIF.',
                'image.max' => 'A imagem pode ter no máximo 2MB.',
            ]
        );

        $image = $request->file('image');

        if ($image) {
            $path = $image->storeAs('public/Images/livros', $image->getClientOriginalName());
            $imagePath = 'Images/livros/' . $image->getClientOriginalName();
            $tipoImage  = 'storage';
        } else {
            // imagem padrão
            $imagePath = 'Images/livros/book-cover-default.jpg';
            $tipoImage = 'public'; // imagem padrão é da pasta public
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
            'tipo_image' => $tipoImage,
            'image' => $imagePath,
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
