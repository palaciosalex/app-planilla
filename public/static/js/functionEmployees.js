

var tablaTrabajadores = $('#tabla-trabajadores').DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
  },
  aProcessing:true,
  aServerSide:true,
  responsive:true,
  //ajax: URL+"trabajadores/getEmployees",
  ajax: 'trabajadores/getEmployees',
  type: 'GET',
  columns: [
    {data: 'id'},
    {data: 'nombre'},
    {data: 'dni'},
    {data: 'email'},
    {data: 'ingreso_hora'},
    {data: 'id',
      render: function ( data, type, row ) {
        return "<button class='btn btn-warning btn-sm' onclick='showModal("+data+")'>"+
                "<i class='bi bi-pencil-square'></i>"+
               "</button>&nbsp;"+
               "<button class='btn btn-danger btn-sm' onclick='fntEliminar("+data+")'>"+
                "<i class='bi bi-trash-fill'></i>"+
               "</button>";
      } 
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
        url: "trabajadores/"+id,
        success: function (data) {
            if(data.success){
              swal("Listo", "La operación se realizo con exito", "success");
              tablaTrabajadores.ajax.reload();
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
    url: "trabajadores/"+id,
    dataType: 'json',
    success: function (data) {

      $("#nombre").val(data.nombre);
      $("#dni").val(data.dni);
      $("#correo").val(data.email);
      $("#ingreso_hora").val(data.ingreso_hora);
      $("#formAgregar").modal('show');
      $("#btnGuardar").val(id);
      $("#tituloForm").html("Editar Trabajador");
      $("#respuesta").html("");
    },
    error: function (data) {
      alert("Error en el servidor");
    }
  });
}

$( document ).ready(function() {

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
      }
  }); 

  $('#btnGuardar').click(function(){

      var formData = {
         nombre: $("#nombre").val(),
         dni: $("#dni").val(),
         email: $("#correo").val(),
         ingreso_hora: $("#ingreso_hora").val(),
         estado: "A",
      };
      var id = $('#btnGuardar').val();
      if(id == "0"){
        var type = "POST";
        var ajaxurl = "trabajadores";
      }else{
        var type = "PATCH";
        var ajaxurl = "trabajadores/"+id;
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
               tablaTrabajadores.ajax.reload();
             }else{
                $("#respuesta").html("<div class='alert alert-warning' role='alert'>"+data.errors[0]+"</div>");
             }
         },
         error: function (data) {
             $("#respuesta").html("<div class='alert alert-warning' role='alert'>Error inesperado</div>");
         }
      });
   });

   $('#btnAgregar').click(function(){

      $("#formTrabajador")[0].reset();
      $("#btnGuardar").val('0');
      $("#formAgregar").modal('show');
      $("#respuesta").html("");

   });


});

