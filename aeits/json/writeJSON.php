<?php
session_start();
include '../bd/conexion.php';

$_SESSION['strQry'] = $strQry;
$strQry = "SELECT * FROM alumnos WHERE (cursoNombre = 'Judo') AND (estado = 'Aprobado')";


$tablaBD = mysqli_query($link, $strQry);

$path = "data.json";
$file = fopen($path, "w");

$calificaciones2 = array();
while ($registro = mysqli_fetch_array($tablaBD)) {
    $row_array['id']      = $registro['id'];
    $row_array['matricula']   = $registro['matricula'];
    $row_array['nombre']  = $registro['nombre'];
    $row_array['apPaterno']  = $registro['apPaterno'];
    $row_array['apMaterno']  = $registro['apMaterno'];
    $row_array['email']  = $registro['email'];
    $row_array['especialidad']  = $registro['especialidad'];
    $row_array['cursoNombre']  = $registro['cursoNombre'];
    $row_array['estado']  = $registro['estado'];

	array_push($calificaciones2, $row_array);                                        
}

$json = json_encode($calificaciones2);
fwrite($file, $json);
fclose($file);
echo "El listado de alumnos aprobados a sido enviado."
?>