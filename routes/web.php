<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ConsumidorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LivroController;
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

Route::resource("/consumidor", ConsumidorController::class)->names("consumidor");

Route::get('/', function () {
    return view('welcome');
})->name('welcome'); //Página Principal

//Consumidor
Route::middleware('auth')->group(function () {

    //Contato
    Route::resource('contato', ContatoController::class)->names('contato');

    //Livro
    Route::resource('livro', LivroController::class)->names('livro');

    //Perfil
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

    //Index
    Route::get('/admin/index', [AdminController::class, 'index'])
        ->middleware('auth')
        ->name('admin.index');

    //Create
    Route::get('/admin/create', [AdminController::class, 'create'])
        ->middleware('auth')
        ->name('admin.create');

    //Store
    Route::get('/admin/store', [AdminController::class, 'store'])
        ->middleware('auth')
        ->name('admin.store');

    //Destroy
    Route::get('/admin/destroy', [AdminController::class, 'destroy'])
        ->middleware('auth')
        ->name('admin.destroy');

    //Categoria
    Route::resource("categorias", CategoriaController::class)
        ->names("categoria")
        ->parameters(["categorias" => "categoria"]);

    //Contato Review
    Route::get('/admin/contato', [ContatoController::class, 'index'])
        ->middleware('auth')
        ->name('contato.index');

    Route::post('/admin/contato/responder', [ContatoController::class, 'responder'])->name('contato.responder');

    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard.index');
});

require __DIR__ . '/auth.php';
