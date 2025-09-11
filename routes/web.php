<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ConsumidorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource("/consumidor", ConsumidorController::class)->names("consumidor");

//Consumidor
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome'); //Página Principal

    Route::get('/carousel', function () {
        return view('templates.carousel');

    })->name('carousel'); //Página Principal 

    Route::get('/cardshome', function () {
        return view('templates.cardshome');
    })->name('cardshome'); //Página Principal 
    
    Route::get('/cardstatik', function () {
        return view('templates.cardstatik');
    })->name('cardstatik'); //Página Principal 

    //Contato
    Route::resource('contato', ContatoController::class)->names('contato');

    //Livro
    Route::get('/livros', [LivroController::class, 'index'])->name('livros.index'); //Livros Protótipo
    Route::get('/livros/create', [LivroController::class, 'create'])->name('livro.create'); //Livros Protótipo
    Route::post('/livros', [LivroController::class, 'store'])->name('livro.store'); //Livros Protótipo
    Route::get('/livros/{livro}/edit', [LivroController::class, 'edit'])->name('livro.edit');
    Route::put('/livros/{livro}/update', [LivroController::class, 'update'])->name('livro.update'); //"put" for update
    Route::delete('/livros/{livro}/destroy', [LivroController::class, 'destroy'])->name('livro.destroy'); //"put" for update

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Apenas Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    //Admin
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    //Categoria
    Route::resource("categorias", CategoriaController::class)
        ->names("categoria")
        ->parameters(["categorias" => "categoria"]);
});

require __DIR__ . '/auth.php';
