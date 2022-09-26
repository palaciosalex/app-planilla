 
var tablaAsistencias = $('#tabla-asistencias').DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
    },
    aProcessing:true,
    aServerSide:true,
    responsive:true,
    searching: false,
    scrollY: 400,
    ajax: {
      url:'asistencias/getAssists',
      data: function(d){
        d.employee_id = $("#trabajador").val();
        d.fecha_inicial = $("#fecha_inicial").val();;
        d.fecha_final = $("#fecha_final").val();
      }
    },
    type: 'POST',
    columns: [
      {data: 'trabajador'},
      {data: 'fecha_hora',
        render: (data) => moment(data,"YYYY-MM-DD h:mm:ss").format("DD/MM/YY")
      },
      {data: 'fecha_hora',
        render: (data) => moment(data,"YYYY-MM-DD h:mm:ss").format("dddd")
      },
      {data: 'tipo'},
      {data: 'fecha_hora',
        render: (data) => moment(data,"YYYY-MM-DD h:mm:ss").format("hh:mm a")
      },
      {data: 'id',
        render: ( data, type, row ) =>  `<button class='btn btn-warning btn-sm' onclick='showModal(${data})'>
      <i class='bi bi-pencil-square'></i>
      </button>&nbsp;
      <button class='btn btn-danger btn-sm' onclick='fntEliminar(${data})'>
        <i class='bi bi-trash-fill'></i>
      </button>`   
      },
    ]
  });

function fntEliminar(id){
  
  swal({
    text: "Estas seguro(a) que desea eliminar este elemento! ",
    icon: "warning",
    buttons: ["Cancelar", "Aceptar"],
  })
  .then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: "DELETE",
        url: "asistencias/"+id,
        success: function (data) {
            if(data.success){
              swal("Listo", "La operación se realizo con exito", "success");
              tablaAsistencias.ajax.reload();
            }else{
              alert("Error en el servidor");
            }
        },
        error: function () {
            alert("Error en el servidor");
        }
      });
    }
  });
}

function showModal(id){

  $.ajax({
    type: "GET",
    url: "asistencias/"+id,
    dataType: 'json',
    success: function (data) {

      $("#trabajador_modal_id").val(data.employee_id);
      $("#fecha").val(moment(data.fecha_hora,"YYYY-MM-DD h:mm:ss").format("YYYY-MM-DD"));
      $("#hora").val(moment(data.fecha_hora,"YYYY-MM-DD h:mm:ss").format("hh:mm"));
      $('input[name=tipo_asistencia][value='+data.tipo+']').prop('checked', 'checked');
      $("#formAgregar").modal('show');
      $("#btnGuardar").val(id);
      $("#tituloForm").html("Editar Asistencia");
      $("#respuesta").html("");
    },
    error: function (data) {
      alert("Error en el servidor");
    }
  });
  
}


$( document ).ready(function() {

    moment.lang('es', {
      weekdays: 'Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sabado'.split('_'),
    }
    );

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

  $("#formImportacion").on('submit', function(e){

    var type = "POST";
    var ajaxurl = "asistencias/import";
    e.preventDefault();
    $.ajax({
        type: type,
        url: ajaxurl,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
          $("#respuesta-import").html("");
          $(".loading").css("display", "block");
        },
        success: function (data) {
          $(".loading").css("display", "none");
          if(data.success){
            swal("Listo", "La importacion se realizo con exito", "success");
            tablaAsistencias.ajax.reload();
          }else{
             if(data.rules){
                $("#respuesta-import").html("<div class='alert alert-warning' role='alert'>"+
                "En la fila "+data.errors[0].row +". "+data.errors[0].errors);
             }else{
                $("#respuesta-import").html("<div class='alert alert-warning' role='alert'>"+data.errors[0]);
             }
          }
          $("#formImportacion")[0].reset();
        },
        error: function (data) {
          $(".loading").css("display", "none");
          $("#respuesta-import").html("<div class='alert alert-warning' role='alert'>Error inesperado</div>");
          $("#formImportacion")[0].reset();
        }
    });

  });

  $('#trabajador, #fecha_inicial, #fecha_final').on('change', function() {
    tablaAsistencias.ajax.reload();
  });


});
  