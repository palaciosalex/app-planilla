@extends('app')
@section('titulo','Asistencias')
@section('page3','active')
@section('scripts')

@endsection
@section('contenido')
<div class="container">
<h5 class="text-center">Lista de Asistencias</h5>
<div class="row g-3">
    <div class="col-3">
        <label class="form-label">Seleccionar Trabajador</label>
        <select class="form-select form-select-sm" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="col-2">
        <label class="form-label">Fecha inicial</label>
        <input type="date" class="form-control form-control-sm" >
    </div>
    <div class="col-2">
        <label class="form-label">Fecha final</label>
        <input type="date" class="form-control form-control-sm" >
    </div>
    <div class="col-2 align-self-end">
        <button type="button" class="btn btn-secondary btn-sm">Filtrar</button>
    </div>
    <div class="col-3 align-self-end ">
        <button type="button" class="btn btn-success btn-sm">Agregar</button>
        <button type="button" class="btn btn-success btn-sm">Importar</button>
    </div>
</div>
<div class="row" id="seccion-table">
    <table class="table" id="tabla-trabajadores">
    <thead>
        <tr>
        <th scope="col">Trabajador</th>
        <th scope="col">Fecha</th>
        <th scope="col">Ingreso</th>
        <th scope="col">Salida</th>
        <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="formAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="tituloForm">Agregar Trabajador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTrabajador">
          <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
          <div class="row g-2">
            <div class="col-4">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni">
            </div>
            <div class="col-8">
                <label for="dni" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo" id="correo">
            </div>
          <div>
          <div class="mb-3 col-4">
              <label for="dni" class="form-label">Ingreso por hora</label>
              <input type="number" class="form-control" name="dni" id="ingreso_hora">
          </div>
        <form>
        <div id="respuesta"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrar" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardar" value="0">Guardar</button>
      </div>
    </div>
  </div>
</div>
@endsection
