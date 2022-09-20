<!-- Modal -->
<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Importar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <form id="formImportacion" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="mb-3">
            <button type="button" class="btn btn-success" id="btnDescargar"><i class="bi bi-arrow-down-circle"></i> Descargar planilla</button>
          </div>
          <div class="mb-3">
            <label for="archivoImportacion" class="form-label">Seleccionar archivo</label>
            <input class="form-control" type="file" id="archivoImportacion" name="archivoImportacion">
          </div>
        <div id="respuesta-import"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrar" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btnImportar" value="0">Importar</button>
      </div>
      </form>
    </div>
  </div>
</div>