<?php

namespace App\Http\Controllers;

use App\Models\Author; // Certifique-se de que o modelo Author está sendo importado
use Illuminate\Http\Request;

class AutorController extends Controller
{
    // Listar todos os autores
    public function index()
    {
        $autores = Author::all(); // Buscar todos os autores
        return view('autores.index', compact('autores')); // Passar os dados para a view
    }

    public function create()
    {
        return view('autores.create');
    }

    // Gravar Autor no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'primeiro_nome' => 'required|string|max:255',
            'ultimo_nome' => 'required|string|max:255',
            'pais' => 'nullable|string',
        ]);

        // Novo Autor
        Author::create($validated);

        return redirect()->route('autores.index')->with('success', 'Autor adicionado com sucesso!');
    }
}
