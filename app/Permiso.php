<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table='permisos';
      public $timestamps = false;

     protected $primaryKey = 'idpermiso';
}
