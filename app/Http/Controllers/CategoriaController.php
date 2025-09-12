<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() { //VIEW-PRINCIPAL----------------------------------------------------------------------------------------------------------------
        $categorias = Categoria::paginate(10);
        //           nome das pastas
        return view('content.categorias.index', ['categorias' => $categorias]); //Our view can get data from controller
    }

    public function create() {
        return view('content.categorias.create');
    }

    public function store(Request $request) { //SALVAR-NO-BANCO------------------------------------------------------------------------------------------------
        $data = $request->validate([ 
            'categoria' => 'required',
        ]);

        $newCategoria = Categoria::create($data); //Saves on database

        return redirect(route('content.categoria.index'));
        //dd($request); acess data from the view
    }

    public function edit(Categoria $categoria){
        return view('content.categorias.edit', ['categoria' => $categoria]);
    }

    public function update(Categoria $categoria, Request $request) {
        $data = $request->validate([ 
            'categoria' => 'required',
        ]);

        $categoria->update($data);

        return redirect(route('content.categoria.index'))->with('sucess', 'Categoria Updated Suceffully');
    }

    public function destroy(Categoria $categoria) {
        $categoria->delete();
        return redirect(route('content.categoria.index'))->with('success', 'Categoria Deleted Suceffully ');
    }
}