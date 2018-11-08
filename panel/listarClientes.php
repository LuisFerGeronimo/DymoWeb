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

	// Cliente::Parámetros: ($id, $nombres, $apellidoP, $apellidoM, $telefono, $correo, $contrasena, $empresaID)
	$queryGenerico = new QueryGenerico();
	$queryGenerico->setTable('Cliente');
	$queryGenerico->setSelect('id, nombre, apellidoP, apellidoM, telefono, correo');
	$queryGenerico->setWhere(null);
	$queryGenerico->setParamsType(array());
	$queryGenerico->setParamsValues(array());
	$results = $queryGenerico->read();

	for ($i=0; $i < count($results); $i++) { 
		$results[$i]["acciones"] = null;
	}

	header('Content-Type: application/json');
	echo json_encode($results);

?>