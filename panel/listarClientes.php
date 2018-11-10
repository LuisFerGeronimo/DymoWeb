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
				return 'id';
			case 1:
				return 'empresa';
			case 2:
				return 'nombres';
			case 3:
				return 'correo';
		}
	}


	$paramsType = array();
	$paramsValues = array();

	$queryGenerico = new QueryGenerico();
	$queryGenerico->setTable("ListarClientesView");
	$queryGenerico->setColumns(array('zona', 'nombres', 'empresa', 'correo'));
	//$queryGenerico->setDraw(intval($_POST["draw"]));

	if(isset($_POST['search']['value'])) {
		$searchValue = $_POST['search']['value'];
		//echo "First: ".$searchValue;
		$searchValue = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$searchValue);
		//echo "Second: ".$searchValue;
		

		$queryGenerico->setWhere('empresa LIKE CONCAT("%",?,"%") OR nombres LIKE CONCAT("%",?,"%") OR correo LIKE CONCAT("%",?,"%")');
			
		$n = substr_count($queryGenerico->getWhere(), '?');

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

	$resArr = $queryGenerico->fetchData();

	$number_filter_row = $resArr['recordsFiltered'];
	$resArr = $resArr['resArr'];


	$data = array();

	for ($i=0; $i < count($resArr); $i++) { 
	 	$sub_array = array();
	 	// Columnas
		if($resArr[$i]["id"] === null){
			$resArr[$i]["id"] = 'Sin zona';
		}
	 	$sub_array[] = '<div  data-id="' . $resArr[$i]["id"]		. '" data-column="zona">'    . $resArr[$i]["id"] 	  .	'</div>';
	 	$sub_array[] = '<div  data-id="' . $resArr[$i]["empresaID"] . '" data-column="empresa">' . $resArr[$i]["empresa"] . '</div>';
	 	$sub_array[] = '<div  data-id="' . $resArr[$i]["clienteID"] . '" data-column="cliente">' . $resArr[$i]["nombres"] . '</div>';
	 	$sub_array[] = '<div  data-id="' . $resArr[$i]["clienteID"] . '" data-column="cliente">' . $resArr[$i]["correo"]  .	'</div>';
	 	// Botones
	 	$sub_array[] = '<button type="button" name="detalles" class="btn btn-info btn-xs detalles p-1" id="'.$resArr[$i]["clienteID"].'">Detalles</button>';

	 	$data[] = $sub_array;

	}

	$recordsTotal = $queryGenerico->getAllData();

	if($number_filter_row===null){
		$number_filter_row = $recordsTotal;
	}

	$output = array(
	 	"draw"    => intval($_POST["draw"]),
	 	"recordsTotal"  =>  $recordsTotal,
	 	"recordsFiltered" => $number_filter_row,
	 	"data"    => $data
	);

	echo json_encode($output);

?>