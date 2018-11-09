<?php include_once '../includes/db.php';?>
<?php include_once  '../includes/model/queryGenerico.php';?>
<?php //header('Content-Type: text/html; charset=utf-8');?>
<?php 

/*
CREATE TABLE `Cliente` (
  `id`          INT                                  		  ,
  `nombre`      VARCHAR(45) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoP`   VARCHAR(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidoM`   VARCHAR(30) COLLATE latin1_spanish_ci NOT NULL,
  `telefono`    VARCHAR(24) COLLATE latin1_spanish_ci NOT NULL,
  `correo`      VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena`  VARCHAR(64) COLLATE latin1_spanish_ci NOT NULL,
  `empresaID`   INT                                   NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
*/

	function getColumnaNombre($columna){
		switch ($columna) {
			case 0:
				return 'nombre';
			case 1:
				return 'apellidoP';
			case 2:
				return 'apellidoM';
			case 3:
				return 'telefono';
			case 4:
				return 'correo';
		}
	}


	$paramsType = array();
	$paramsValues = array();

	$queryGenerico = new QueryGenerico();
	$queryGenerico->setTable("Cliente");
	$queryGenerico->setColumns(array('nombre', 'apellidoP', 'apellidoM', 'telefono', 'correo'));
	$queryGenerico->setDraw(intval($_POST["draw"]));

	if(isset($_POST['search']['value'])) {
		$searchValue = $_POST['search']['value'];
		//echo "First: ".$searchValue;
		$searchValue = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$searchValue);
		//echo "Second: ".$searchValue;
		

		$queryGenerico->setWhere('nombre LIKE CONCAT("%",?,"%") OR apellidoP LIKE CONCAT("%",?,"%") OR apellidoM LIKE CONCAT("%",?,"%") OR correo LIKE CONCAT("%",?,"%")');

		$n = 4;
		for ($i=0; $i < $n; $i++) { 
			array_push($paramsType, 's');
			array_push($paramsValues, $searchValue);
		}
	}

	if(isset($_POST['order'])){
		$order = $_POST['order'];

		$order['0']['column'] = getColumnaNombre($order['0']['column']);


		$queryGenerico->setOrder($order['0']['column'].' '.$order['0']['dir']);

		//array_push($paramsType, 's');
		///array_push($paramsValues, $order['0']['column']);

		//array_push($paramsType, 's');
		//array_push($paramsValues, $order['0']['dir']);
	}

	if($_POST['length'] != -1){
	 	$start = $_POST['start'];
	 	$length = $_POST['length'];

	 	
	 	$queryGenerico->setLength('?, ?');
		
	 	$queryGenerico->setStartValue($start);
	 	$queryGenerico->setLengthValue($length);
	}

	$queryGenerico->setParamsType($paramsType);
	$queryGenerico->setParamsValues($paramsValues);

	//var_dump($queryGenerico->getParamsValues());
	//var_dump($queryGenerico->getParamsType());

	$queryGenerico->fetchData();

	
/*
	$draw = (int)$_POST['draw'];

	$draw++;

	// Cliente::Parámetros: ($id, $nombres, $apellidoP, $apellidoM, $telefono, $correo, $contrasena, $empresaID)
	$queryGenerico = new QueryGenerico();
	$queryGenerico->setTable('Cliente');
	$queryGenerico->setSelect('id, nombre, apellidoP, apellidoM, telefono, correo');
	$queryGenerico->setWhere(null);
	$queryGenerico->setParamsType(array());
	$queryGenerico->setParamsValues(array());
	$resultsDB = $queryGenerico->read();

	$total = count($resultsDB);



	for ($i=0; $i < $total; $i++) { 
		$resultsDB[$i]['acciones'] = "<div class='form-row'><div class='col-sm-12 col-md-6 text-center'><a href='#' onclick='editarFila();' class='editar btn btn-light p-1' id=''><i class='far fa-edit fa-md'></i></a></div><div class='col-sm-12 col-md-6 text-center'><a href='#' onclick='eliminarFila();' class='eliminar btn btn-danger p-1 px-2' id=''><i class='far fa-trash-alt fa-md'></i></a></div></div>";
		$resultsDB[$i] = array('DT_RowId' => 'row_'.$resultsDB[$i]['id']) + $resultsDB[$i];
	}

	$results['data'] = $resultsDB;

	$results = array('recordsFiltered' => $total) + $results;
	$results = array('recordsTotal' => $total) + $results;
	$results = array('draw' => $draw) + $results;

	header('Content-Type: application/json');
	echo json_encode($results);
*/
?>