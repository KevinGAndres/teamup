<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id('id_torneo');
            $table->string('nombre');
            $table->string('deporte');
            $table->unsignedSmallInteger('cantidad_equipos');
            $table->string('formato');
            $table->string('lugar');
            $table->text('premios')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};