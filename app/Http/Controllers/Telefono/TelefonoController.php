<?php

namespace App\Http\Controllers\Telefono;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Telefono;
use Illuminate\Http\Request;

class TelefonoController extends Controller
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
            $telefono = Telefono::where('numero', 'LIKE', "%$keyword%")
                ->orWhere('tipoTelefono_idtipoTelefono', 'LIKE', "%$keyword%")
                ->orWhere('persona_idpersona', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $telefono = Telefono::latest()->paginate($perPage);
        }

        return view('telefono.telefono.index', compact('telefono'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('telefono.telefono.create');
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
        
        Telefono::create($requestData);

        return redirect('telefono/telefono')->with('flash_message', 'Telefono added!');
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
        $telefono = Telefono::findOrFail($id);

        return view('telefono.telefono.show', compact('telefono'));
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
        $telefono = Telefono::findOrFail($id);

        return view('telefono.telefono.edit', compact('telefono'));
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
        
        $telefono = Telefono::findOrFail($id);
        $telefono->update($requestData);

        return redirect('telefono/telefono')->with('flash_message', 'Telefono updated!');
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
        Telefono::destroy($id);

        return redirect('telefono/telefono')->with('flash_message', 'Telefono deleted!');
    }

    public function verTelefono($idtelefono)
    {
        $telefono = Telefono::where('persona_idpersona', $idtelefono)->paginate(16);

        return view('telefono.telefono.index', compact('telefono'));
    }
}
