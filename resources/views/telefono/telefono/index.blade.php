@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Telefono</div>
                    <div class="card-body">
                        <a href="{{ url('/telefono/telefono/create') }}" class="btn btn-success btn-sm" title="Add New Telefono">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ url('/persona/persona') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <form method="GET" action="{{ url('/telefono/telefono') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th>
                                        <th>Numero</th>
                                        <th>Tipo</th>
                                        <th>Persona</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($telefono as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->idtelefono }}</td>
                                        <td>{{ $item->numero }}</td>
                                        @php($tipoTelefono=App\tipoTelefono::find($item->tipoTelefono_idtipoTelefono)->tipo)
                                        <td id="td">{{ $tipoTelefono }}</td>                                                                                                                                            
                                        @php($persona=App\persona::find($item->persona_idpersona)->nombre)
                                        <td id="td">{{ $persona }}</td>
                                        <td>
                                            <a href="{{ url('/telefono/telefono/' . $item->idtelefono) }}" title="View Telefono"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/telefono/telefono/' . $item->idtelefono . '/edit') }}" title="Edit Telefono"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/telefono/telefono' . '/' . $item->idtelefono) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Telefono" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $telefono->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
