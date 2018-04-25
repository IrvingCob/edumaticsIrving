@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Direccion</div>
                    <div class="card-body">
                        <a href="{{ url('/direccion/direccion/create') }}" class="btn btn-success btn-sm" title="Add New Direccion">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ url('/persona/persona') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <form method="GET" action="{{ url('/direccion/direccion') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Tipo</th>
                                        <th>Persona</th>
                                        <th>Calle</th>
                                        <th>Número</th>
                                        <th>Colonia</th>
                                        <th>Ciudad</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($direccion as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->iddireccion }}</td>
                                        @php($tipoDireccion=App\tipoDireccion::find($item->tipoDireccion_idtipoDireccion)->tipo)
                                        <td id="td">{{ $tipoDireccion }}</td>
                                        @php($persona=App\persona::find($item->persona_idpersona)->nombre)
                                        <td id="td">{{ $persona }}</td>
                                        <td>{{ $item->calle }}</td>
                                        <td>{{ $item->numero }}</td>
                                        <td>{{ $item->colonia }}</td>
                                        <td>{{ $item->ciudad }}</td>
                                        <td>
                                            <a href="{{ url('/direccion/direccion/' . $item->iddireccion) }}" title="View Direccion"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/direccion/direccion/' . $item->iddireccion . '/edit') }}" title="Edit Direccion"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/direccion/direccion' . '/' . $item->iddireccion) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Direccion" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $direccion->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
