<?php include('../includes/db.php');?>
<?php //header('Content-Type: text/html; charset=utf-8');?>
<?php 

	$results;
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {


		// Obtención de variables POST.
		$correo_input = $_POST['correo'];
		$contrasena_input = $_POST['contrasena'];

		// Query
		$query = "SELECT id, nombre FROM Cliente WHERE correo = ? AND contrasena = ?";


		$stmt = $mysqli->prepare($query);

		$stmt->bind_param("ss", $correo_input, $contrasena_input);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows === 0){
			$stmt->close();
			// Query
			$query = "SELECT id, nombre FROM Administrador WHERE usuario = ? AND contrasena = ?";


			$stmt = $mysqli->prepare($query);

			$stmt->bind_param("ss", $correo_input, $contrasena_input);
			$stmt->execute();
			$stmt->store_result();

			if($stmt->num_rows === 0){
				$results['match'] = "false";
				header('Content-Type: application/json');
				echo json_encode($results);
				return;
				//exit('No rows');
			}


		}
		$stmt->bind_result($id, $nombre);
		$stmt->fetch();
		$stmt->close();


		$results['match'] = "true";
		$results['id'] = $id;
		$results['nombre'] = $nombre;

		if(strcasecmp($nombre, "Juan Carlos") == 0){
			$results['user'] = "admin";
		} else {
			$results['user'] = "cliente";
		}


		header('Content-Type: application/json');
		echo json_encode($results);


	}

	$mysqli->close();
?>