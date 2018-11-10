<?php
    // Cuenta Personal
    $maxNombre = 32;
    $maxApellido = 24;
    $maxCorreo = 64;
    $maxTelefono = 19;
    
    // Empresa
    $maxEmpresa = 100;
    
    // Dirección
    $maxEstado = 24;
    $maxMunicipio = 50;
    $maxCodigoPostal = 5;
    $maxColonia = 50;
    $maxCalle = 50;
    $maxNumerosExtInt = 5;

    //Contraseña
    $minContrasena = 10;
    $maxContrasena = 26;
?>


<!doctype html>
<html lang="es-mx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
    <!-- Control Panel CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/control-panel-style.css"> -->


    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="../assets/css/solid.css">
    <link rel="stylesheet" href="../assets/css/regular.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">

    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.css"/>
  
    


    <style>
        @font-face {
            font-family: 'WorkSans-Bold';
            src: url(../assets/fonts/WorkSans-Bold.ttf);
        }

        @font-face {
            font-family: 'WorkSans-ExtraLight';
            src: url(../assets/fonts/WorkSans-ExtraLight.ttf);
        }
        @font-face {
            font-family: 'WorkSans-Light';
            src: url(../assets/fonts/WorkSans-Light.ttf);
        }
        @font-face {
            font-family: 'WorkSans-Medium';
            src: url(../assets/fonts/WorkSans-Medium.ttf);
        }
        @font-face {
            font-family: 'WorkSans-Regular';
            src: url(../assets/fonts/WorkSans-Regular.ttf);
        }

        @font-face {
            font-family: 'WorkSans-SemiBold';
            src: url(../assets/fonts/WorkSans-SemiBold.ttf);
        }

        body{
            background-color: #4d555e
        }
        
        a {
            color: #fff;
            list-style: none;
            text-decoration: none;
        }

        .active-sidebar {
            /*background-color: #2d353d !important;*/
            background-color: white !important;
            color: #343A40 !important;
            border: 0;
            font-family: 'Worksans-SemiBold' !important;
        }

        .nav-link{
            border-top: 1px solid #272b30;
            font-family: 'WorkSans-SemiBold';

        }

        .nav-link.active {
            color:#495057;
            background-color: #f2f2f2 !important;
            border-color: #dee2e6 #dee2e6 #fff;
        }

        .nav-link.tab-link{
            background-color: white;
            color: black;

        }

        .nav-link.tab-link:hover{

        }

        .nav-link:hover{
            background-color: #f2f2f2 !important;
            color: black;
        }

        .list-group{
            border:0;
            border-radius: 0;

        }

        .list-group-item{
            background-color: #3E4449;
            padding-left: 30px;
            border:0;
            border-radius: 0;
        }

        .list-group-item:first-child{
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .list-group-item:last-child {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .list-group-item-action{
            color: white;
            font-family: 'WorkSans-Light';
        }

        .list-group-item-action:hover{
            background-color: #2d353d;
            color: white;
        }

        #content{
            position:relative;
            overflow-y: scroll;
        }

        #over-sidebar {
            position:relative;
            overflow-y: scroll;
        }

        .sidebar-header-items > li > a{
            padding: 5px 0;
            
        }

        #sidebar .nav-item > a{
            background-color: #343A40;
            
        }


        #dismiss {
            width: 35px;
            height: 35px;
            line-height: 35px;
            background: #343A40;
        /*    position: absolute;
            top: 20px;
            right: 10px;
        */  
            cursor: pointer;
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            color: white;
        }

        #dismiss:hover {
            background: #fff;
            color: #343A40;
        }

        table.dataTable tbody td {
          vertical-align: top;
        }



    /*************************************************/
    /*************************************************/
    /*************************************************/
    /*************** SCROLLBAR SETTINGS **************/


        /* width */
        ::-webkit-scrollbar {
            width: 7px;
            height: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #343A40; 
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #4e5b68; 
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: white; 
        }



    </style>

    <title>Dymo - Panel de Control</title>
