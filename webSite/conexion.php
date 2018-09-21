<?php

$dbpass="PASSWORD";
#Discrimiacion de caracteres

#leer objetos html
$pass=$_POST['txtContrasena'];
$user=$_POST['txtUsuario'];


$host="localhost";
$dbuser="root";
$db="kardex";

session_start();

#conexion con la base de datos
$link=mysqli_connect($host,$dbuser,$dbpass,$db);
#marca error si no se puede conectar a la base de datos
if(mysqli_connect_error()){
	echo'<script>'.
	'alert("No se pudo conectar con la base de datos.");'.
	'</script>';
}
?>