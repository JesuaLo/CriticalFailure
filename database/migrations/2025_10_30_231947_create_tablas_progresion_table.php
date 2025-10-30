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
        Schema::create('tablas_progresion', function (Blueprint $table) {
            $table->id();

            //Cualquier recurso que tenga progresión por nivbel (clases, niveles, rangos, etc)
            $table->foreignId('recurso_juego_id')
                ->constrained('recursos_juego')
                ->onDelete('cascade');

            $table->unsignedSmallInteger('nivel');

            $table->jsonb('datos_progresion')->default('{}');
            $table->timestamps();

            $table->unique(['recurso_juego_id', 'nivel']);
            $table->index('nivel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablas_progresion');
    }
};
