<?php


$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "dymo";


/* Convertir variables del array db[] a constantes */
/* db['db_host'] = "127.0.0.1"   ->   DB_HOST = "127.0.0.1" */
/* db['db_user'] = "localhost"   ->   DB_HOST = "localhost" */
/* db['db_pass'] = "" 		     ->   DB_HOST = "" */
/* db['db_name'] = "dymo"        ->   DB_HOST = "dymo" */
foreach($db as $key => $value){
	define(strtoupper($key), $value);
}


/* Crear el objeto de la conexión */
$mysqli = new mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME);


/* Checar la conexión */
if ($mysqli->connect_error) {

    die("Connection to database failed: #" . $mysqli->connect_errno . " - " . $mysqli->connect_error);
}

/* change character set to utf8 */
if (!$mysqli->set_charset("utf8")) {
  	printf("Error loading character set utf8: %s\n", $mysqli->error);
} else {
	//  printf("Current character set: %s\n", $mysqli->character_set_name());
}

/*
$query = "SET NAMES utf8";
mysqli_query($mysqli,$query);
*/


?>