<?php

class QueryGenerico{

	public $draw = null;

	public $columns = null;
	public $searchValue = null;
	public $order = null;
	public $startValue = null;
	public $lengthValue = null;
	public $length = null;


	public $table = null;
	public $select = null;
	public $where = null;
	public $fields = null;
	public $values = null;

	public $params = null;
	public $paramsType = null;
	public $paramsValues = null;

	public $db;


	public function __construct() {

		$this->db = new Database();

	}

	public function fetchData(){
		// Obtención del objecto de la conexión mysqli
		$mysqli = $this->db->getDB();


		$query = "SELECT * FROM " . $this->table;

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/****************************************************** 1/3 *********************************************************/

		if($this->where != null){ 
			$query .= ' WHERE ' . $this->where; 
		}

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/****************************************************** 2/3 *********************************************************/

		
		if($this->order != null){
			$query .= ' ORDER BY ' . $this->order;
		} else {
			$query .= ' ORDER BY id ASC ';
		}

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/****************************************************** 3/3 *********************************************************/

		$query1 = '';

		if($this->length != null){
		 	$query1 = ' LIMIT ' . $this->length;
		}

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/********************************************************************************************************************/



		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}
/*
		echo "Query: " . $query;
		echo "<br><br>";

		var_dump($this->paramsType);
		echo "<br><br>";
		var_dump($this->paramsValues);
		echo "<br><br>";
 */

		$this->paramsBuilder();

		/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
		if(count($this->params) > 0){
			call_user_func_array(array($stmt, 'bind_param'), $this->params);
		}
		 
		/* Execute statement */
		$stmt->execute();
		

		$number_filter_row = null;


    	if($query1 != ''){

    		$stmt->store_result();

			/* Número de filas filtradas */
	    	$number_filter_row =  $stmt->num_rows;

		
			array_push($this->paramsType, 'i');
			array_push($this->paramsValues, $this->startValue);
			
			array_push($this->paramsType, 'i');
			array_push($this->paramsValues, $this->lengthValue);


			// Preparación del statement.
			$stmt = $mysqli->prepare($query.$query1);

			if($stmt === false) {
			  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
			}
/*
			echo "Query: " . $query.$query1;
			echo "<br><br>";

			var_dump($this->paramsType);
			echo "<br><br>";
			var_dump($this->paramsValues);
			echo "<br><br>";
*/	 

			$this->paramsBuilder();

			/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
			if(count($this->params) > 0){
				call_user_func_array(array($stmt, 'bind_param'), $this->params);
			}
			 
			/* Execute statement */
			$stmt->execute();

		}






		// Obtención de los resultados.
		$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

		$data = array();

		for ($i=0; $i < count($resArr); $i++) { 
		 	$sub_array = array();
		 	$sub_array[] = '<div  class="update" data-id="'.$resArr[$i]["id"].'" data-column="nombre">' . $resArr[$i]["nombre"] . '</div>';
		 	$sub_array[] = '<div  class="update" data-id="'.$resArr[$i]["id"].'" data-column="apellidoP">' . $resArr[$i]["apellidoP"] . '</div>';
		 	$sub_array[] = '<div  class="update" data-id="'.$resArr[$i]["id"].'" data-column="apellidoM">' . $resArr[$i]["apellidoM"] . '</div>';
		 	$sub_array[] = '<div  class="update" data-id="'.$resArr[$i]["id"].'" data-column="telefono">' . $resArr[$i]["telefono"] . '</div>';
		 	$sub_array[] = '<div  class="update" data-id="'.$resArr[$i]["id"].'" data-column="correo">' . $resArr[$i]["correo"] . '</div>';
		 	$sub_array[] = '<button type="button" name="edit" class="btn btn-light btn-xs edit p-1" id="'.$resArr[$i]["id"].'"><i class="far fa-edit fa-md "></i></button><button type="button" name="delete" class="btn btn-danger btn-xs delete px-2 py-1 ml-2" id="'.$resArr[$i]["id"].'"><i class="far fa-trash-alt fa-md p-0"></i></button>';
		 	$data[] = $sub_array;

		}

		$recordsTotal = $this->getAllData();

		if($number_filter_row===null){
			$number_filter_row = $recordsTotal;
		}

		$output = array(
		 	"draw"    => intval($this->draw),
		 	"recordsTotal"  =>  $recordsTotal,
		 	"recordsFiltered" => $number_filter_row,
		 	"data"    => $data
		);


		$stmt->close();
		$mysqli->close();

		echo json_encode($output);



	}

	public function getAllData(){
		// Obtención del objecto de la conexión mysqli
		$mysqli = $this->db->getDB();

		$query = "SELECT * FROM " . $this->table;


		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}
 
		/* Execute statement */
		$stmt->execute();

		$stmt->store_result();

		// Obtención de los resultados.
		return $stmt->num_rows;
	}



	public function read(){


		// Query
		$query = "SELECT " . $this->select . " FROM " . $this->table;

		if($this->where != null){
			$query .= " WHERE " . $this->where;
		}


		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}
 

		$this->paramsBuilder();

		/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
		if(count($this->params) > 0){
			call_user_func_array(array($stmt, 'bind_param'), $this->params);
		}
		 
		/* Execute statement */
		$stmt->execute();

		// Obtención de los resultados.
		$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

