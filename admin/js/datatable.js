
$(document).ready(function () {
    $(".table").DataTable({

        "ordering": true,
        "serching": true,
        "paging": true,
        "sPaginationType": "full_numbers",
        "columnDefs": [
            {
                "targets": 0,
                "searchable": false,
                "visible": true
            }
        ],

        "order": [[2, "desc"]],
        "oLanguage": {
            "sProcessing": "Procesando...",
            "sZeroRecords": "No se encontraron resulados",
            "sEmptyTable": "Ningùn dato disponible en la tabla",
            "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrando un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Por favor espere - cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": "Activar para ordenar la columna de manera ascendente",
                "sSortDescending": "Activar para ordenar la columna de manera descendente"
            }
        }

    });

});


