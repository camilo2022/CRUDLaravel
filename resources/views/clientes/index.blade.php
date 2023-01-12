@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

@section('content_header')

<div class="container-fluid mt-2">
    <div class="card" style=" font-family:Century Gothic;">
        <div class="card-header text-center" style="font-family:Century Gothic; background-color:#007bff; color:white; font-weigth:bold;">
            LISTADO DE CLIENTES
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table id="clientes" class="table table-striped mt-4" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apelllidos</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->cedula }}</td>
                            <td>{{ $cliente->nombres }}</td>
                            <td>{{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>
                                <form action="{{route('deleteC',$cliente->id)}}" id="formularioEliminarCl" method="post">                                
                                <a href="{{route('editC',$cliente->id)}}" class="btn btn-info"><i class="fa fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="submitEliminarCl" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#clientes').DataTable();
    });
</script>
@stop

@stop
@extends('layouts.plantillabase')
@section('contenido')


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

@stop