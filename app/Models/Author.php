<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // Define a tabela associada
    protected $table = 'authors';

    // Define os campos atribuíveis
    protected $fillable = [
        'primeiro_nome',
        'ultimo_nome',
        'pais'
    ];

    // Relacionamento com Livro
    public function livros()
    {
        return $this->hasMany(Livro::class, 'autor_id');
    }
}
