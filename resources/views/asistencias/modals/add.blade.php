<!-- Modal -->
<div class="modal fade" id="formAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="tituloForm">Agregar Asistencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formAssist">
          <div class="mb-3">
            <select class="form-select" id="trabajador_modal_id">
                <option selected value="">Seleccionar Trabajador</option>
                @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->nombre }}</option>
                @endforeach
            </select>
          </div>
          <div class="row g-2">
            <div class="col-6">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-6">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora" value="{{ date('H:i') }}">
            </div>
          <div>
          <div class="mb-3 col-12">
            <label class="d-block form-label">Tipo</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_asistencia" id="entrada" value="entrada" checked>
                <label class="form-check-label" for="entrada">Entrada</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_asistencia" id="salida" value="salida">
                <label class="form-check-label" for="salida">Salida</label>
            </div>
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