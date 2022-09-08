const URL="http://localhost:8000/";

$( document ).ready(function() {

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
      }
  }); 

  var tablaTrabajadores = $('#tabla-trabajadores').DataTable({
    aProcessing:true,
    aServerSide:true,
    responsive:true,
    ajax: "trabajadores/getEmployees",
    columns: [
      {data: 'id'},
      {data: 'nombre'},
      {data: 'dni'},
      {data: 'email'},
      {data: 'ingreso_hora'},
      {data: 'id',
        render: function ( data, type, row ) {
          return "<button type='button' class='btn btn-warning btn-sm'><i class='bi bi-pencil-square'></i></button>"+
          "&nbsp;<button type='button' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></button>";
        } 
      },
    ]
  });

  $('#btnGuardar').click(function(){
   //we will send data and recive data fom our AjaxController
   //alert("im just clicked click me");


      var formData = {
         nombre: $("#nombre").val(),
         dni: $("#dni").val(),
         email: $("#correo").val(),
         ingreso_hora: $("#ingreso_hora").val(),
         estado: "A",
     };

      //var state = jQuery('#btn-save').val();
      var type = "POST";
      //var todo_id = jQuery('#todo_id').val();
      var ajaxurl = "";

      $.ajax({

         type: type,
         url: ajaxurl,
         data: formData,
         dataType: 'json',
         success: function (data) {
             if(data.success){
               swal("Listo", "Se agrego un nuevo trabajador", "success");
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



});

