$(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left',
      format: 'dd/mm/yyyy' 
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});

$( document ).ready(function() {

  let lista_horas= obtenerListaHoras();
  let horasReporte= new HorasReporte(lista_horas);
  actualizarEstadosMenus(lista_horas);
  $("#total_minutos").val(horasReporte.totalMinutos);
  $("#horas_minutos").val(horasReporte.horasyMinutos);
  $("#total_menu").val(horasReporte.totalMenu);


  $("input[type='time']").on( "focusout", function() {
    
    lista_horas= obtenerListaHoras();
    horasReporte.setlista_horas(lista_horas);
    actualizarEstadosMenus(lista_horas);
    $("#total_minutos").val(horasReporte.totalMinutos);
    $("#horas_minutos").val(horasReporte.horasyMinutos);
  });

  $( '#marcarMenusPermitidos' ).on( 'click', function() {

    if($(this).is(':checked')){
      $('tr input[type=checkbox]:enabled').each(function() {
        $(this).prop("checked", true); 
      });
    } else {
      $('tr input[type=checkbox]:enabled').each(function() {
        $(this).prop("checked", false); 
      });
    }
  });

});

function obtenerListaHoras(){
  var lista_horas= {"ingresos": new Array, "salidas" : new Array} ;
  $("input[type='time']").each(function() {

    var id = $(this).attr("id");
    var tipo = id.substring(0, id.length - 1);
    var posicion = id.substring(id.length - 1, id.length);

    let hora = "";
    if($(this).val().length > 0) {
      hora = new Date("2023-08-06 " +$(this).val()+":00");
    }else{
      hora = 0;
    }

    if(tipo=='ingreso')
    {
      lista_horas["ingresos"][posicion]=hora;
    }else{
      lista_horas["salidas"][posicion]=hora;
    }
  });

  return lista_horas;
}

function actualizarEstadosMenus(lista_horas)
{
  for(var i=0; i<6 ;i++)
  {
      if(lista_horas["ingresos"][i]!==0 && lista_horas["salidas"][i]!==0){
        $("#menu"+i).prop('disabled', false);
      }else{
        $("#menu"+i).prop('disabled', true);
        $("#menu"+i).prop("checked", false); 
      }
  }
}
