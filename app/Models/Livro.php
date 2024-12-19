<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author; // Certifique-se de que o modelo Author exista

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

    // Método Estático para listar todos os livros
    public static function listarLivros()
    {
        return self::all(); // Retorna todos os livros
    }

    // Método Estático para buscar livros por título
    public static function buscarPorTitulo($titulo)
    {
        return self::where('titulo', 'like', '%' . $titulo . '%')->get(); // Pesquisa por título
    }

    // Método Estático para consultar um livro e seu autor
    public static function consultarLivroComAutor($id)
    {
        return self::with('author')->find($id); // Retorna um livro com seu autor
    }
    
}
