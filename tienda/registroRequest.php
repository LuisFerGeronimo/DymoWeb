<?php include_once '../includes/db.php';?>
<?php include_once '../includes/cliente.php';?>
<?php include_once '../includes/empresa.php';?>
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
			$empresaBase = new Empresa();
			$empresaBase->setFields('nombre, telefono, correo');
			$empresaBase->setValues('?, ?, ?');
			$empresaBase->setParamsType(array('s', 's', 's'));
			$empresaBase->setParamsValues(array($empresa, $telefonoEmpresa, $correoEmpresa));
			$resultsCreateEmpresa = $empresaBase->create();


			if($resultsCreateEmpresa["result"]){

				//Selección de la empresa creada.
				$empresaBase->setSelect('id, nombre');
				$empresaBase->setWhere('nombre = ?');
				$empresaBase->setParamsType(array('s'));
				$empresaBase->setParamsValues(array($empresa));
				$resultsReadEmpresa = $empresaBase->read();


				$empresaID = $resultsReadEmpresa[0]['id'];

				// Creación de la cuenta del cliente
				$clienteBase = new Cliente();
				$clienteBase->setFields('nombre, apellidoP, apellidoM, telefono, correo, contrasena, empresaID');
				$clienteBase->setValues('?, ?, ?, ?, ?, ?, ?');
				$clienteBase->setParamsType(array('s', 's', 's', 's', 's', 's', 'i'));
				$clienteBase->setParamsValues(array($nombres, $apellidoP, $apellidoM, $telefonoCuenta, $correoCuenta, $contrasena, $empresaID));
				$resultsCreateCliente = $clienteBase->create();

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