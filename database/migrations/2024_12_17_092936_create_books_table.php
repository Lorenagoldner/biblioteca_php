<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('autor_id')->constrained('authors'); // Corrigido
            $table->string('genero');
            $table->string('lingua');
            $table->string('isbn')->unique();
            $table->year('publicacao_ano');
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */

     public function down(): void
     {
         Schema::dropIfExists('books');
     }
 };