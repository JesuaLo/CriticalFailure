<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaProgresion extends Model
{
    /** @use HasFactory<\Database\Factories\TablaProgresionFactory> */
    use HasFactory;

    protected $table = 'tablas_progresion';
}