</head>
<body>







    <div class="row mr-0" style="height: 100vh;">
        
        <?php include '../includes/panel_sidebar.html' ?>

        <!-- Contenido -->
        <div class="col pl-2 pr-3 py-4 m-0 text-white" id="content">

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


    <script type="text/javascript" src="../assets/DataTables/datatables.js"></script>

    <script>
        // GLOBAL VARIABLES
        var result;
        var table;
        var tablasDetalles;
    </script>

    <script>
        function eliminarFila(id){
            switch(id){
                case 1:
                    break;
            }
        }
    </script>

    <script>
        /*$(document).ready(function(){

            $.fn.dataTable.ext.buttons.editar = {
                text: '<i class="far fa-edit fa-lg"></i>',
                action: function ( e, dt, node, config ) {
                    // Modal con formulario
                    $('#modal-form').find('.modal-body').html('Estás editando');
                    $('#modal-form').modal('show')

                }
            };

            $.fn.dataTable.ext.buttons.eliminar = {
                text: '<i class="far fa-trash-alt fa-lg"></i>',
                action: function ( e, dt, node, config ) {
                    // Modal con formulario
                    $('#modal-form').find('.modal-body').html('Estás editando');
                    $('#modal-form').modal('show');
                }
            };
        });*/


   

        $(".modal-footer").on('click', '#modal-btn-editar', function(){
            editarModal();
        });

        $(".modal-footer").on('click', '#modal-btn-guardar', function(){
            guardarModal();
        });

        function llenarModal(rowData){
            var columns = [];
            var tables = [];
            var table;
            var tablasDetalles = result['tablasDetalles'];

            $('#modalCenterTitle').append('<span class="text-muted"> - Zona [' + $(rowData[0]).attr('data-id') + ']</span>');


            for (var i = 0; i < rowData.length-1; i++) {
                columns[i] = $.parseHTML(rowData[i]);

                if(columns[i])

                table = $(columns[i]).attr('data-column');

                if(table.toLowerCase() === 'zona'){
                    
                }

                if(jQuery.inArray(table, tables ) == -1 ){
                    tables.push(table);
                }
            }

            console.log(tables);





            //console.log('Data-Column: ' + $(div).attr('data-column'));
            //console.log('Data-ID: ' + $(div).attr('data-id'));
            //console.log(dom_nodes);

        }

        function editarModal(){
            $('#modal-btn-guardar').removeClass('d-none');
            $('.modal-body').find('input').attr('readonly', false); 
            
            $('#modal-btn-editar').addClass('d-none');
        }

        function guardarModal(){
            $('.modal-body').find('input').attr('readonly', true); 
            
            $('#modal-btn-guardar').addClass('d-none');
            $('#modal-btn-editar').removeClass('d-none');

        }
    
    </script>


    <script>

        $(document).ready(function(){


            // FUNCIÓN PARA OCULTAR LA BARRA LATERAL Y HACERLA CHICA CON SÓLO ÍCONOS.
            $('#dismiss').on('click', function(){
                if($('#dismiss-arrow').hasClass('fa-arrow-left')){

                    $('#over-sidebar').removeClass('col-7 col-sm-4 col-md-3 col-lg-2').addClass('pl-3 pt-2').css('width', '75px');
                    $('.list-group-item').addClass('pl-3');
                    $('.item-text').hide();
                    $('.fa-caret-up, .fa-caret-down').hide();
                    
                    $('#dismiss').parent().closest('div').addClass('pl-2').parent().closest('div').removeClass('mr-0').addClass('mx-0');
                    $('#dismiss-arrow').removeClass('fa-arrow-left').addClass('fa-arrow-right');

                } else {

                    $('#over-sidebar').addClass('col-7 col-sm-4 col-md-3 col-lg-2').removeClass('pl-3 pt-2').css('width', 'auto');
                    $('.list-group-item').removeClass('pl-3');
                    $('.item-text').show();
                    $('.fa-caret-up, .fa-caret-down').show();

                    $('#dismiss').parent().closest('div').removeClass('pl-2').parent().closest('div').addClass('mr-0').removeClass('mx-0');
                    $('#dismiss-arrow').removeClass('fa-arrow-right').addClass('fa-arrow-left');
                
                }
                
            });


            // Cambio de la flecha de dropdown
            $('.nav-link').on('click', function(){
                //if($('#dismiss-arrow').hasClass('fa-arrow-left')){ // Si no está oculto el sidebar... 
                    if ($(this).find('.fa-caret-up')[0]){
                        $(this).find('.fa-caret-up').addClass('fa-caret-down').removeClass('fa-caret-up');
                    } else {
                        $(this).find('.fa-caret-down').addClass('fa-caret-up').removeClass('fa-caret-down');
                    }
                //}
            });



            $('a.list-group-item-action').on('click', function(){
                $('#sidebar .active-sidebar').removeClass("active-sidebar");

                $(this).addClass('active-sidebar');


                var id = $(this).attr('id');



                $.ajax({

                    type: "GET",
                    url: 'panelOpciones.php',
                    data: "id=" + id,
                    dataType:"json",
                    success: function(data) {

                        /*
                        console.log(JSON.stringify(data['columnas']));
                        console.log(data['columnas']);
                        console.log("Titulo Contenido: " + data['tituloContenido']);
                        console.log("Tabla String: " + data['tablaString']);
                        console.log("Data Fetch File: " + data['dataFetchFile']);
                        console.log("Columnas: " + data['columnas']);
                        console.log(JSON.stringify(data['columnas']));*/

                        result = data;

                        $('#content').html(result['tituloContenido'] + result['tablaString']);
                        var tituloContenido = $('#titulo-contenido').text().toLowerCase();
                        $('#modalCenterTitle').html('Detalles de ' + tituloContenido);

                        //switch(tituloContenido){
                          //  case 'clientes':
                                $('.modal-body').html(result['modalBody']);
                                $('.modal-footer').html(result['modalFooter']);
                            //    break;
                        //}
                    },

                    complete: function(data) {

                        table = $('#tabla').DataTable({

                            "processing": true,
                            "serverSide": true,
                            "order" : [],
                            "ajax": {
                                "url": result['dataFetchFile'],
                                "type": "POST"/*,
                                dataFilter: function(resp) {
                                    console.log(resp);
                                    // deserialize resp if needed.
                                    // peel off the exta data and pass it on
                                    // make sure the data for the table is the way datatable expects it
                                    //return that data object for datatables use
                                }*/
                            },
                            "columns": result['columnas'],
                            "language": {
                                "decimal":        "",
                                "emptyTable":     "No hay datos disponibles en la tabla",
                                "info":           "Mostrando _START_ - _END_ de _TOTAL_ entradas",
                                "infoEmpty":      "Mostrando 0 - 0 de 0 entradas",
                                "infoFiltered":   "(filtrado de _MAX_ entradas en total)",
                                "infoPostFix":    "",
                                "thousands":      ",",
                                "lengthMenu":     "Mostrar _MENU_ entradas",
                                "loadingRecords": "Cargando...",
                                "processing":     "Procesando...",
                                "search":         "Buscar:",
                                "zeroRecords":    "No se encontró ningún registro",
                                "paginate": {
                                    "first":      "Primero",
                                    "last":       "Último",
                                    "next":       "Siguiente",
                                    "previous":   "Anterior"
                                }
                            },
                            "initComplete": function() {


                                new $.fn.dataTable.Buttons( table, {
                                    name: 'exportar',
                                    buttons: [
                                        {
                                            extend: 'excel',
                                            text: '<i class="fas fa-file-excel fa-lg text-success"></i>', 
                                            exportOptions: {
                                                columns: 'th:not(:last-child)'
                                            }
                                        },
                                        {
                                            extend:'pdf',
                                            text: '<i class="fas fa-file-pdf fa-lg text-danger"></i>', 
                                            exportOptions: {
                                                columns: 'th:not(:last-child)'
                                            }
                                        },
                                        { 
                                            extend: 'print',
                                            text: '<i class="fas fa-print fa-lg text-secondary"></i>', 
                                            exportOptions: {
                                                columns: 'th:not(:last-child)'
                                            }
                                        },
                                        {
                                            text: '<i class="fas fa-sync-alt fa-lg text-success"></i>',
                                            action: function ( e, dt, node, config ) {
                                                dt.ajax.reload();
                                            }
                                        }
                                    ]
                                });

                                /*
                                new $.fn.dataTable.Buttons( table, {
                                    name: 'modificar',
                                    buttons: [
                                        {
                                            text: '<i class='far fa-edit fa-lg'></i>',
                                            action: function ( e, dt, node, config ) {
                                                // Modal con formulario
                                                $('#modal-form').find('.modal-body').html('Estás editando');
                                                $('#modal-form').modal('show')

                                            }
                                        },
                                        {
                                            text: '<i class="far fa-trash-alt fa-lg"></i>',
                                            action: function ( e, dt, node, config ) {
                                                // Modal con formulario
                                                $('#modal-form').find('.modal-body').html('Estás editando');
                                                $('#modal-form').modal('show');
                                            }
                                        }
                                    ]
                                });*/

                                 //table.buttons('exportar',null).container()
                                   // .appendTo( $('div.dataTables_length:eq(0)', table.table().container()) );

                                // Insertar div donde van los botones de exportar. Después del título del contenido.
                                $('#titulo-contenido').after("<div class='text-center' id='div-exportar'></div>");

                                // Insertar set de botones de exportar dentro del div.
                                $('#div-exportar').html(table.buttons('exportar',null).container());

                                // Poner el width en auto.
                                table.buttons('exportar', null).container().css('width', 'auto');
                                table.buttons('exportar', null).container().find('button').removeClass('btn-secondary').addClass('btn-light');

                                $('#tabla_processing').addClass('bg-info');


                                // Obtener datos de la fila seleccionada
                                $('#tabla tbody tr').on( 'click', '.detalles', function () {
                                    console.log(table.row($( this ).closest( "tr" )).data());
                                    llenarModal(table.row($( this ).closest( "tr" )).data() );
                                    $('#modal-form').modal('show');
                                } );
                                
                            }
                        });



                        // Añadir la clase .table-responsive al div padre de la tabla
                        $("#tabla").parent().addClass("table-responsive");
                        


                    }

                });





            });


        });
    </script>


































    <script>
        


            $('#content').on('click', '.btn-editar', function () {
                console.log("Clicked on btn-editar");
            });

            $('#content').on('click', '.btn-eliminar', function () {
                console.log("Clicked on btn-eliminar");
            });

            function agegarBotones(table){
                //alert("Agregar botones");
/*
                table
                    .buttons( 'export, commands', null )
                    .containers()
                    .appendTo( '#panel' );

                table.buttons('exportar',null).container()
                    .appendTo( $('div.dataTables_length:eq(0)', table.table().container()));


                table.buttons('exportar', null).container().addClass('ml-3');
                table.buttons('exportar', null).container().find('button').removeClass('btn-secondary').addClass('btn-light');
*/
                //$('.dt-buttons.btn-group').addClass('ml-3');
                //$('.dt-buttons.btn-group').find('button').removeClass('btn-secondary').addClass('btn-light');
                

                // Agregar header de la columna "Acciones"
                /*$('#tabla thead tr').append("<th scope='col' tabindex='0' aria-controls='tabla' rowspan='1' colspan='1' style='width: 150px;'>Acciones</th>");*/

                // Agregar celdas de las acciones con sus íconos
                //$('#tabla tbody tr').append('<td class="td-acciones"></td>');


                // Agregar celdas de las acciones con sus íconos
                //$('#tabla tbody tr td:last-child').append(table.buttons('modificar', null).container());

                // Añadir clases de estilo a los botones de Acciones.
                //$('#tabla tbody tr td:last-child').addClass('text-center');
                //$('#tabla tbody tr td:last-child').find('button').removeClass('btn-secondary').addClass('btn-outline-light');

                // Agregar footer de la columna "Acciones"
                //$('#tabla tfoot tr').append("<th rowspan='1' colspan='1' class='actions'>Acciones</th>");


            }



    </script>


</body>
</html>