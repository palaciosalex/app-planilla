@extends('app')
@section('titulo','Trabajadores')
@section('page2','active')
@section('contenido')
<div class="container">
<h5 class="text-center">Lista de trabajadores</h5>
<div class="row">
    <div class="col-4">
        <input class="form-control" type="text" placeholder="Buscar">
    </div>
    <div class="col-3">
        <button class="btn btn-success">Agregar</button>
    </div>
</div>
<div class="row">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nombre</th>
        <th scope="col">DNI</th>
        <th scope="col">Correo</th>
        <th scope="col">Ingreso x Hora</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciónes</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>
</div>
@endsection