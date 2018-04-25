<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDireccion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipoDireccion';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idtipoDireccion';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo'];

    
}
