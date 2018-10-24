<?php include('../includes/db.php'); ?>

<?php
$array_master = array(
	"Usuario"
);

	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "POST <br>";
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];

		echo $correo." ".$contrasena;



		/* create a prepared statement */
		if($stmt = $connection->prepare("SELECT * FROM Cliente WHERE correo = ? AND contrasena = ?")){
			echo "IF <br>";

			/* bind parameters for markers */
		    $stmt->bind_param("ss", $correo, $contrasena);

		    /* execute query */
		    $stmt->execute();

		    /* bind result variables */
		    $stmt->bind_result($id, $nombre, $apellidoP, $apellidoM, $correo, $contrasena, $empresaID);

		    /* fetch value */
		    $stmt->fetch();


		    /* close statement */
		    $stmt->close();


		    $array_master['Usuario'] = array(
		    		"id" => $id, 
		    		"nombre" => $nombre, 
		    		"apellidoP" => $apellidoP,
		    		"apellidoM" => $apellidoM,
		    		"correo" => $correo,
		    		"empresaID" => $empresaID,
	    	);

		}




	}

	header('Content-Type: application/json');
	echo json_encode($array_master['Usuario']);
	$connection->close();
?>