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
        Schema::create('recursos_juego', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema_id')
                    ->constrained('sistemas')
                    ->onDelete('cascade');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('tipo')->index();
            $table->foreignId('creado_por')
                    ->constrained('users')
                    ->onDelete('cascade');
            $table->jsonb('datos_especificos')->default('{}');
            $table->timestamps();

            $table->index(['sistema_id', 'tipo']);
            $table->index(['creado_por', 'tipo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos_juego');
    }
};
