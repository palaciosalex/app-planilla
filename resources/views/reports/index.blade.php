@extends('app')
@section('titulo','Reportes')
@section('page4','active')
@section('scripts')
<script src="{{ asset('static/js/functionReports.js') }}"></script>

@endsection
@section('contenido')
<div class="container">
<h5 class="text-center">Lista de Reportes</h5>
<div class="row">
    <div class="col-3">
        <label for="employees" class="form-label">Seleccionar Trabajador</label>
        <select class="form-select" aria-label="Default select example" id="employees">
            @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <label for="date_start" class="form-label">Fecha Inicial</label>
        <input type="date" class="form-control" id="date_start" value="{{ date('Y-m-d', strtotime('last sunday')) }}">
    </div>
    <div class="col-2">
        <label for="date_end" class="form-label">Fecha Final</label>
        <input type="date" class="form-control" id="date_start" value="{{ date('Y-m-d', strtotime('friday this week')) }}">
    </div>
    <div class="col-5 align-self-end text-end">
        <a class="btn btn-success" href="reports/create" >Nuevo</a>
    </div>
</div>
<div class="row" id="seccion-table">
    <table class="table" id="tabla-reportes">
    <thead>
        <tr>
        <th scope="col">N°</th>
        <th scope="col">Empleado</th>
        <th scope="col">Rango de Fechas</th>
        <th scope="col">Minutos Totales</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>
</div>
@endsection