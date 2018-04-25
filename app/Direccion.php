<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'direccion';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'iddireccion';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'tipoDireccion_idtipoDireccion', 'calle', 'numero', 'colonia', 'ciudad', 'persona_idpersona'];

    public function direccion(){

    return $this->belongsTo('App\direccion', 'tipoDireccion_idtipoDireccion');
    }

     public function verDireccion($iddireccion)
    {
        $direccion = Direccion::where('persona_idpersona', $iddireccion)->paginate(16);

        return view('direccion.direccion.index', compact('direccion'));
    }

   

     public function personas(){
            return $this->hasMany('App\Persona');
        }
}
