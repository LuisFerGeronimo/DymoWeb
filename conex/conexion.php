<?php
	$conecta = new mysqli('localhost', 'root', '','id7523514_checkrush');

	if($conecta->connect_errno){
		echo "Fallo al conectar a Mysql: (".$conecta->connect_errno.")".$conecta->connect_errno;
	}

	$valorClave='P4sS/3n(ryPt';

?>