<?php

/* Sublime Text 3: TabSize=4 */

/**
 * Panel de Control para Vendedores y Administradores
 *
 * La principal finalidad del Panel de Control es que los Vendedores puedan
 * tomar los pedidos de los clientes teniendo la posibilidad de ver una lista
 * de éstos mismos con toda la información necesaria.
 *
 * Además de esto, el admnistrador podrá ver lo mismo y gestionar a los
 * vendedores.
 * 
 * PHP version 7.2.10
 *
 * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
 * @author Jesús Emmanuel Zetina Chevez <zcjo151173@upemor.edu.mx>
 */

// {{{ constants


//===============================================================================
// CONSTANTES PARA EL NÚMERO MÁXIMO DE CARACTERES EN LOS INPUTS DE
//===============================================================================


//-----------------------------------------------------
// Cuenta Del Cliente
//-----------------------------------------------------

// Nombre de cliente
define('MAX_NOMBRE', 32);

// Apellidos del cliente
define('MAX_APELLIDO', 24);

// Correo del cliente 
define('MAX_CORREO', 64);

// Teléfono del cliente
define('MAX_TELEFONO', 19);


//-----------------------------------------------------
// Empresa Del Cliente
//-----------------------------------------------------

// Empresa del cliente
define('MAX_EMPRESA', 100);


//-----------------------------------------------------
// Dirección De La Empresa
//-----------------------------------------------------

// Estado de la empresa
define('MAX_ESTADO', 24);

// Municipio de la empresa
define('MAX_MUNICIPIO', 50);

// Código postal de la empresa
define('MAX_CODIGO_POSTAL', 5);

// Colonia de la empresa
define('MAX_COLONIA', 50);

// Calle de la empresa
define('MAX_CALLE', 50);

// Número Interior y Exterior de la empresa
define('MAX_NUMEROS_EXT_INT', 5);


//-----------------------------------------------------
// Seguridad De La Cuenta
//-----------------------------------------------------

// Mínimo y máximo de la contraseña de la cuenta
define('MIN_CONTRASENA', 10);
define('MAX_CONTRASENA', 26);

// }}}

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
  
    <!-- Estilos propios del panel de control -->
    <link rel="stylesheet" type="text/css" href="../assets/css/panel-style.css"/>
        
    <!-- Titulo -->
    <title>Dymo - Panel de Control</title>

</head>
<body>






<!-- Website Wrapper -->
<div class="row mr-0" style="height: 100vh;">
    
    <!-- Sidebar Izquierdo -->
    <?php include '../includes/panel_sidebar.html' ?>

    <!-- Contenido -->
    <div class="col pl-2 pr-3 py-4 m-0 text-white" id="content">

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <!-- Modal Title -->
                <h5 class="modal-title" id="modalCenterTitle"><span id="mainTitle">Modal title</span><span class="text-muted"></span></h5>
                <!-- Modal Dismiss Button -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Modal Body - Aquí van las pestañas con sus respectivos formularios -->
            <div class="modal-body">
                
            </div>
            <!-- Modal Footer - Aquí van los botones de Cerrar/Editar/Guardar Cambios -->
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
















<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="../assets/DataTables/datatables.js"></script>










<script>
    /**
     * Variables globales
     *
     * Este script se encarga de extraer los input y el formulario en 
     * variables para poder accesarlas más adelante de manera más fácil.
     *
     * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
     * @author Jesús Emmanuel Zetina Chevez <zcjo151173@upemor.edu.mx>
     */
    
    //======================================================================
    // VARIABLES GLOBALES
    //======================================================================
    
    /*
     * Almacena la respuesta que se obtiene de la solicitud ajax enviada al
     * archivo panelOpciones.php 
     */
    var result;

    // Almacena la instancia de la tabla que se obtiene del plugin DataTables.
    var table;
</script>











