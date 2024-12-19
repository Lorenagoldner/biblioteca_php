<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;


require __DIR__.'/auth.php';

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Dashboard protegido por autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {

    // Gerenciamento de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de Livros
    Route::resource('livros', LivroController::class);

    // Pesquisa de livros
    //Route::get('/livros/pesquisar', [LivroController::class, 'search'])->name('livros.search');
    //Route::get('/livros/search', [LivroController::class, 'search'])->name('livros.search');
    Route::get('/search', [LivroController::class, 'search'])->name('livros.search');

    // Add Livro Route
    Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');

    

    Route::resource('autores', AutorController::class);


    // Criar autores
    Route::get('/autores/create', [AutorController::class, 'create'])->name('autores.create');
    Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');

});