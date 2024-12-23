@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Cabeçalho da Página -->
    <div class="text-center mb-5">
        <h1 class="display-4">📚 Bem-vindo à Biblioteca Virtual</h1>
        <p class="lead">Explore nosso catálogo de livros e gerencie seus autores favoritos.</p>
    </div>

    <!-- Painel de Opções -->
    <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h5 class="card-title">📖 Livros</h5>
                    <p class="card-text">Visualize, adicione, edite e pesquise livros no catálogo.</p>
                    <a href="{{ route('livros.index') }}" class="btn btn-primary w-100">Acessar Livros</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <h5 class="card-title">✒️ Autores</h5>
                    <p class="card-text">Gerencie informações dos autores dos livros.</p>
                    <a href="{{ route('autores.index') }}" class="btn btn-secondary w-100">Acessar Autores</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de Informações -->
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h2 class="mb-4">📚 Sobre a Biblioteca</h2>
            <p>
                Esta é uma plataforma intuitiva para gerenciar uma biblioteca. Aqui, você pode explorar um extenso catálogo de livros, 
                gerenciar autores, e encontrar seu próximo livro favorito. 
            </p>
        </div>
    </div>
</div>
@endsection
