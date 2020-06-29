<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Llamamiento extends Model
{
    protected $table = 'llamamiento';
    const CREATED_AT = 'created_At';
    const UPDATED_AT = 'updated_At';
    public $timestamps = true;
    protected $fillable = ['nombre'];
}
