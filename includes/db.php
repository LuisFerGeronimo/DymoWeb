<?php ob_start();

$db['db_host'] = "shareddb-i.hosting.stackcp.net";
$db['db_user'] = "android-sga";
$db['db_pass'] = "android-sga123";
$db['db_name'] = "android-sga-3335314e";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);



$query = "SET NAMES utf8";
mysqli_query($connection,$query);

//if($connection) {
//
//echo "We are connected";
//
//}








?>