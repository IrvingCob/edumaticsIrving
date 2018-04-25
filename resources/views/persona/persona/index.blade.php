@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">LISTA DE PERSONAS</div>
                    <div class="card-body">
                            <a href="{{ url('/persona/persona/create') }}" class="btn btn-success btn-sm" title="Add New Persona">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            
                        <form method="GET" action="{{ url('/persona/persona') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fotografía</th>
                                        <th>Rfc</th>
                                        <th>ApellidoPaterno</th>
                                        <th>ApellidoMaterno</th>
                                        <th>Nombre</th>
                                        <th>edad</th>
                                        <th>Contacto</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($persona as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->idpersona }}</td>
                                        <td>
                                            <img class="thumbnail" style="width: 90px; height: 90px;" src="../..//storage/app/public/imgPersonas/{{$item->foto}}" alt="{{$item->foto}}">
                                        </td>
                                        <td>{{ $item->rfc }}</td>
                                        <td>{{ $item->apellidoPaterno }}</td>
                                        <td>{{ $item->apellidoMaterno }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->edad }}</td>
                                        <td><a href="{{ url('direccion/direccion/' . $item->idpersona. '/verDireccion') }}"  title="Dirección"><button class="btn btn-warning"><i class="fa fa-map-signs"></i> Direccion</button></a>
                                             <a href="{{ url('telefono/telefono/' . $item->idpersona. '/verTelefono') }}"  title="Teléfono"><button class="btn btn-primary"><i class="fa fa-phone"></i> Telefono</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/persona/persona/' . $item->idpersona) }}" title="View Persona"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/persona/persona/' . $item->idpersona . '/edit') }}" title="Edit Persona"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/persona/persona' . '/' . $item->idpersona) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Persona" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                            </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $persona->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
