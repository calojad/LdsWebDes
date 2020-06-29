<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = 'miembro';
    const CREATED_AT = 'created_At';
    const UPDATED_AT = 'updated_At';
    public $timestamps = true;
    protected $fillable = ['nombre','apellido','email','telefono','direccion','fecha_nacimiento','sexo'];
}
