<?php include('../includes/db.php');?>
<?php //header('Content-Type: text/html; charset=utf-8');?>
<?php 
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// Obtención de variables POST.
		$nombres = $_POST['nombres'];
		$apellidoP = $_POST['apellidoP'];
		$apellidoM = $_POST['apellidoM'];
		$telefonoCuenta = $_POST['telefono-cuenta'];
		$correoCuenta = $_POST['correo-cuenta'];
		$contrasena = $_POST['contrasena'];
		$empresa = $_POST['empresa'];
		$telefonoEmpresa = $_POST['telefono-empresa'];
		$zonaID = 1;



		$clienteID = 5;
		$empresaID = 5;




		// Query
		$query = "INSERT INTO Empresa(id, nombre, telefono, zonaID) VALUES(?, ?, ?, ?)";


		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("issi", $empresaID, $empresa, $telefonoEmpresa, $zonaID);
		$stmt->execute();

		$stmt->close();


		$query = "INSERT INTO Cliente VALUES(?, ?, ?, ?, ?, ?, ?, ?)";


		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("issssssi", $clienteID, $nombres, $apellidoP, $apellidoM, $telefonoEmpresa, $correoCuenta, $contrasena, $empresaID);
		$stmt->execute();

		$stmt->close();

		echo "1";

	}
?>