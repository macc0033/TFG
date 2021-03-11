<!-- DataTables -->
<script src="{{asset("assets/$theme/plugins/datatables/jquery.dataTables.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-bs4/js/dataTables.bootstrap4.js")}}"></script>
<!-- DataTables Buttons -->
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("assets/$theme/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script>
@if (can('exportar-listados',false))
    <script>
        $.fn.dataTable.moment('DD-MM-YYYY');  
        $(function () {
            var table = $('#tabla-data').DataTable({
                dom: 'lBfrtip',
                order: [],
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "autoWidth": true,
                buttons: [
                    /*{
                        extend: "colvis",
                        titleAttr: 'Mostras/Ocultar Columnas',
                        text: 'Columnas'
                    },
                    {
                        extend: 'collection',
                        text: 'Exportar',
                        titleAttr: 'Opciones Exportación',
                        buttons: [
                            {
                                extend: "copy",
                                titleAttr: 'Copiar a portapapeles',
                                text: 'Copiar'
                            },
                            {
                                extend: "csv",
                                titleAttr: 'Exportar a CSV',
                                text: 'Csv'
                            },
                            {
                                extend: "excel",
                                titleAttr: 'Exportar a Excel',
                                text: 'Excel'
                            },
                            {
                                extend: "pdf",
                                titleAttr: 'Exportar a PDF',
                                text: 'Pdf'
                            },
                            {
                                extend: "print",
                                titleAttr: 'Imprimir',
                                text: 'Imprimir'
                            },
                            
                        ],
                    },*/
                ],
                /*"language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },*/
                /*initComplete:function(){
                    $(".dataTables_info").append( $(".dt-buttons").clone(true));
                },*/
            } );
    
            new $.fn.dataTable.Buttons( table, {
                buttons: [
                    {
                        extend: "colvis",
                        titleAttr: 'Mostras/Ocultar Columnas',
                        text: 'Columnas',
                    },
                    {
                        extend: 'collection',
                        text: 'Exportar',
                        titleAttr: 'Opciones Exportación',
                        buttons: [
                            {
                                extend: "copy",
                                exportOptions: {
                                    columns: ':visible'
                                },
                                titleAttr: 'Copiar a portapapeles',
                                text: 'Copiar'
                            },
                            /*{
                                extend: "csv",
                                titleAttr: 'Exportar a CSV',
                                text: 'Csv'
                            },*/
                            {
                                extend: "excel",
                                exportOptions: {
                                    columns: ':visible'
                                },
                                titleAttr: 'Exportar a Excel',
                                text: 'Excel'
                            },
                            {
                                extend: "pdf",
                                exportOptions: {
                                    columns: ':visible'
                                },
                                titleAttr: 'Exportar a PDF',
                                text: 'Pdf'
                            },
                            {
                                extend: "print",
                                exportOptions: {
                                    columns: ':visible'
                                },
                                titleAttr: 'Imprimir',
                                text: 'Imprimir'
                            },
                            
                        ],
                    },
                ]
            } );
    
            table.buttons( 1, null ).container().appendTo(
                table.table().container()
            );
            
            //$('#tabla-data_wrapper').find('li.active').parents('li').addClass('menu-open');
            //$('#tabla-data').addClass('test3');
            setTimeout(function(){ 
                $('#tabla-data_wrapper').addClass('row'); 
                $('#tabla-data_length').addClass('col-md-6'); 
                $('.dt-buttons').addClass('col-md-0'); 
                $('.dt-buttons').addClass('pt-4'); 
                $('#tabla-data_filter').addClass('col-md-6');
                $('#tabla-data_info').addClass('col-md-6');
                $('#tabla-data').addClass('col-md-12'); 
                $('#tabla-data').addClass('p-0'); 
                $('#tabla-data_paginate').addClass('col-md-6');  
                $(".dropdown-toggle").attr("data-toggle", "dropdown");
            }, 100);
        });
    </script>
@else 
    <script>
        $.fn.dataTable.moment('DD-MM-YYYY');  
        $(function () {
            var table = $('#tabla-data').DataTable({
                dom: 'lBfrtip',
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "autoWidth": true,
                buttons: [
                ],
            } );
    
            new $.fn.dataTable.Buttons( table, {
                buttons: [
                    {
                        extend: "colvis",
                        titleAttr: 'Mostras/Ocultar Columnas',
                        text: 'Columnas',
                    },
                ]
            } );
    
            table.buttons( 1, null ).container().appendTo(
                table.table().container()
            );
            
            setTimeout(function(){ 
                $('#tabla-data_wrapper').addClass('row'); 
                $('#tabla-data_length').addClass('col-md-6'); 
                $('.dt-buttons').addClass('col-md-0'); 
                $('.dt-buttons').addClass('pt-4'); 
                $('#tabla-data_filter').addClass('col-md-6');
                $('#tabla-data_info').addClass('col-md-6');
                $('#tabla-data').addClass('col-md-12'); 
                $('#tabla-data').addClass('p-0'); 
                $('#tabla-data_paginate').addClass('col-md-6');  
                $(".dropdown-toggle").attr("data-toggle", "dropdown");
            }, 100);
        });
    </script>
@endif