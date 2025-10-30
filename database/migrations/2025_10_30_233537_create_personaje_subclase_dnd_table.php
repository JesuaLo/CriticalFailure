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
        Schema::create('personaje_subclase_dnd', function (Blueprint $table) {
            //tabla pivote entre perosnajes y subclases dnd
            $table->id();
            //relación con personaje
            $table->foreignId('personaje_id')
                    ->constrained('personajes')
                    ->onDelete('cascade');
            //relacion con la clase a la que pertenece la subclase
            $table->foreignId('clase_id')
                    ->constrained('recursos_juego')
                    ->onDelete('cascade');
            //relacion con la subclase, que es un recurso_juego
            $table->foreignId('subclase_id')
                    ->constrained('recursos_juego')
                    ->onDelete('cascade');
            //nivel al que se ha adquirido la subclase
            $table->unsignedSmallInteger('nivel_adquisicion');

            //Unicidad por personaje y clase, un personaje solo puede tener una subclase por clase
            $table->unique(['personaje_id', 'clase_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personaje_subclase_dnd');
    }
};
