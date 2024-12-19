<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;

// Listar todos os livros
$livros = Livro::all();

// Pesquisar por título
$livrosPorTitulo = Livro::where('titulo', 'like', '%PHP%')->get();

// Consultar um livro e seu autor
$livros = Livro::with('author')->find(1);

class Livro extends Model
{
    use HasFactory;

    // Define a tabela associada
    protected $table = 'livros';

    // Define os campos atribuíveis em massa
    protected $fillable = [
        'titulo',
        'autor_id',
        'genero',
        'lingua',
        'isbn',
        'publicacao_ano',
        'observacoes'
    ];

    // Relacionamento com Author
    public function author()
    {
        return $this->belongsTo(Author::class, 'autor_id');
    }
}
