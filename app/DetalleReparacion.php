<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleReparacion extends Model
{
    protected $table='detalles_reparacion';
      public $timestamps = false;

     protected $primaryKey = 'iddetalles_reparacion';
}
