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
        Schema::create('datos_personajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personaje_id')
                    ->unique()
                    ->constrained('personajes')
                    ->onDelete('cascade');

            // El campo de datos flexible en formato JSON, que varía segun el sistema de juego
            $table->jsonb('datos_ficha')->default('{}');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_personajes');
    }
};
