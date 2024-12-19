<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executar a migração.
     */
    public function up(): void
    {
        Schema::rename('books', 'livros');
    }

    /**
     * Reverter a migração.
     */
    public function down(): void
    {
        Schema::rename('livros', 'books');
    }
};
