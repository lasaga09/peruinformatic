<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
     protected $table='reparaciones';
      public $timestamps = false;
      protected $primaryKey = 'idreparacion';
}
