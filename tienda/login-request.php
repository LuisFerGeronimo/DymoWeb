<?php include_once  '../includes/cliente.php';?>
<?php //header('Content-Type: text/html; charset=utf-8');?>
<?php 

/*
CREATE TABLE `Cliente` (
  `id`          INT                                  ,
  `nombre`      VARCHAR(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP`   VARCHAR(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM`   VARCHAR(30) COLLATE latin1_spanish_ci NOT NULL,
  `telefono`    VARCHAR(24) COLLATE latin1_spanish_ci NOT NULL,
  `correo`      VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena`  VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `empresaID`   INT                                   NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
*/

	$results;
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['correo']) && isset($_POST['contrasena'])){


			// Obtención de variables POST.
			$correo_input = $_POST['correo'];
			$contrasena_input = $_POST['contrasena'];


			// Cliente::Parámetros: ($id, $nombres, $apellidoP, $apellidoM, $telefono, $correo, $contrasena, $empresaID)
			$clienteBase = new Cliente();
			$clienteBase->setSelect('id, nombre, apellidoP, apellidoM, correo, contrasena');
			$clienteBase->setWhere('correo = ? AND contrasena = ?');
			$clienteBase->setParamsType(array('s', 's'));
			$clienteBase->setParamsValues(array($correo_input, $contrasena_input));
			$results = $clienteBase->read();


		} else {
			$results['match'] = 'false';
			$results['message'] = 'Favor de llenar todos los campos.';
		}


		header('Content-Type: application/json');
		echo json_encode($results);
	}
?>