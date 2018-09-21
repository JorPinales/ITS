<?php

$db = new PDO('mysql:host=localhost;dbname=aeits','root','PASSWORD');

$jsondata = file_get_contents('data.json');
$data = json_decode($jsondata,true);

$stmt = $db->prepare("insert into alumnosAprobados values(?,?,?,?,?,?,?,?,?)");

foreach ($data as $row) {
	$stmt->bindParam(1,$row['id']);
	$stmt->bindParam(2,$row['matricula']);
	$stmt->bindParam(3,$row['nombre']);
	$stmt->bindParam(4,$row['apPaterno']);
	$stmt->bindParam(5,$row['apMaterno']);
	$stmt->bindParam(6,$row['email']);
	$stmt->bindParam(7,$row['especialidad']);
	$stmt->bindParam(8,$row['cursoNombre']);
	$stmt->bindParam(9,$row['estado']);

	$stmt->execute();
	
}

echo "Lista de Alumnos Aprobados actualizada exitosamente.";
?>