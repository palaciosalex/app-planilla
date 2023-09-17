@extends('app')
@section('titulo','Trabajadores')
@section('page2','active')
@section('scripts')
<script src="{{ asset('static/js/functionEmployees.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script type="text/javascript" src="{{ asset('static/js/libs/html2canvas.js') }}"></script>
<!--<script src="{{ asset('static/js/libs/jspdf.min.js') }}"></script>-->
@endsection
@section('contenido')
<div class="container">
<h5 class="text-center">Lista de Trabajadores</h5>
<div class="row">
    <div class="col-3">
        <button class="btn btn-success" id="btnAgregar">Agregar</button>
    </div>
    <div class="col-3">
        <a href="/trabajadores/getexportpdf" class="btn btn-primary" id="btnAgregar" target="_blank">Impimir</a>
    </div>
</div>
<div class="row" id="seccion-table">
    <table class="table" id="tabla-trabajadores">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">DNI</th>
        <th scope="col">Correo</th>
        <th scope="col">Ingreso x Hora</th>
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
