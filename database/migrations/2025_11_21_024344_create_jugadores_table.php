<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id('id_jugador');
            $table->foreignId('id_usuario')->constrained('users', 'id_usuario')->cascadeOnDelete();
            $table->string('nombre');
            $table->unsignedTinyInteger('edad');
            $table->string('correo');
            $table->string('deporte');
            $table->string('posicion');
            $table->string('genero');
            $table->string('telefono');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};