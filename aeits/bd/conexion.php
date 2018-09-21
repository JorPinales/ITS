<?php

$host   =   "localhost";
$dbuser =   "root";
$dbpass =   "PASSWORD";
$db     =   "aeits";

$link	=	mysqli_connect($host,$dbuser,$dbpass,$db);

if(mysqli_connect_error()){
	echo "<script>alert('No hay conexion.');</script>";
}
mysqli_select_db($link, 'aeits') or die('No se puede abrir '.mysqli_connect_error());
?>