@extends('app')
@section('titulo','Asistencias')
@section('page3','active')
@section('scripts')
<script src="{{ asset('static/js/functionAssists.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection
@section('contenido')
<div class="container">
<h5 class="text-center">Lista de Asistencias</h5>
<div class="row g-3">
    <div class="col-3">
        <label class="form-label">Seleccionar Trabajador</label>
        <select class="form-select form-select-sm" id="trabajador">
            <option selected value="0">Todos</option>
            @foreach ($employees as $employee)
              <option value="{{ $employee->id }}">{{ $employee->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <label class="form-label">Fecha inicial</label>
        <input type="date" class="form-control form-control-sm" id="fecha_inicial" value="{{ date('Y-m-d', strtotime('last sunday')) }}">
    </div>
    <div class="col-2">
        <label class="form-label">Fecha final</label>
        <input type="date" class="form-control form-control-sm" id="fecha_final" value="{{ date('Y-m-d', strtotime('friday this week')) }}">
    </div>
    <div class="col-5 align-self-end text-end">
        <button type="button" class="btn btn-success btn-sm" id="btnAgregar">Agregar</button>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#formImport">Importar</button>
    </div>
</div>
<div class="row" id="seccion-table">
    <table class="table" id="tabla-asistencias">
    <thead>
        <tr>
        <th scope="col">Trabajador</th>
        <th scope="col">Fecha</th>
        <th scope="col">Dia</th>
        <th scope="col">Tipo</th>
        <th scope="col">Hora</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>
</div>
@include('asistencias.modals.import')
@include('asistencias.modals.add')

@endsection
