var tablaReportes = $('#tabla-reportes').DataTable({
    language: {
      url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
    },
    aProcessing:true,
    aServerSide:true,
    responsive:true,
    ajax: 'reports/getAll',
    type: 'GET',
    columns: [
      {data: 'id'},
      {data: 'employee'},
      
      {data: null,
        render: function ( data, type, row ) {
          return    'Del '+ moment(row['initial_date'],"YYYY-MM-DD").format("DD/MM/YY")+
                    ' al ' + moment(row['end_date'],"YYYY-MM-DD").format("DD/MM/YY");
        },
      },
      
      {data: 'total_minuts'},
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