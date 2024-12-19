<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Author;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    // Listar todos os livros
    public function index()
    {
        $livros = Livro::with('author')->paginate(10); // Adicionada paginação
        return view('livros.index', compact('livros'));
    }

    // Mostrar detalhes de um livro
    public function show($id)
    {
        $livro = Livro::with('author')->findOrFail($id);
        return view('livros.show', compact('livro'));
    }

    // Criar novo livro
    public function create()
    {
        $autores = Author::all();
        return view('livros.create', compact('autores'));
    }

    // Armazenar novo livro
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:authors,id',
            'genero' => 'required|string|max:100',
            'lingua' => 'required|string|max:50',
            'isbn' => 'required|string|unique:livros,isbn|max:13',
            'publicacao_ano' => 'required|integer|min:1900|max:' . date('Y'),
        ]);
    
        // Criação do registro
        Livro::create($validated);
    
        // Redirecionamento com mensagem de sucesso
        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso!');
    }

    public $timestamps = false;  // Desativa timestamps automáticos

    // Editar um livro
    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        $autores = Author::all();
        return view('livros.edit', compact('livro', 'autores'));
    }

    // Atualizar um livro
    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        // Validação dos dados
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:authors,id',
            'genero' => 'required|string|max:100',
            'lingua' => 'required|string|max:50',
            'isbn' => 'required|string|max:13|unique:livros,isbn,' . $livro->id,
            'publicacao_ano' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Atualizar o livro
        $livro->update($validated);

        // Redirecionar com sucesso
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    // Excluir um livro
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);

        // Excluir o livro
        $livro->delete();

        // Redirecionar com sucesso
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }

    // Pesquisar livros
    public function search(Request $request)
    {
        $query = Livro::query();

        // Filtros de pesquisa
        if ($request->filled('titulo')) {
            $query->where('titulo', 'LIKE', '%' . $request->titulo . '%');
        }

        if ($request->filled('autor')) {
            $query->whereHas('author', function ($q) use ($request) {
                $q->where('primeiro_nome', 'LIKE', '%' . $request->autor . '%')
                  ->orWhere('ultimo_nome', 'LIKE', '%' . $request->autor . '%');
            });
        }

        if ($request->filled('genero')) {
            $query->where('genero', 'LIKE', '%' . $request->genero . '%');
        }

        // Paginação dos resultados
        $livros = $query->paginate(10); 

        return view('livros.index', compact('livros'));
    }

}
