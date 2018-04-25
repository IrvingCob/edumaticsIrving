<?php

namespace App\Http\Controllers\TipoDireccion;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoDireccion;
use Illuminate\Http\Request;

class TipoDireccionController extends Controller
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
            $tipodireccion = TipoDireccion::where('tipo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tipodireccion = TipoDireccion::latest()->paginate($perPage);
        }

        return view('tipoDireccion.tipoDireccion.index', compact('tipodireccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipoDireccion.tipoDireccion.create');
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
        
        TipoDireccion::create($requestData);

        return redirect('tipoDireccion/tipoDireccion')->with('flash_message', 'TipoDireccion added!');
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
        $tipodireccion = TipoDireccion::findOrFail($id);

        return view('tipoDireccion.tipoDireccion.show', compact('tipodireccion'));
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
        $tipodireccion = TipoDireccion::findOrFail($id);

        return view('tipoDireccion.tipoDireccion.edit', compact('tipodireccion'));
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
        
        $tipodireccion = TipoDireccion::findOrFail($id);
        $tipodireccion->update($requestData);

        return redirect('tipoDireccion/tipoDireccion')->with('flash_message', 'TipoDireccion updated!');
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
        TipoDireccion::destroy($id);

        return redirect('tipoDireccion/tipoDireccion')->with('flash_message', 'TipoDireccion deleted!');
    }
}
