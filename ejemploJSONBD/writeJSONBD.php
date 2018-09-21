<?php
session_start();
include '../kardex/bd/conexion.php';

$_SESSION['strQry'] = $strQry;
$strQry = "SELECT * FROM calificaciones ORDER BY matriculaId";

$tablaBD = mysqli_query($link, $strQry);

$path = "data.json";
$file = fopen($path, "w");

$calificaciones2 = array();
while ($registro = mysqli_fetch_array($tablaBD)) {
    $row_array['id']      = $registro['id'];
    $row_array['matriculaId']   = $registro['matriculaId'];
    $row_array['cursoId']  = $registro['cursoId'];
    $row_array['profesorId']  = $registro['profesorId'];
    $row_array['ciclo']  = $registro['ciclo'];
    $row_array['anio']  = $registro['anio'];
    $row_array['calif']  = $registro['calif'];
	
	array_push($calificaciones2, $row_array); 
                                         
}

$calificaciones = array("calificaciones"=> $calificaciones2);

$json = json_encode($calificaciones);
fwrite($file, $json);
fclose($file);
echo "Se ha escrito archivo data.json con éxito"
?>