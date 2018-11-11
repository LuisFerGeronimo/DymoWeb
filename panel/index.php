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

    <!-- Estilos de DataTables -->
    <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.css"/>
  
    <!-- Estilos propios del panel -->
    <link rel="stylesheet" type="text/css" href="../assets/css/panel-style.css"/>
        
    <!-- Titulo -->
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
                    <h5 class="modal-title" id="modalCenterTitle"><span id="mainTitle">Modal title</span><span class="text-muted"></span></h5>
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

    <!-- DataTables JS -->
    <script type="text/javascript" src="../assets/DataTables/datatables.js"></script>










    <script>
        /* VARIABLES GLOBALES */
        // result: Almacena el resultado que se obtiene de la petición ajax al archivo panelOpciones.php
        var result;

        // table: Almacena la instancia que se obtiene del plugin DataTables.
        var table;

        // tablasDetalles: Almacena las tablas que se necesian detallas en el modal al presionar "Detalles".
        var tablasDetalles;
    </script>











    <script>

        /****************************************************************************************/
        /****************************************************************************************/
        /****************************************************************************************/
        /****************************** FUNCIONES REFERENTES AL MODAL ***************************/


        // On click listener para el boton "Editar" del Footer del Modal (.modal-footer).
        $(".modal-footer").on('click', '#modal-btn-editar', function(){
            // Al dar click al boton de "Editar"...
            // ... se muestra el botón de "Guardar Cambios", quitándole la clase de "d-none" de Bootstrap
            $('#modal-btn-guardar').removeClass('d-none');
            // Se le PERMITE al usuario modificar el contenido de todos los input, QUITÁNDOLES el atributo de SÓLO LECTURA
            $('.modal-body').find('input').attr('readonly', false); 
            
            //... se esconde el botón "Editar", añadiéndole la clase de "d-none-" de Bootstrap
            $('#modal-btn-editar').addClass('d-none');
        });

        // On click listener para el boton "Guardar Cambios" del Footer del Modal (.modal-footer).
        $(".modal-footer").on('click', '#modal-btn-guardar', function(){
            // Al dar click al boton de "Guardar Cambios"...
            // ... se muestra el botón de "Editar", quitándole la clase de "d-none" de Bootstrap
            $('#modal-btn-editar').removeClass('d-none');
            // Se le PROHIBE al usuario modificar el contenido de todos los input, cambiándolos a SÓLO LECTURA
            $('.modal-body').find('input').attr('readonly', true); 
            // Se esconde el botón de "Gurdar Cambios", añadiéndole la clase de "d-none-" de Bootstrap
            $('#modal-btn-guardar').addClass('d-none');
            
        });

        function prueba(rowData){

        }

        function obternerParsedArray(rowData){
            var parsed = [];

            for (var i = 0; i < rowData.length-1; i++) {
                parsed[i] = $.parseHTML(rowData[i]);
            }

            return parsed;

        }


        function llenarModal(datosDeFila){

            var parsedArray = obternerParsedArray(datosDeFila);

            console.log(parsedArray);


            // Variable donde se guardan las tablas a las que se van a consultar los detalles.
            // Las tablas son las mismas que los 'tabs' que aparecen en el Modal.
            var tablasADetallar = result['tablasADetallar'];
            var tablasADetallarFinal = new Array();
            var tablasDependientes = new Array();
            var tablasEvaluadas = new Array();
            // Array auxiliar para almacenar {tabla, id, llaveForanea, select} y transferirla al array final ('tablasADetallarFinal')
            var helperArray = new Array();


            $('#modalCenterTitle .text-muted').html('- Zona [' + $(datosDeFila[0]).attr('data-id') + ']');

            // Almacenar la tabla que se evalua temporalmente
            var tabla;
            // Almacenar el id de la tabla que se evalua temporalmente
            var id;


            for (var i = 0; i < tablasADetallar.length; i++) {
                console.log("I: " + i);


                if(jQuery.inArray(tablasADetallar[i]['tabla'], tablasEvaluadas)===-1){
                    if(tablasADetallar[i]['id'] === null){

                        tabla = tablasADetallar[i]['tabla'];
                        console.log("Tabla: " + tabla);

                        for (var j = 0; j < parsedArray.length; j++) {
                            console.log("J: " + j);

                            if($(parsedArray[j]).attr('data-column').toLowerCase() === tabla.toLowerCase()){
                                helperArray = new Array();

                                id = $(parsedArray[j]).attr('data-id');

                                helperArray['tabla'] = tabla;

                                helperArray['id'] = id;
                                console.log("ID: " + id);

                                helperArray['llaveForanea'] = tablasADetallar[i]['llaveForanea'];
                                console.log("LlaveForanea: " + tablasADetallar[i]['llaveForanea']);

                                helperArray['select'] = tablasADetallar[i]['select'];
                                console.log("Select: " + tablasADetallar[i]['select']);

                                console.log("Helper Array: ");
                                console.log(helperArray);

                                // Se añade 'helperAray' a 'tablasADetallarFinal'
                                tablasADetallarFinal.push(helperArray);
                                tablasEvaluadas.push(tabla);
                                break;
                            }
                        }
                    } else {
                        helperArray = new Array();

                        helperArray['tabla'] = tablasADetallar[i]['tabla'];
                        helperArray['id'] = tablasADetallar[i]['id'];
                        helperArray['llaveForanea'] = tablasADetallar[i]['llaveForanea'];
                        helperArray['select'] = tablasADetallar[i]['select'];


                        tablasDependientes.push(helperArray);

                    }
                }
            }


            console.log(tablasADetallar);
            console.log(tablasADetallarFinal);
            console.log(tablasDependientes);
            console.log(helperArray);


            for (var i = 0; i < tablasDependientes.length; i++) {

                id = tablasDependientes[i]['id'];
                

                for (var j = 0; j < parsedArray.length; j++) {

                    if($(parsedArray[j]).attr('data-column').toLowerCase() === id.toLowerCase()){
                        helperArray = new Array();

                        helperArray['tabla'] = tablasDependientes[i]['tabla'];
                        helperArray['id'] = $(parsedArray[j]).attr('data-id');
                        helperArray['llaveForanea'] = tablasDependientes[i]['llaveForanea'];
                        helperArray['select'] = tablasDependientes[i]['select'];

                        // Se añade 'helperAray' a 'tablasADetallarFinal'
                        tablasADetallarFinal.push(helperArray);

                    }
                }
            }

            console.log(tablasADetallarFinal);

    </script>

















    <script>

        // FUNCIONES DE LA BASE DE DATOS

        // Obtener un JSON con los datos de una tabla por medio de un ID
        function selectTableByID(table, select, id){

            $.ajax({
                type: "POST",
                url: 'obtenerDetalles.php',
                data: 
                    {
                        table: table,
                        select: select,
                        id: id
                    },
                dataType:"json",
                success: function(data) {
                    return data;
                }/*,
                error: function (xhr, status, error) { 
                    console.log("Xhr: " + xhr);
                    console.log("Xhr.responseText: " + xhr.responseText);
                    console.log("Status: " + status);
                    console.log("Error: " + error);
                    var err = JSON.parse(xhr.responseText);
                    console.log(err);
                    console.log(err.error);
                    alert(err.error); 
                }*/
            });
        }


    </script>








    <!-- JavaScript del Panel para: -->
    <!--  - Hacer el Sidebar más chico y viceversa -->
    <!--  - Cambiar el ícono (la flechita hacia abajo/arriba) del dropdown al hacer click -->
    <script src="../assets/js/panelSidebar.js"></script>







    <!-- Script para obtener la información necesaria que se mostrará en el contenido (#content) -->
    <script>
        $(document).ready(function(){
            // On click listener para el
            $('a.list-group-item-action').on('click', function(){
                // Quitarle la clase 'active' a cualquier link que lo tenga...
                $('#sidebar .active-sidebar').removeClass("active-sidebar");
                // ... y añadírsela al link que se le ha hecho click
                $(this).addClass('active-sidebar');

                // Obtener el id del link para saber qué información mostrarle al usuario.
                var id = $(this).attr('id');

                // Esta función de ajax nos ayuda a obtener:
                // - El titulo del contenido,
                // - El esqueleto de la tabla,
                // - El array de columnas que se pondrán al DataTable,
                // - ModalBody: El formulario que irá en el modal cuando se le da click en "Detalles",
                // - ModalFooter: El footer del modal, y
                // - El nombre del archivo donde se sacaran los datos de la tabla
                $.ajax({

                    type: "GET",
                    url: 'panelOpciones.php',
                    data: "id=" + id,
                    dataType:"json",
                    success: function(data) {

                        // Se asigna el result a una variable global
                        result = data;

                        $('#content').html(result['tituloContenido'] + result['tablaString']);
                        var tituloContenido = $('#titulo-contenido').text().toLowerCase();
                        $('#modalCenterTitle #mainTitle').html('Detalles de ' + tituloContenido);

                        //switch(tituloContenido){
                          //  case 'clientes':
                                $('.modal-body').html(result['modalBody']);
                                $('.modal-footer').html(result['modalFooter']);
                            //    break;
                        //}
                    },

                    complete: function(data) {createDataTable();}

                });
            });
        });
    </script>














    <script>
        function createDataTable(){
            // Se le asigna a la variable global "table" la instancia creada del DataTable
            // Se hace referencia al id del esqueleto de la tabla agregado al hacer click en un link del sidebar
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
                // Opciones de lenguaje de las funciones de la tabla
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

                    /*****************************************************/
                    /*****************************************************/
                    /*** I. Inserción de botones "Exportar": Pasos 1-5 ***/

                    // (1/5) Creación de botones DataTable.
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

                    // (2/5) Insertar div donde van los botones de exportar. Después del título del contenido.
                    //      Se le asigna la clase "text-center" para que centre su contenido.
                    //      Se le asigna un id "div-exportar" para hacer referencia a él en el siguiente paso.
                    $('#titulo-contenido').after("<div class='text-center' id='div-exportar'></div>");

                    // (3/5) Insertar set de botones de "exportar" dentro del div haciendo referencia al id creado en el paso 2.
                    $('#div-exportar').html(table.buttons('exportar',null).container());

                    // (4/5) Poner el width en auto para que se pueda centrar el contenedor creado en el paso 1.
                    table.buttons('exportar', null).container().css('width', 'auto');

                    // (5/5) Se le quita a los botones la clase de bootstrap 'btn-secondary' y se le añade la clase 'btn-light'
                    table.buttons('exportar', null).container().find('button').removeClass('btn-secondary').addClass('btn-light');


                    // Se le asigna una clase de Bootstrap al div que muestra el mensaje "Procesando..."
                    $('#tabla_processing').addClass('bg-info');

                    /* Obtener los datos de la fila al apretar "Detalles" */
                    // On Click Listener: Al apretar el botón "Detalles" de alguna fila...
                    $('#tabla tbody tr').on( 'click', '.detalles', function () {
                        //console.log(table.row($( this ).closest( "tr" )).data());
                        // Se obtienen los datos de la fila que se insertaron al momento de la instancia del DataTables.
                        //  - El objeto que se obtiene es del mismo tipo del que se recibió del archivo ajax -> url que se puso en el DataTables.
                        llenarModal(table.row($( this ).closest( "tr" )).data() );
                        // Se muestra el modal con los formularios
                        $('#modal-form').modal('show');
                    });

                    // Añadir la clase .table-responsive al div que contiene la tabla
                    $("#tabla").parent().addClass("table-responsive");
                    
                }
            });
        }
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