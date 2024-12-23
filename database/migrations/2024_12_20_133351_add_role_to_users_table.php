<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Adicionando a coluna role
        $table->string('role')->default('user');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // Remover a coluna role caso a migração seja revertida
        $table->dropColumn('role');
    });
}

};
