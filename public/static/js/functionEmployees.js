const URL="http://localhost:8000/";

$( document ).ready(function() {
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
      }
  }); 

  $('#btnGuardar').click(function(){
   //we will send data and recive data fom our AjaxController
   //alert("im just clicked click me");

      var formData = {
         nombre: $("#nombre").val(),
         dni: $("#dni").val(),
         correo: $("#correo").val(),
         ingreso_hora: $("#ingreso_hora").val(),
     };

      //var state = jQuery('#btn-save').val();
      var type = "POST";
      //var todo_id = jQuery('#todo_id').val();
      var ajaxurl = URL+"trabajadores/getEmployee";

      $.ajax({

         type: type,
         url: ajaxurl,
         data: formData,
         dataType: 'json',
         success: function (data) {
             alert(data);
         },
         error: function (data) {
             console.log(data);
         }
      });
   });
});

