<!-- resources/views/autores/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h1>Adicionar Novo Autor</h1>

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="primeiro_nome" class="form-label">Primeiro Nome</label>
            <input type="text" name="primeiro_nome" id="primeiro_nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ultimo_nome" class="form-label">Último Nome</label>
            <input type="text" name="ultimo_nome" id="ultimo_nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" name="pais" id="pais" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-success">Adicionar Autor</button>
    </form>

</div>
@endsection

