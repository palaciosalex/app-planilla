var tablaAsistencias = $('#tabla-asistencias').DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
    },
    aProcessing:true,
    aServerSide:true,
    responsive:true,
    searching: false,
    scrollY: 400,
    ajax: 'asistencias/getAssists',
    type: 'GET',
    columns: [
      {data: 'trabajador'},
      {data: 'fecha'},
      {data: 'tipo'},
      {data: 'hora'},
      {data: 'id'},
    ]
});


$( document ).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
        }
    }); 

    $('#btnAgregar').click(function(){

        $("#formAssist")[0].reset();
        $("#btnGuardar").val('0');
        $("#formAgregar").modal('show');
        $("#respuesta").html("");
  
     });
  
     $('#btnGuardar').click(function(){

        var formData = {
           trabajador_id: $("#trabajador_modal_id").val(),
           fecha: $("#fecha").val(),
           hora: $("#hora").val(),
           tipo: $('input:radio[name=tipo_asistencia]:checked').val(),
        };
        var id = $('#btnGuardar').val();
        if(id == "0"){
          var type = "POST";
          var ajaxurl = "asistencias";
        }else{
          var type = "PATCH";
          var ajaxurl = "asistencias/"+id;
        }
        
        $.ajax({
           type: type,
           url: ajaxurl,
           data: formData,
           dataType: 'json',
           success: function (data) {
               if(data.success){
                 swal("Listo", "La operación se realizo con exito", "success");
                 $("#formAgregar").modal('hide');
                 tablaAsistencias.ajax.reload();
               }else{
                  $("#respuesta").html("<div class='alert alert-warning' role='alert'>"+data.errors[0]+"</div>");
               }
           },
           error: function (data) {
               $("#respuesta").html("<div class='alert alert-warning' role='alert'>Error inesperado</div>");
           }
        });
     });
});
  