<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    //nombre de la tabla (la migración la crea en singular)
    protected $table = 'profesor';

    //campos que se pueden rellenar de golpe con new Profesor($datos) o Profesor::create($datos)
    protected $fillable = ['nombre', 'apellidos', 'especialidad', 'fecha_alta', 'salario'];
}