/*
		if(!$resArr){
			$resArr['match'] = "false";
		} else {
			$resArr['match'] = "true";
			$resArr['rows'] = sizeof($resArr)-1;
		}
*/

		$stmt->close();
		$mysqli->close();
		return $resArr;
	}

	public function create(){

		// Obtención del objecto de la conexión mysqli
		$mysqli = $this->db->getDB();

		// Query
		$query = "INSERT INTO " . $this->table;

		if($this->fields != null){
			$query .= "(".$this->fields.")";
		}

		$query .= " VALUES(".$this->values.")";


		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}
 
		$this->paramsBuilder();

		/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
		call_user_func_array(array($stmt, 'bind_param'), $this->params);
		 

		/* Execute statement */
		$resArr['result'] = $stmt->execute();


		$stmt->close();
		$mysqli->close();
		return $resArr;
	}


	public function delete(){

		if($this->where != null){

			// Obtención del objecto de la conexión mysqli
			$mysqli = $this->db->getDB();

			// Query
			$query = "DELETE FROM " . $this->table . " WHERE " . $this->where;


			// Preparación del statement.
			$stmt = $mysqli->prepare($query);

			if($stmt === false) {
			  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
			}
	 
			$this->paramsBuilder();

			/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
			call_user_func_array(array($stmt, 'bind_param'), $this->params);
			 

			/* Execute statement */
			$resArr['result'] = $stmt->execute();


			$stmt->close();
			$mysqli->close();
			return $resArr;
		} else {
			return false;
		}
	}


	public function setTable($table){
		$this->table = $table;
	}

	public function setColumns($columns){
		$this->columns = $columns;
	}

	public function setSelect($select){
		$this->select = $select;
	}

	public function setWhere($where){
		$this->where = $where;
	}

	public function setOrder($order){
		$this->order = $order;
	}

	public function setLength($length){
		$this->length = $length;
	}

	public function setStartValue($startValue){
		$this->startValue = $startValue;
	}

	public function setLengthValue($lengthValue){
		$this->lengthValue = $lengthValue;
	}

	public function setFields($fields){
		$this->fields = $fields;
	}

	public function setValues($values){
		$this->values = $values;
	}

	public function setDraw($draw){
		$this->draw = $draw;
	}

	public function setParamsType($paramsType){
		$this->paramsType = $paramsType;
	}

	public function setParamsValues($paramsValues){
		$this->paramsValues = $paramsValues;
	}

	public function getParamsType(){
		return $this->paramsType;
	}

	public function getParamsValues(){
		return $this->paramsValues;
	}

	public function closeConnection(){
		$mysqli->close();
	}



	public function paramsBuilder(){
		/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
		$this->params = array();
		 
		$param_type_string = '';

		$n = count($this->paramsType);
		for($i = 0; $i < $n; $i++) {
			$param_type_string .= $this->paramsType[$i];
		}
		 
		/* with call_user_func_array, array params must be passed by reference */
		if($n>0){/* AÑADIR A DONDE SE DEBA */
			$this->params[] = & $param_type_string;
		}/* AÑADIR A DONDE SE DEBA */
		 
		for($i = 0; $i < $n; $i++) {
			/* with call_user_func_array, array params must be passed by reference */
	  		$this->params[] = & $this->paramsValues[$i];
		}

	}


/*
	public function paramAndColumnsBuilder(){
		//for ($i=0; $i <8 ; $i++) { 
		var param = '';
		var columns = '';
		var columnsN = 0;
		var where = '';

		if($id != null){
			param += 'i';
			columns += 'id';
			columnsN++;
			where += 'id = ?';
		}
		if($nombres != null){
			param += 's';
			if(columnsN > 0){
				columns += ', ';
				where += ' AND ';
			}
			columns += 'nombres';
			columnsN++;
			where += 'nombres = ?';
		}
		if($apellidoP != null){
			param += 's';
			if(columnsN > 0){
				columns += ', ';
				where += ' AND ';
			}
			columns += 'apellidoP';
			columnsN++;
			where += 'apellidoP = ?';
		}
		if($apellidoM != null){
			param += 's';
			if(columnsN > 0){
				columns += ', ';
				where += ' AND ';
			}
			columns += 'apellidoM';
			columnsN++;
			where += 'apellidoM = ?';
		}
		if($telefono != null){
			param += 's';
			if(columnsN > 0){
				columns += ', ';
				where += ' AND ';
			}
			columns += 'telefono';
			columnsN++;
			where += 'telefono = ?';
		}
		if($correo != null){
			param += 's';
			if(columnsN > 0){
				columns += ', ';
				where += ' AND ';
			}
			columns += 'correo';
			columnsN++;
			where += 'correo = ?';
		}
		if($contrasena != null){
			param += 's';
			if(columnsN > 0){
				columns += ', ';
				where += ' AND ';
			}
			columns += 'contrasena';
			columnsN++;
			where += 'contrasena = ?';
		}
		if($empresaID != null){
			param += 'i';
			if(columnsN > 0){
				columns += ', ';
				where += ' AND ';
			}
			columns += 'empresaID';
			columnsN++;
			where += 'empresaID = ?';
		}
		

		return array('params' => $params, 'columns' => $columns);

	}
	*/

}

?>