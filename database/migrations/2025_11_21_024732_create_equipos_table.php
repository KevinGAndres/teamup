<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('id_equipo');
            $table->foreignId('creador_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('nombre');
            $table->string('deporte');
            $table->text('integrantes');
            $table->string('correo');
            $table->string('genero');
            $table->string('lugar');
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};