<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(10);

        $ultimasCategorias = Categoria::orderBy('created_at', 'desc')->take(5)->get();
        $categoriasMaisUsadas = Categoria::withCount('livros')
            ->orderByDesc('livros_count')
            ->take(5)
            ->get();

        return view('admin.categorias.index', [
            'categorias' => $categorias,
            'ultimasCategorias' => $ultimasCategorias,
            'categoriasMaisUsadas' => $categoriasMaisUsadas,
            'chartData' => [
                'labels' => $categoriasMaisUsadas->pluck('categoria'),
                'values' => $categoriasMaisUsadas->pluck('livros_count'),
            ]
        ]);
    }

    public function create()
    {
        return view('content.categorias.create');
    }

    public function store(Request $request)
    { //SALVAR-NO-BANCO------------------------------------------------------------------------------------------------
        $data = $request->validate([
            'categoria' => 'required',
        ]);

        $newCategoria = Categoria::create($data); //Saves on database

        return redirect(route('content.categoria.index'));
        //dd($request); acess data from the view
    }

    public function edit(Categoria $categoria)
    {
        return view('content.categorias.edit', ['categoria' => $categoria]);
    }

    public function update(Categoria $categoria, Request $request)
    {
        $data = $request->validate([
            'categoria' => 'required',
        ]);

        $categoria->update($data);

        return redirect(route('categoria.index'))->with('sucess', 'Categoria Updated Suceffully');
    }

    public function destroy(Categoria $categoria)
    {
        // Desassocia todos os livros da categoria
        $categoria->livros()->detach();

        // Agora pode deletar a categoria
        $categoria->delete();

        return redirect()->route('categoria.index')
            ->with('success', 'Categoria deletada com sucesso!');
    }
}
