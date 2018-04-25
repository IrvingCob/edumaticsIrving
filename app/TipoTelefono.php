<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTelefono extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipoTelefono';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idtipoTelefono';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo'];

    
}
