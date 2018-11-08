<?php include_once '../includes/db.php';?>
<?php include_once  '../includes/model/queryGenerico.php';?>
<?php //header('Content-Type: text/html; charset=utf-8');?>
<?php 

	$results = array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Datos de cuenta personal
		if( isset($_POST['nombres']) && 
			isset($_POST['apellidoP']) &&
			//isset($_POST['apellidoM']) &&
			isset($_POST['telefono-cuenta']) &&
			isset($_POST['correo-cuenta']) &&

			// Datos de empresa
			isset($_POST['empresa']) &&
			isset($_POST['telefono-empresa']) &&
			isset($_POST['correo-empresa']) &&

			// Datos de direccion
			isset($_POST['estado']) &&
			isset($_POST['municipio']) &&
			isset($_POST['codigo-postal']) &&
			isset($_POST['colonia']) &&
			isset($_POST['calle']) &&
			isset($_POST['numero-ext']) &&
			//isset($_POST['numero-int']) &&

			// Datos de seguridad
			isset($_POST['contrasena']) &&
			isset($_POST['contrasena-repetida'])
		){

			// OBTENCIÓN DE VARIABLES POST.
			// Datos de cuenta personal
			$nombres = 			$_POST['nombres'];
			$apellidoP = 		$_POST['apellidoP'];
			$apellidoM = 		$_POST['apellidoM'];
			$telefonoCuenta = 	$_POST['telefono-cuenta'];
			$correoCuenta = 	$_POST['correo-cuenta'];

			// Datos de empresa
			$empresa = 			$_POST['empresa'];
			$telefonoEmpresa = 	$_POST['telefono-empresa'];
			$correoEmpresa = 	$_POST['correo-empresa'];

			// Datos de direccion
			$estado = 			$_POST['estado'];
			$municipio = 		$_POST['municipio'];
			$codigoPostal = 	$_POST['codigo-postal'];
			$colonia = 			$_POST['colonia'];
			$calle = 			$_POST['calle'];
			$numeroExt = 		$_POST['numero-ext'];
			$numeroInt = 		$_POST['numero-int'];

			// Datos de seguridad
			$contrasena = 		$_POST['contrasena'];


		

			// Creación de empresa
			$queryGenerico = new QueryGenerico();
			$queryGenerico->setTable('Empresa');
			$queryGenerico->setFields('nombre, telefono, correo');
			$queryGenerico->setValues('?, ?, ?');
			$queryGenerico->setParamsType(array('s', 's', 's'));
			$queryGenerico->setParamsValues(array($empresa, $telefonoEmpresa, $correoEmpresa));
			$resultsCreateEmpresa = $queryGenerico->create();


			if($resultsCreateEmpresa["result"]){

				//Selección de la empresa creada.
				$queryGenerico->setSelect('id, nombre');
				$queryGenerico->setWhere('nombre = ?');
				$queryGenerico->setParamsType(array('s'));
				$queryGenerico->setParamsValues(array($empresa));
				$resultsReadEmpresa = $queryGenerico->read();


				$empresaID = $resultsReadEmpresa[0]['id'];

				// Creación de la cuenta del cliente
				$queryGenerico = new QueryGenerico();
				$queryGenerico->setTable('Cliente');
				$queryGenerico->setFields('nombre, apellidoP, apellidoM, telefono, correo, contrasena, empresaID');
				$queryGenerico->setValues('?, ?, ?, ?, ?, ?, ?');
				$queryGenerico->setParamsType(array('s', 's', 's', 's', 's', 's', 'i'));
				$queryGenerico->setParamsValues(array($nombres, $apellidoP, $apellidoM, $telefonoCuenta, $correoCuenta, $contrasena, $empresaID));
				$resultsCreateCliente = $queryGenerico->create();

				if($resultsCreateCliente["result"]){
					$results['result'] = true;

				} else {
					$results['result'] = false;
					$results['reason'] = 2;
				}



			}else {
				$results['result'] = false;
				$results['reason'] = 1;
			}

		} else {

			$results['result'] = false;
			$results['reason'] = 0;
		}


	} else {
		$results['result'] = false;
		$results['reason'] = -1;
	}

	http_response_code(200);
	header('Content-Type: application/json');
	echo json_encode($results);
?>