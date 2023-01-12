@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>crear registros@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop
@extends('layouts.plantillabase')
@section('contenido')


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@stop

@section('content')
<body onload="viewAlertError('{{$errors->first()}}');"> 
<div class="container-fluid mt-2">
    <div class="card" style=" font-family:Century Gothic;">
        <div class="card-header text-center" style="font-family:Century Gothic; background-color:#007bff; color:white; font-weigth:bold;">
            AGREGAR CLIENTES
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <form method="post" action="{{route('storeC')}}" id="formCrearCl">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Cedula</label>
                    <input id="cedula" name="cedula" type="number" class="form-control" tabindex="1">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Nombres</label>
                    <input id="nombres" name="nombres" type="text" class="form-control" tabindex="2">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Apellidos</label>
                    <input id="apellidos" name="apellidos" type="text" class="form-control" tabindex="3">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Telefono</label>
                    <input id="telefono" name="telefono" type="number" class="form-control" tabindex="4">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Correo</label>
                    <input id="correo" name="correo" type="text" class="form-control" tabindex="5">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Direccion</label>
                    <input id="direccion" name="direccion" type="text" class="form-control" tabindex="6">
                </div>

                <a href="{{route('vistaC')}}" class="btn btn-secondary" tabindex="7">Cancelar</a>
                <button type="submit" class="btn btn-primary" id="submitCrearCl" tabindex="8">Guardar</button>
            </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function viewAlertError(message){
        if(message != ""){
            swal("¡Ooops!", message, "error");
        }
    }

     $(document).ready(function(){
        $('#submitCrearCl').click(function(event){
                event.preventDefault();
                if($("#cedula").val() == "" || $("#cedula").val() == null || $("#cedula").val() == undefined){
                    swal("¡Ooops!", "El campo cedula es requerido", "error");
                }else if($("#nombres").val() == "" || $("#nombres").val() == null || $("#nombres").val() == undefined){
                    swal("¡Ooops!", "El campo nombres es requerido", "error");
                }else if($("#apellidos").val() == "" || $("#apellidos").val() == null || $("#apellidos").val() == undefined){
                    swal("¡Ooops!", "El campo apellidos es requerido", "error");
                }else if($("#telefono").val() == "" || $("#telefono").val() == null || $("#telefono").val() == undefined){
                    swal("¡Ooops!", "El campo telefono es requerido", "error");
                }else if($("#correo").val() == "" || $("#correo").val() == null || $("#correo").val() == undefined){
                    swal("¡Ooops!", "El campo correo es requerido", "error");
                }else if($("#direccion").val() == "" || $("#direccion").val() == null || $("#direccion").val() == undefined){
                    swal("¡Ooops!", "El campo direccion es requerido", "error");
                }else{
                    document.getElementById("formCrearCl").submit();
                }
        });
    });
    </script>
@stop