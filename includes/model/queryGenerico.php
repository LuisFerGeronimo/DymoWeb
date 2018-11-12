<?php

/* Sublime Text 3: Tab Size=4  */

/**
 * Clase genérica para hacer operaciones en la BD de datos
 *

 * 
 * PHP version 7.2.10
 *
 * @author Luis Fernando Gerónimo Carranza <luisfergeronimo@gmail.com>
 * @author Jesús Emmanuel Zetina Chevez <zcjo151173@upemor.edu.mx>
 */

/**
 * Ayuda a hacer el CRUD de la base de datos utilizando Prepared
 * Statements para evitar los ataques de inyecciones SQL.
 *
 * Es genérica ya que puede ser utilizada para todas las tablas
 * de la base de datos.
 */
class QueryGenerico{


	private $_order = null;
	private $_startValue = null;
	private $_lengthValue = null;
	private $_length = null;


	private $_table = null;
	private $_select = null;
	private $_where = null;
	private $_fields = null;
	private $_values = null;

	private $_params = null;
	private $_paramsType = null;
	private $_paramsValues = null;

	private $_db;


	public function __construct() {

		$this->_db = new Database();

	}

	public function fetchData(){
		// Obtención del objecto de la conexión mysqli
		$mysqli = $this->_db->getDB();


		$query = "SELECT * FROM " . $this->_table;

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/****************************************************** 1/3 *********************************************************/

		if($this->_where != null){ 
			$query .= ' WHERE ' . $this->_where; 
		}

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/****************************************************** 2/3 *********************************************************/

		
		if($this->_order != null){
			$query .= ' ORDER BY ' . $this->_order;
		} else {
			$query .= ' ORDER BY id ASC ';
		}

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/****************************************************** 3/3 *********************************************************/

		$query1 = '';

		if($this->_length != null){
		 	$query1 = ' LIMIT ' . $this->_length;
		}

		/********************************************************************************************************************/
		/********************************************************************************************************************/
		/********************************************************************************************************************/



		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}


		$this->paramsBuilder();

		/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
		if(count($this->_params) > 0){
			call_user_func_array(array($stmt, 'bind_param'), $this->_params);
		}
		 
		/* Execute statement */
		$stmt->execute();
		

		$number_filter_row = null;


    	if($query1 != ''){

    		$stmt->store_result();

			/* Número de filas filtradas */
	    	$number_filter_row =  $stmt->num_rows;
		
			array_push($this->_paramsType, 'i');
			array_push($this->_paramsValues, $this->_startValue);
			
			array_push($this->_paramsType, 'i');
			array_push($this->_paramsValues, $this->_lengthValue);


			// Preparación del statement.
			$stmt = $mysqli->prepare($query.$query1);

			if($stmt === false) {
			  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
			}
/*
			echo "Query: " . $query.$query1;
			echo "<br><br>";

			var_dump($this->_paramsType);
			echo "<br><br>";
			var_dump($this->_paramsValues);
			echo "<br><br>";
*/	 

			$this->paramsBuilder();

			/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
			if(count($this->_params) > 0){
				call_user_func_array(array($stmt, 'bind_param'), $this->_params);
			}
			 
			/* Execute statement */
			$stmt->execute();

		}






		// Obtención de los resultados.
		$resArr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);


		$stmt->close();
		$mysqli->close();

		return array('recordsFiltered' => $number_filter_row, 'records' => $resArr);

	}

	public function getAllData(){
		// Obtención del objecto de la conexión mysqli
		$mysqli = $this->_db->getDB();

		$query = "SELECT * FROM " . $this->_table;


		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}
 
		/* Execute statement */
		$stmt->execute();

		$stmt->store_result();

		$num_rows = $stmt->num_rows;

		$stmt->close();
		$mysqli->close();
		
		// Obtención de los resultados.
		return $num_rows;
	}



	public function read(){

		// Obtención del objecto de la conexión mysqli
		$mysqli = $this->_db->getDB();

		// Query
		$query = "SELECT " . $this->_select . " FROM " . $this->_table;

		if($this->_where != null){
			$query .= " WHERE " . $this->_where;
		}
/*
		echo "<br><br>";
		echo "Query: " . $query;

		echo "<br><br>";
*/
		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}
 

		$this->paramsBuilder();

		/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
		if(count($this->_params) > 0){
			call_user_func_array(array($stmt, 'bind_param'), $this->_params);
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
		$mysqli = $this->_db->getDB();

		// Query
		$query = "INSERT INTO " . $this->_table;

		if($this->_fields != null){
			$query .= "(".$this->_fields.")";
		}

		$query .= " VALUES(".$this->_values.")";


		// Preparación del statement.
		$stmt = $mysqli->prepare($query);

		if($stmt === false) {
		  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
		}
 
		$this->paramsBuilder();

		/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
		call_user_func_array(array($stmt, 'bind_param'), $this->_params);
		 

		/* Execute statement */
		$resArr['result'] = $stmt->execute();


		$stmt->close();
		$mysqli->close();
		return $resArr;
	}


	public function delete(){

		if($this->_where != null){

			// Obtención del objecto de la conexión mysqli
			$mysqli = $this->_db->getDB();

			// Query
			$query = "DELETE FROM " . $this->_table . " WHERE " . $this->_where;


			// Preparación del statement.
			$stmt = $mysqli->prepare($query);

			if($stmt === false) {
			  trigger_error('Wrong SQL: ' . $query . ' Error: ' . $mysqli->errno . ' ' . $mysqli->error, E_USER_ERROR);
			}
	 
			$this->paramsBuilder();

			/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
			call_user_func_array(array($stmt, 'bind_param'), $this->_params);
			 

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
		$this->_table = $table;
	}

	public function setSelect($select){
		$this->_select = $select;
	}

	public function setWhere($where){
		$this->_where = $where;
	}

	public function setOrder($order){
		$this->_order = $order;
	}

	public function setLength($length){
		$this->_length = $length;
	}

	public function setStartValue($startValue){
		$this->_startValue = $startValue;
	}

	public function setLengthValue($lengthValue){
		$this->_lengthValue = $lengthValue;
	}

	public function setFields($fields){
		$this->_fields = $fields;
	}

	public function setValues($values){
		$this->_values = $values;
	}

	public function setParamsType($paramsType){
		$this->_paramsType = $paramsType;
	}

	public function setParamsValues($paramsValues){
		$this->_paramsValues = $paramsValues;
	}

	public function getParamsType(){
		return $this->_paramsType;
	}

	public function getParamsValues(){
		return $this->_paramsValues;
	}

	public function getWhere(){
		return $this->_where;
	}



	public function paramsBuilder(){
		/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
		$this->_params = array();
		 
		$param_type_string = '';

		$n = count($this->_paramsType);
		for($i = 0; $i < $n; $i++) {
			$param_type_string .= $this->_paramsType[$i];
		}
		 
		/* with call_user_func_array, array params must be passed by reference */
		if($n>0){/* AÑADIR A DONDE SE DEBA */
			$this->_params[] = & $param_type_string;
		}/* AÑADIR A DONDE SE DEBA */
		 
		for($i = 0; $i < $n; $i++) {
			/* with call_user_func_array, array params must be passed by reference */
	  		$this->_params[] = & $this->_paramsValues[$i];
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