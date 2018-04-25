<?php

namespace App\Http\Controllers\Direccion;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
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
            $direccion = Direccion::where('tipoDireccion_idtipoDireccion', 'LIKE', "%$keyword%")
                ->orWhere('calle', 'LIKE', "%$keyword%")
                ->orWhere('numero', 'LIKE', "%$keyword%")
                ->orWhere('colonia', 'LIKE', "%$keyword%")
                ->orWhere('ciudad', 'LIKE', "%$keyword%")
                ->orWhere('persona_idpersona', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $direccion = Direccion::latest()->paginate($perPage);
        }

        return view('direccion.direccion.index', compact('direccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('direccion..direccion.create');
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
        
        $requestData = $request->all();
        
        Direccion::create($requestData);

        return redirect('direccion/direccion')->with('flash_message', 'Direccion added!');
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
        $direccion = Direccion::findOrFail($id);

        return view('direccion..direccion.show', compact('direccion'));
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
        $direccion = Direccion::findOrFail($id);

        return view('direccion..direccion.edit', compact('direccion'));
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
        
        $requestData = $request->all();
        
        $direccion = Direccion::findOrFail($id);
        $direccion->update($requestData);

        return redirect('direccion/direccion')->with('flash_message', 'Direccion updated!');
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
        Direccion::destroy($id);

        return redirect('direccion/direccion')->with('flash_message', 'Direccion deleted!');
    }

    public function verDireccion($iddireccion)
    {
        $direccion = Direccion::where('persona_idpersona', $iddireccion)->paginate(16);

        return view('direccion.direccion.index', compact('direccion'));
    }
}
