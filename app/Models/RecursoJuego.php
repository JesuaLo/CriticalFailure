<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecursoJuego extends Model
{
    /** @use HasFactory<\Database\Factories\RecursoJuegoFactory> */
    use HasFactory;

    protected $table = 'recursos_juego';

}
