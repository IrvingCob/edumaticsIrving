@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Telefono {{ $telefono->idtelefono }}</div>
                    <div class="card-body">

                        <a href="{{ url('/telefono/telefono') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/telefono/telefono/' . $telefono->idtelefono . '/edit') }}" title="Edit Telefono"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('telefono/telefono' . '/' . $telefono->idtelefono) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Telefono" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $telefono->idtelefono }}</td>
                                    </tr>
                                    <tr><th> Consecutivo </th><td> {{ $telefono->consecutivo }} </td></tr><tr><th> Numero </th><td> {{ $telefono->numero }} </td></tr><tr><th> TipTelefono IdtipoTelefono </th><td> {{ $telefono->tipTelefono_idtipoTelefono }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