<script>
    /**
     * Script para operaciones referentes al Modal
     *
     * Dentro de este script se estructura el modal para mostarle al usuario
     * los detalles de algún registro en la base de datos.
     *
     * @todo Modificar el título del modal (Zona...) para que sea genérico.
     *       Esto sólo es para los Clientes. Al menos por ahora.
     * 
     * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
     * @author Jesús Emmanuel Zetina Chevez <zcjo151173@upemor.edu.mx>
     */


    //======================================================================
    // ON CLICK LISTENERS DE BOTONES
    //======================================================================

    //-----------------------------------------------------
    // Boton "Editar"
    //-----------------------------------------------------
    $(".modal-footer").on('click', '#modal-btn-editar', function(){

        // Se muestra el botón de "Guardar Cambios".
        $('#modal-btn-guardar').removeClass('d-none');
        
        // Se le quita a los input el atributo de sólo lecutra.
        $('.modal-body').find('input').attr('readonly', false); 
        
        // Se oculta el botón "Editar".
        $('#modal-btn-editar').addClass('d-none');
    });

    //-----------------------------------------------------
    // Boton "Guardar Cambios"
    //-----------------------------------------------------
    $(".modal-footer").on('click', '#modal-btn-guardar', function(){

        // Se muestra el botón de "Editar".
        $('#modal-btn-editar').removeClass('d-none');

        // Se le pone a los input el atributo de sólo lecutra.
        $('.modal-body').find('input').attr('readonly', true); 
        
        // Se oculta el botón "Guardar Cambios".
        $('#modal-btn-guardar').addClass('d-none');
        
    });

    //-----------------------------------------------------
    // Boton "Detalles" De La Tabla
    //-----------------------------------------------------
    
    /*
     * Esta función es para detectar el click sobre el botón "Detalles" que
     * aparece en todas las filas y poder llenar la información de esa fila
     * en el modal.
     */
    $('#content').on( 'click', '.detalles', function () {

        /*
         * Se obtienen los datos de la fila que se insertaron al momento de la
         * instancia del DataTables y se envían al método llenarModal.
         * 
         * El objeto que se obtiene es del mismo tipo del que se recibió del
         * archivo (ajax -> url: result['dataFetchFile']) que se puso en el
         * DataTables.
         */
        llenarModal(table.row($( this ).closest( "tr" )).data() );
        
        // Se muestra el modal con los formularios
        $('#modal-form').modal('show');
    });


    /**
     * Transforma un arreglo con elementos HTML dentro en forma de String's
     * a nodos del DOM. Esta 'transformación' se hace para poder accesar a
     * los atributos de los elementos HTML. Y siendo nodos del DOM facilita
     * este trabajo a que si estuviesen en String.
     * 
     * @param  {array}   @rowData  arreglo con los elementos html en forma 
     *                             de String              
     * @return {array}             arreglo con los elementos HTML en forma
     *                             de nodos DOM.
     */
    function obtenerParsedArray(rowData){
        /**
         * Arreglo para almacenar los nodoes del DOM
         * @type {Array}
         */
        var parsed = [];

        /*
         * Se recorre el arreglo rowData y se van transformando los elementos
         * en forma de String a Nodos DOM, almacenándolos en el arreglo parsed.
         */
        for (var i = 0; i < rowData.length-1; i++) {
            parsed[i] = $.parseHTML(rowData[i]);
        }

        return parsed;
    }
                                                                        

    /**
     * Llena la información de la fila de manera más detalla en los input's
     * que contiene el Modal. Para que después el usuario pueda modificar sin
     * problemas.
     * 
     * @param  {array} datosDeFila [description]
     * @return {void}             [description]
     */
    function llenarModal(datosDeFila){

        // 'Transformación' de elementos HTML.
        var parsedArray = obtenerParsedArray(datosDeFila);


        //======================================================================
        // DECLARACIÓN DE VARIABLES AUXILIARES
        //======================================================================

        /**
         * Aquí se almacenan las tablas que están dentro del array
         * result['tablasADetallar']. Esta es una lista de las tablas que se 
         * van a consultar en la base de datos y de las cuales se sacarán
         * información para llenar el modal.
         *
         * La lista de tablas es la misma que las pestañas que aparecen en el
         * modal.
         *
         * Los datos que almacena para cada índice (y cada tabla) son los
         * siguientes:
         *
         * [i]: {
         *   Tabla => String,
         *   id => int/String,
         *   llaveForanea => String,
         *   select => String
         * }
         * 
         * @type {array}
         */
        var tablasADetallar = result['tablasADetallar'];

        /**
         * Aquí se almacena la misma información que en arreglo de
         * tablasADetallar, a excepción que ya se tienen bien definidos los
         * datos de cada tabla para poder hacer correctamente las consultas
         * en la BD.
         * 
         * @type {Array}
         */
        var tablasADetallarFinal = [];

        /**
         * Aquí se almacenan temporalmente las tablas que se van a detallar
         * pero que ninguna de sus propiedades se encuentra en la columna
         * de la tabla DataTable. Y es dependiente de otras tablas, es decir
         * necesita de un ID sacado de las tablas NO dependientes para poder
         * extraer su información.
         *
         * Un ejemplo es la tabla de Dirección en la opcion de enlistar los
         * clientes. No existe información de la dirección en la tabla 
         * DataTable pero sí se detalla en el modal.
         *
         * Como no existe ninguna columna de Dirección, no podemos saber
         * qué información extraer de la BD. A menos que extraigamos primero
         * algún llave única (en este cass, una llave foránea) para poder
         * consultar la información. Así que se extrae el id de la tabla
         * Empresa, ya que Dirección depende de Empresa. De ahí el nombre de
         * 'tablasDependientes'.
         *
         * Las tablas dependientes se identifican porque su id contiene el
         * nombre de la tabla de la que es dependiente y por ende su
         * id es diferente (!==) de null.
         * 
         * @type {Array}
         */
        var tablasDependientes = [];

        /**
         * Almacena una lista de las tablas que ya fueron evaluadas. Es decir,
         * las tablas a las que ya se les definió la información necesaria
         * para el siguiente paso: La consulta en la BD.
         * 
         * @type {Array}
         */
        var tablasEvaluadas = [];

        /**
         * Arreglo auxiliar para almacenar la información de las tablas y
         * transferirlas de tablasADetallar a tablasADetallarFinal.
         * 
         * @type {Array}
         */
        var helperArray = [];

        // Asignación de la zona del cliente en el título del modal.
        $('#modalCenterTitle .text-muted').html('- Zona [' + $(datosDeFila[0]).attr('data-id') + ']');

        /* Variables Auxiliares Para Acortar Código */
        /**
         * Almacena temporalmente el nombre de la tabla que está siendo
         * evaluada con la finalidad de simplificar código.
         * 
         * @type {String}
         */
        var tabla;

        /**
         * Almacena temporalmente el id de la tabla que está siendo
         * evaluada con la finalidad de simplificar código.
         * 
         * @type {int}
         */
        var id;

        //======================================================================
        // OBTENCIÓN DE LA INFORMACIÓN DE LAS TABLAS NO DEPENDIENTES
        //======================================================================


        /**
         * Recorre las tablas que se deben detallar.
         * 
         * Dentro de este ciclo se separan las tablas dependientes de las NO
         * dependientes. A las tablas NO dependientes se les asigna su ID y se
         * transfieren al arreglo tablasADetallarFinal.
         *
         * Las tablas dependiente, son pasadas al arreglo tablasDependientes.
         * 
         * @param  {int}   var i   variable incremental, empezando desde 0
         *                         hasta la longitud del arreglo tablasADetalar
         *                         
         * @param  {array} var tablasADetallar  arreglo que contiene la info.
         *                                      de las tablas que se deben
         *                                      detallar.
         * @return {void}
         */
        for (var i = 0; i < tablasADetallar.length; i++) {

            // Verifica si la tabla ya ha sido evaluada anteriormente.
            if(jQuery.inArray(tablasADetallar[i]['tabla'], tablasEvaluadas)===-1){

                // Verifica si es una tabla dependiente.
                if(tablasADetallar[i]['id'] === null){

                    //-----------------------------------------------------
                    // Tablas No Dependientes
                    //-----------------------------------------------------

                    // Obtención del nombre de la tabla
                    tabla = tablasADetallar[i]['tabla'];

                    /**
                     * Recorre los nodos DOM para extraer sus atributos.
                     * 
                     * Los atributos que contiene son los siguientes:
                     *   - data-column: {String} Tabla a la que pertenece
                     *   - data-id: {int} Llave primaria del registro.
                     *
                     * 
                     * @param  {[type]} var j  variable incremental, empezando
                     *                         en 0, hasta la longitud del
                     *                         arreglo parsedArray.
                     *                         
                     * @return {void}
                     */
                    for (var j = 0; j < parsedArray.length; j++) {

                        /*
                         * Verifica si el nodo DOM es de la tabla que está
                         * siendo evaluada.
                         */
                        if($(parsedArray[j]).attr('data-column').toLowerCase() === tabla.toLowerCase()){

                            // Instanciación
                            helperArray = [];

                            // Obtención del id del nodo DOM
                            id = $(parsedArray[j]).attr('data-id');

                            //-----------------------------------------------------
                            // Transferencia De Datos Al Arreglo Auxiliar
                            //-----------------------------------------------------

                            helperArray['tabla']        = tabla;
                            helperArray['id']           = id;
                            helperArray['llaveForanea'] = tablasADetallar[i]['llaveForanea'];
                            helperArray['select']       = tablasADetallar[i]['select'];

                            // Se añade 'helperAray' a 'tablasADetallarFinal'.
                            tablasADetallarFinal.push(helperArray);

                            // Se añade la tabla al arreglo de tablas evaluadas.
                            tablasEvaluadas.push(tabla);

                            /*
                             * Se sale del ciclo porque ya se encontró el nodo
                             * DOM en el parsedArray de la tabla que se evaluaba.
                             */
                            break;
                        }
                    }
                } else {
                    //-----------------------------------------------------
                    // Tablas Dependientes
                    //-----------------------------------------------------
                    helperArray = [];


                    //-----------------------------------------------------
                    // Transferencia De Datos Al Arreglo Auxiliar
                    //-----------------------------------------------------

                    helperArray['tabla'] = tablasADetallar[i]['tabla'];
                    helperArray['id'] = tablasADetallar[i]['id'];
                    helperArray['llaveForanea'] = tablasADetallar[i]['llaveForanea'];
                    helperArray['select'] = tablasADetallar[i]['select'];

                    // Se añade 'helperAray' a 'tablasDependientes'.
                    tablasDependientes.push(helperArray);

                }
            }
        }

        //======================================================================
        // OBTENCIÓN DE LA INFORMACIÓN DE LAS TABLAS DEPENDIENTES
        //======================================================================
        
        for (var i = 0; i < tablasDependientes.length; i++) {

            /*
             * Se obtiene el 'id' de la tabla dependiente, que en realidad es
             * el nombre de la tabla de la cual depende.
             * e.g. Tabla: 'Dirección' -- depende de -> id: 'Empresa'.
             */
            id = tablasDependientes[i]['id'];            

            /**
             * Recorre los nodos DOM para extraer sus atributos.
             * 
             * @param  {[type]} var j  variable incremental, empezando
             *                         en 0, hasta la longitud del
             *                         arreglo parsedArray.
             *                         
             * @return {void}
             */
            for (var j = 0; j < parsedArray.length; j++) {

                /*
                 * Verifica si el nodo DOM es de la tabla NO dependiente
                 * de la cual depende la tabla que está siendo evaluada.
                 */
                if($(parsedArray[j]).attr('data-column').toLowerCase() === id.toLowerCase()){
                    helperArray = [];

                    helperArray['tabla']        = tablasDependientes[i]['tabla'];
                    helperArray['id']           = $(parsedArray[j]).attr('data-id');
                    helperArray['llaveForanea'] = tablasDependientes[i]['llaveForanea'];
                    helperArray['select']       = tablasDependientes[i]['select'];

                    // Se añade 'helperAray' a 'tablasADetallarFinal'.
                    tablasADetallarFinal.push(helperArray);

                }
            }
        }



        //======================================================================
        // DECLARACIÓN DE VARIABLES AUXILIARES
        //======================================================================
        // TODO: CONTINUACIÓN...
        //       Lunes - 12/11/2018 - 05:42 a.m. - Commit 24
        
        var where;
        var inputs;
        var valoresInput = [];
        var jQuerySelector;
        var columnas;

        // Obtener los valores de cada tabla y asignar los valores a cada input de cada tab del Modal.
        for (var i = 0; i < tablasADetallarFinal.length; i++) {


            if(tablasADetallarFinal[i]['llaveForanea'] !== null){
                where = tablasADetallarFinal[i]['llaveForanea'] + ' = ?';
            } else {
                where = 'id = ?';
            }
            
/*                valoresInput = obtenerDetalles(
                tablasADetallarFinal[i]['tabla'],   // Tabla (e.g. Cliente)
                tablasADetallarFinal[i]['select'],  // Select (e.g. 'nombre, apellidoP, apellidoM')
                where,                              // Where (e.g. id = ?)
                tablasADetallarFinal[i]['id']       // id (e.g. 2),
            );
*//*
            console.log("TABLA: ");
            console.log(tablasADetallarFinal[i]['tabla']);
            console.log("SELECT: ");
            console.log(tablasADetallarFinal[i]['select']);
            console.log("WHERE: ");
            console.log(where);
            console.log("ID: ");
            console.log(tablasADetallarFinal[i]['id']);
            
*/

            obtenerDetalles(
                tablasADetallarFinal[i]['tabla'],
                tablasADetallarFinal[i]['select'],
                where,
                tablasADetallarFinal[i]['id'],
                i, 
                function(i, valoresInput,){


                    columnas = tablasADetallarFinal[i]['select'].split(" ").join("").split(',');

                    if(valoresInput != null){
                        console.log("tablasADetallarFinal[i]['tabla']: ");
                        console.log(tablasADetallarFinal[i]['tabla']);

                        console.log("Valores Input: ");
                        console.log(valoresInput);
                        console.log("[i]: ");
                        console.log(i);
                        //console.log("tablasADetallarFinal[i]: ");
                        //console.log(tablasADetallarFinal[i]);


                        console.log("Columnas Array: ");
                        console.log(columnas);

                        //console.log("ValoresInput: ");
                        //console.log(valoresInput);

                        $('div[id='+tablasADetallarFinal[i]['tabla']+'] #mensaje-'+tablasADetallarFinal[i]['tabla']).html('');
                        for (var j = 0; j < columnas.length; j++) {
                            $('#modal-form form[id=form-' + tablasADetallarFinal[i]['tabla'] + ']').find("input[id=" + columnas[j] + "]").val(valoresInput[columnas[j]]);
                            
                        }
                    } else {
                        $('div[id='+tablasADetallarFinal[i]['tabla']+'] #mensaje-'+tablasADetallarFinal[i]['tabla']).html('Sin datos asignados. Favor de asignarlos.');
                        for (var k = 0; k < columnas.length; k++) {
                            $('#modal-form form[id=form-' + tablasADetallarFinal[i]['tabla'] + ']').find("input[id=" + columnas[k] + "]").val('');
                            
                        }

                    }
                }
            );

        }

    }

</script>












<script>

    // FUNCIONES DE LA BASE DE DATOS

    // Obtener un JSON con los datos de una tabla por medio de un ID
    function obtenerDetalles(table, select, where, id, i, callback){

        $.ajax({
            type: "POST",
            url: 'obtenerDetalles.php',
            //async: false,
            data: 
                {
                    table: table,
                    select: select,
                    where: where,
                    id: id
                },
            dataType:"json",
            success: function(data) {
                var valoresInput = [];
                console.log("AJAX DATA:");
                //console.log(data);
                //console.log(data);
                //console.log(data['data']);
                console.log(data['data'][0]);
                //callback(data['data'][0]);

                //console.log("Aquí 'tamos");

                valoresInput = data['data'][0];

                callback(i, valoresInput);
                
                
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


                //======================================================================
                // I. INSERCIÓN DE BOTONES "EXPORTAR": PASOS 1-5
                //======================================================================

                //-----------------------------------------------------
                // (1/5) Creación De Botones DataTable.
                //-----------------------------------------------------
                
                /*
                 * Con ayuda de las funciones que ofrece DataTables, se crea
                 * un set de botones para poder exportar los datos de la tabla.
                 *
                 * Este set lo nombramos 'Exportar'.
                 */
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