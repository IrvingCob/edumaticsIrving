@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Persona {{ $persona->idpersona }}</div>
                    <div class="card-body">
                        <a href="../../../storage/app/public/imgPersonas/{{$persona->foto}}" alt="{{$persona->foto}}"> <img  src="../../../storage/app/public/imgPersonas/{{$persona->foto}}" alt="{{$persona->foto}}"  style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"></a>
            
                    
            
            
                <h4><label>Datos de: {{ $persona->nombre }} {{ $persona->apellido }}</label></h4>

                        <a href="{{ url('/persona/persona') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/persona/persona/' . $persona->idpersona . '/edit') }}" title="Edit Persona"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('persona/persona' . '/' . $persona->idpersona) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Persona" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $persona->idpersona }}</td>
                                    </tr>
                                    
                                    <tr><th> Rfc </th><td> {{ $persona->rfc }} </td></tr>
                                    <tr><th> ApellidoPaterno </th><td> {{ $persona->apellidoPaterno }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
