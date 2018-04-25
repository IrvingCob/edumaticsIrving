<?php

namespace App\Http\Controllers\TipoTelefono;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoTelefono;
use Illuminate\Http\Request;

class TipoTelefonoController extends Controller
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
            $tipotelefono = TipoTelefono::where('tipo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tipotelefono = TipoTelefono::latest()->paginate($perPage);
        }

        return view('tipoTelefono.tipoTelefono.index', compact('tipotelefono'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipoTelefono.tipoTelefono.create');
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
        
        TipoTelefono::create($requestData);

        return redirect('tipoTelefono/tipoTelefono')->with('flash_message', 'TipoTelefono added!');
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
        $tipotelefono = TipoTelefono::findOrFail($id);

        return view('tipoTelefono.tipoTelefono.show', compact('tipotelefono'));
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
        $tipotelefono = TipoTelefono::findOrFail($id);

        return view('tipoTelefono.tipoTelefono.edit', compact('tipotelefono'));
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
        
        $tipotelefono = TipoTelefono::findOrFail($id);
        $tipotelefono->update($requestData);

        return redirect('tipoTelefono/tipoTelefono')->with('flash_message', 'TipoTelefono updated!');
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
        TipoTelefono::destroy($id);

        return redirect('tipoTelefono/tipoTelefono')->with('flash_message', 'TipoTelefono deleted!');
    }
}
