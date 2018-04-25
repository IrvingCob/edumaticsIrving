<?php

namespace App\Http\Controllers\Persona;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Persona;
use App\Direccion;
use App\Telefono;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Storage;
use File;

use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;


use DB;
use Excel;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $persona = Persona::where('foto', 'LIKE', "%$keyword%")
                ->orWhere('rfc', 'LIKE', "%$keyword%")
                ->orWhere('curp', 'LIKE', "%$keyword%")
                ->orWhere('apellidoPaterno', 'LIKE', "%$keyword%")
                ->orWhere('apellidoMaterno', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('edad', 'LIKE', "%$keyword%")
                
                ->latest()->paginate($perPage);
        } else {
            $persona = Persona::latest()->paginate($perPage);
        }

        return view('persona.persona.index', compact('persona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('persona.persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $imagen = $request->file('foto');
        $foto = time() . "." .$imagen->getClientOriginalExtension();
        Storage::disk('imgPersonaS')->put($foto, File::get($imagen));
        $persona = new persona($request->all());
        $persona->foto = $foto;
        $persona->save();
        return redirect('persona/persona');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $persona = Persona::findOrFail($id);

        return view('persona.persona.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);

        return view('persona.persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $persona = Persona::findOrFail($id); //El administrador ya no puede realizar actualización de imagen
        $requestData = $request->all();
        $persona->update($requestData);
        return redirect('persona/persona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Persona::destroy($id);

        return redirect('persona/persona')->with('flash_message', 'Persona deleted!');
    }

   

    




   
    
}
