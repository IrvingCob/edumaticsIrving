<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'persona';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idpersona';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['foto', 'rfc', 'curp', 'apellidoPaterno', 'apellidoMaterno', 'nombre', 'edad'];

    

    public function direccion(){
        return $this->belongsTo('App\Direccion', 'direccion_iddireccion');
    }

    public function telefono(){
        return $this->belongsTo('App\Telefono', 'telefono_idtelefono');
    }
}
