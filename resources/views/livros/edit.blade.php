@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Editar Livro</h1>

    <form action="{{ route('livros.update', $livro->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Isso é necessário para indicar que é uma atualização -->

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $livro->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select name="autor_id" id="autor_id" class="form-control" required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}" {{ $livro->autor_id == $autor->id ? 'selected' : '' }}>
                        {{ $autor->primeiro_nome }} {{ $autor->ultimo_nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <input type="text" name="genero" id="genero" class="form-control" value="{{ old('genero', $livro->genero) }}" required>
        </div>

        <div class="mb-3">
            <label for="lingua" class="form-label">Língua</label>
            <input type="text" name="lingua" id="lingua" class="form-control" value="{{ old('lingua', $livro->lingua) }}" required>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn', $livro->isbn) }}" required>
        </div>

        <div class="mb-3">
            <label for="publicacao_ano" class="form-label">Ano de Publicação</label>
            <input type="number" name="publicacao_ano" id="publicacao_ano" class="form-control" value="{{ old('publicacao_ano', $livro->publicacao_ano) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar alterações</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
