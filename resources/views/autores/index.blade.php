<!-- resources/views/autores/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Lista de Autores</h1>

    <!-- Botão para Adicionar Novo Autor -->
    

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Pais</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $autor)
            <tr>
                <td>{{ $autor->id }}</td>
                <td>{{ $autor->primeiro_nome }} {{ $autor->ultimo_nome }}</td>
                <td>{{ $autor->pais }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-3">
        <a href="{{ route('autores.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Adicionar Novo Autor
        </a>
    </div>
</div>
@endsection
