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
        Schema::create('personaje_clase_dnd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personaje_id')
                    ->constrained('personajes')
                    ->onDelete('cascade');

            //Clave foranea a la tabla recursos_juego (donde tipo = 'clase' o 'clase_dnd')
            $table->foreignId('clase_id')
                    ->constrained('recursos_juego')
                    ->onDelete('cascade');

            // Nivel de la clase, que no puede ser negativo
            $table->unsignedSmallInteger('nivel')->default(1);

            $table->unique(['personaje_id', 'clase_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personaje_clase_dnd');
    }
};
