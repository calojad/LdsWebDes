<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiembrOrganizacion extends Model
{
    protected $table = 'miembro_organizacion';
    const CREATED_AT = 'created_At';
    const UPDATED_AT = 'updated_At';
    public $timestamps = true;
    protected $fillable = ['miembro_id','organizacion_id'];
}
