<?php
/* Sublime Text 3  Tab-Size: 4 */

/**
 * Filtro de la lista de productos de la tienda
 *
 * Se filtra la lista de productos dependiendo de lo que el usuario seleccione
 * en el menú izquierdo de filtrado.
 *
 * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
 * @author Jesús Emmanuel Zetina Chevez <zcjo151173@uepmor.edu.mx>
 */

/*
 * Se requiere de la conexión a la base de datos.
 */
require '../includes/db.php';

/*
 * Se requiere de la clase 'QueryGenerico' para hacer consultas a la BD para
 * filtrar los productos.
 */
require '../includes/model/queryGenerico.php';

if($_SERVER['METHOD']=='POST'){
	if( isset($_POST['checkox']) &&
		isset($_POST['vista'])){

		$checkbox = $_POST['checkbox'];
		$vista = $_POST['checkbox'];

		$queryGenerico = new QueryGenerico();

		$queryGenerico->setTable($vista);

		$queryGenerico->setSelect('*');

		$queryGenerico->setWhere('');

		$GLOBALS['results']['result'] = $queryGenerico->read();
		$GLOBALS['results']['productos'] = array();

		for ($i=0; $i < $GLOBALS['results']['result']; $i++) { 
			
		
			$GLOBALS['results']['productos'][] =  
			'<!-- Producto' .$i+1. '-->
            <div class="row m-0 py-2">

                <!-- Imagen Producto -->
                <div class="col-3">
                    <img src="../assets/img/products/img-placeholder.png" class="w-100" alt="">
                </div>

                <!-- Descripción Producto -->
                <div class="col-9 descripcion-producto">

                    <!-- Título Producto -->
                    <div class="row">
                        <div class="col text-primary titulo-producto">'
                            $GLOBALS['results']['titulo'];
                        '</div>
                    </div>

                    <!-- Datos Producto -->
                    <div class="row">
                        <div class="col datos-producto">
                            <ul class="list-group border-0">
                                <li class="list-group-item border-0"><span id="producto-material">Cera </span><span class="badge badge-primary">Material</span></li>
                                <li class="list-group-item border-0"><span id="producto-máquina">Datacard </span><span class="badge badge-danger">Máquina</span></li>
                                <li class="list-group-item border-0"><span id="producto-medida">38x360 </span><span class="badge badge-success">Medida</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>';
        }

	}
}


?>