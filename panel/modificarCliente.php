<?php

/* Sublime Text 3: Tab Size=4  */

/**
 * Modificación del cliente en la base de datos
 * 
 * Archivo PHP para hacer modificaciones en la base de datos dentro
 * del modal después de dar click en el botón "Guardar cambios".
 * 
 * PHP version 7.2.10
 *
 * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
 * @author Jesús Emmanuel Zetina Chevez <zcjo151173@upemor.edu.mx>
 */

/**
 * Se requiere de la conexión a la base de datos para hacer las modificaciones
 * a los registros de los clientes.
 */
include_once '../includes/db.php';

/**
 * Se incluye una vez el archivo de la clase 'queryGenerico' donde están las
 * funciones utilizadas para acceder a la base de datos.
 */
include_once  '../includes/model/queryGenerico.php';

/**
 * Variable global para almacenar los resultados que se enviarán al front-end.
 * 
 * Posibles valores:
 * 	+ $GLOBALS['results']['result'] = TRUE  - si hubo una modificación exitosa
 * 						 			  FALSE - en caso contrario
 * 	+ $GLOBALS['results']['reason'] = INT-> -1: La solicitud no es POST
 * 											 0: No se llenaron todos los datos
 * 											 1: Error de odificación
 */
$GLOBALS['results'] = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		//======================================================================
		// VERIFICACIÓN DE VARIABLES POST
		//======================================================================

		//-----------------------------------------------------
		// Datos De Cuenta Personal (Cliente)
		//-----------------------------------------------------
	if( isset($_POST['id']) && 
	    isset($_POST['nombre']) && 
		isset($_POST['apellidoP']) &&
		isset($_POST['apellidoM']) &&
		isset($_POST['telefono']) &&
		isset($_POST['correo'])
	){

		//======================================================================
		// OBTENCIÓN DE VARIABLES POST
		//======================================================================
		
		//-----------------------------------------------------
		// Datos De Cuenta Personal (Cliente)
		//-----------------------------------------------------
		$id 			= $_POST['id'];
		$nombre			= $_POST['nombre'];
		$apellidoP 		= $_POST['apellidoP'];
		$apellidoM 		= $_POST['apellidoM'];
		$telefono 		= $_POST['telefono'];
		$correo 		= $_POST['correo'];

	
		//======================================================================
		// MODIFICACIÓN DE LOS DATOS DEL CLIENTE
		//======================================================================

		/**
		 * Variable 'QueryGenerico' para hacer las modificaciones en la BD.
		 * 
		 * @var QueryGenerico
		 */
		$queryGenerico = new QueryGenerico();

		// Especificación de la tabla con la que se trabajará.
		$queryGenerico->setTable('Cliente');

		// Especificación de columnas a las que se les asignará un valor.
		$queryGenerico->setSet('nombre = ?, apellidoP = ?, apellidoM = ?, telefono = ?, correo = ?');

		// Especificación de espacios de parámetros para el Prepared Statement.
		$queryGenerico->setWhere('id = ?');

		/*
		 * Especificación de los tipos de parámetros en forma de array.
		 *
		 * Tipos de datos:
		 *   - 'i' -> int
		 *   - 'd' -> double
		 *   - 's' -> string
		 *   - 'b' -> boolean
		 */
		$queryGenerico->setParamsType(array('s', 's', 's', 's', 's', 'i'));

		// Especificación de los parámetros en forma de array.
		$queryGenerico->setParamsValues(array($nombre, $apellidoP, $apellidoM, $telefono, $correo, $id));

		// Ejecución de la función 'update()'.
		$GLOBALS['results']['affectedRows'] = $queryGenerico->update();


		/*
		 * QueryGenerico->update almacena el número de filas actualizadas.
		 * Si es diferente a 1, fue una actualización NO exitosa.
		 */
		if($GLOBALS['results']['affectedRows'] != 1){

			$GLOBALS['results']['result'] = false;
			$GLOBALS['results']['reason'] = 1;
			

		}else {
			$GLOBALS['results']['result'] = true;
		}

	} else {

		$GLOBALS['results']['result'] = false;
		$GLOBALS['results']['reason'] = 0;
	}


} else {
	$GLOBALS['results']['result'] = false;
	$GLOBALS['results']['reason'] = -1;
}

//======================================================================
// RESPUESTA DEL SERVIDOR
//======================================================================

// Http response code = 200
http_response_code(200);
// El contenido que se enviará al front-end es de tipo json
header('Content-Type: application/json');
// 'Echo' de los resultados obtenidos
echo json_encode($GLOBALS['results']);
?>