<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() { //VIEW-PRINCIPAL----------------------------------------------------------------------------------------------------------------
        $categorias = Categoria::all();
        //           nome das pastas
        return view('categorias.index', ['categoria' => $categorias]); //Our view can get data from controller
    }

    public function create() {
        return view('categorias.create');
    }

    public function store(Request $request) { //SALVAR-NO-BANCO------------------------------------------------------------------------------------------------
        $data = $request->validate([ 
            'categoria' => 'required',
        ]);

        $newCategoria = Categoria::create($data); //Saves on database

        return redirect(route('categoria.index'));
        //dd($request); acess data from the view
    }

    public function edit(Categoria $categoria){
        return view('categorias.edit', ['categoria' => $categoria]);
    }

    public function update(Categoria $categoria, Request $request) {
        $data = $request->validate([ 
            'categoria' => 'required',
        ]);

        $categoria->update($data);

        return redirect(route('categoria.index'))->with('sucess', 'Categoria Updated Suceffully');
    }

    public function destroy(Categoria $categoria) {
        $categoria->delete();
        return redirect(route('categoria.index'))->with('success', 'Categoria Deleted Suceffully ');
    }
}