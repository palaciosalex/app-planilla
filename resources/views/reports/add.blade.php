@extends('app')
@section('titulo','Generar Reporte')
@section('page4','active')
@section('scripts')
<!--<script type="text/javascript" src="{{ asset('static/js/functionCreateReport.js') }}"></script>-->
<!--<script type="text/javascript" src="{{ asset('static/js/HorasReporte.js') }}"></script>-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="{{ asset('static/js/functionCreateReport.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/HorasReporte.js') }}"></script>

@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('contenido')
<div class="container">
<h5 class="text-center">Generar Reporte</h5>
<div class="row">
    <div class="col-3">
        <label for="employees" class="form-label">Seleccionar Empleado</label>
        <select class="form-select" aria-label="Default select example" id="employees">
            @foreach ($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-3">
        <label for="date_start" class="form-label">Rango de Semana</label>
        <input class="form-control" type="text" name="daterange" value="{{ date('m/d/Y', strtotime('last sunday')) }} - {{ date('m/d/Y', strtotime('friday this week')) }}">
    </div>
</div>
<div class="row" id="seccion-table">
    <table class="table table-bordered" id="hours-table">
    <thead>
        <tr>
        <th scope="col"></th>
        <th scope="col">Domingo</th>
        <th scope="col">Lunes</th>
        <th scope="col">Martes</th>
        <th scope="col">Miercoles</th>
        <th scope="col">Jueves</th>
        <th scope="col">Viernes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col">Ingreso</td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="ingreso0"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="ingreso1"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="ingreso2"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="ingreso3"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="ingreso4"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="ingreso5"></td>
        </tr>
        <tr>
            <td scope="col">Salida</td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="salida0"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="salida1"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="salida2"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="salida3"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="salida4"></td>
            <td scope="col"><input type="time" class="form-control form-control-sm" id="salida5"></td>
        </tr>
        <tr>
            <td scope="col">Menu</td>
            <td scope="col"><input class="form-check-input" type="checkbox" value="" id="menu0" disabled></td>
            <td scope="col"><input class="form-check-input" type="checkbox" value="" id="menu1" disabled></td>
            <td scope="col"><input class="form-check-input" type="checkbox" value="" id="menu2" disabled></td>
            <td scope="col"><input class="form-check-input" type="checkbox" value="" id="menu3" disabled></td>
            <td scope="col"><input class="form-check-input" type="checkbox" value="" id="menu4" disabled></td>
            <td scope="col"><input class="form-check-input" type="checkbox" value="" id="menu5" disabled></td>
        </tr>
    </tbody>
    </table>
</div>
<div class="row">
    <div class="col-3">
        <input class="form-check-input" type="checkbox" value="" id="marcarMenusPermitidos">
        <label class="form-check-label" for="marcarMenusPermitidos" >
            Marcar todos los dias que asistió
        </label>
    </div>
</div>
<div class="row mb-3 text-end justify-content-end">
    <label for="horas_minutos" class="col-sm-2 col-form-label">Horas y Minutos</label>
    <div class="col-2 align-self-end">
        <input type="text" class="form-control text-end" id="horas_minutos" disabled>
    </div>
</div>
<div class="row mb-3 text-end justify-content-end">
    <label for="total_minutos" class="col-sm-2 col-form-label">Minutos Totales</label>
    <div class="col-2 align-self-end">
        <input type="text" class="form-control text-end" id="total_minutos" disabled>
    </div>
</div>
<div class="row text-end justify-content-end">
    <label for="total_menu" class="col-sm-2 col-form-label">Total Menu</label>
    <div class="col-2 align-self-end">
        <input type="number" class="form-control text-end" id="total_menu" step="0.01" disabled>
    </div>
</div>
<div class="row mt-3 justify-content-center">
    <div class="col-12 text-center">
        <button class="btn btn-success ">
            Guardar
        </button>
        <button class="btn btn-secondary">
            Cancelar
        </button>
    </div>
</div>
</div>
@endsection