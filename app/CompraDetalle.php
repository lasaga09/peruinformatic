<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraDetalle extends Model
{
    protected $table='detalle_compra';
      public $timestamps = false;

     protected $primaryKey = 'iddetalle_compra';
}
