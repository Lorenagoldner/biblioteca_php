@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Título da Página -->
    <h1 class="mb-4">Lista de Livros</h1>

    <!-- Formulário de Pesquisa -->
    <form action="{{ route('livros.search') }}" method="GET" class="row row-cols-lg-auto g-3 align-items-center mb-4">
        <div class="col-12 col-lg-3">
            <input type="text" name="titulo" class="form-control" placeholder="Título" value="{{ request('titulo') }}">
        </div>
        <div class="col-12 col-lg-3">
            <input type="text" name="autor" class="form-control" placeholder="Autor" value="{{ request('autor') }}">
        </div>
        <div class="col-12 col-lg-3">
            <input type="text" name="genero" class="form-control" placeholder="Género" value="{{ request('genero') }}">
        </div>
        <div class="col-12 col-lg-3 d-flex">
            <button type="submit" class="btn btn-primary me-2">Pesquisar</button>
            <a href="{{ route('livros.index') }}" class="btn btn-secondary">Limpar</a>
        </div>
    </form>

    <!-- Botão para Adicionar Novo Livro -->
    <div class="mb-3">
        <a href="{{ route('livros.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Adicionar Novo Livro
        </a>
    </div>

    <!-- Tabela de Livros -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->author ? $livro->author->primeiro_nome . ' ' . $livro->author->ultimo_nome : 'Autor desconhecido' }}</td>
                    <td>{{ $livro->genero }}</td>
                    <td class="text-center">
                        <!-- Ações: Editar -->
                        <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <!-- Ações: Excluir -->
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-danger">
                        <strong>Nenhum livro encontrado!</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    @if($livros->hasPages())
        <div class="d-flex justify-content-center">
            {{ $livros->links('pagination::bootstrap-4') }}
        </div>
    @endif

</div>
@endsection
