@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Adicionar Novo Livro</h1>

    <form action="{{ route('livros.store') }}" method="POST">
    @csrf

    <label>Título:</label>
    <input type="text" name="titulo" class="form-control" required>

    <label>Autor:</label>
    <select name="autor_id" class="form-control" required>
        @foreach ($autores as $autor)
            <option value="{{ $autor->id }}">{{ $autor->primeiro_nome }} {{ $autor->ultimo_nome }}</option>
        @endforeach
    </select>

    <label>Gênero:</label>
    <input type="text" name="genero" class="form-control" required>

    <label>Língua:</label>
    <input type="text" name="lingua" class="form-control" required>

    <label>ISBN:</label>
    <input type="text" name="isbn" class="form-control" required>

    <label>Ano de Publicação:</label>
    <input type="number" name="publicacao_ano" class="form-control" required>

    <button type="submit" class="btn btn-success mt-3">Salvar</button>

    </form>
</div>
@endsection
