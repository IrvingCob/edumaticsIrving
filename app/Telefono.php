<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'telefono';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idtelefono';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'numero', 'tipoTelefono_idtipoTelefono', 'persona_idpersona'];

     public function verTelefono($idtelefono)
    {
        $telefono = Telefono::where('persona_idpersona', $idtelefono)->paginate(16);

        return view('telefono.telefono.index', compact('telefono'));
    }

    public function personas(){
            return $this->hasMany('App\Persona');
        }

        public function direcciones(){
            return $this->hasMany('App\Persona');
        }
}
