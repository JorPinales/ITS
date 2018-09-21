<?php 
require 'conexion.php';

$nombre = $_POST['nombre'];
$apPaterno = $_POST['apPaterno'];
$apMaterno = $_POST['apMaterno'];
$numero = $_POST['numero'];

$mysql_qry = "INSERT INTO agenda (nombre, apPaterno, apMaterno, numero) VALUES ('$nombre','$apPaterno','$apMaterno','$numero')";

if ($conn->query($mysql_qry)===TRUE) {
	echo "Anadido exitosamente";
}else{
	echo "Error: ".$mysql_qry."<br>".$conn->error;
}
$conn->close();
 ?>
