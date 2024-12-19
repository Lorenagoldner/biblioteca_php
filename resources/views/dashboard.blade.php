@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bem-vindo ao Painel de Controle</h1>
    <p>Escolha uma das opções abaixo:</p>

    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('livros.index') }}" class="btn btn-primary btn-lg w-100">Gerenciar Livros</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('autores.index') }}" class="btn btn-secondary btn-lg w-100">Gerenciar Autores</a>
        </div>
    </div>
</div>
@endsection

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
