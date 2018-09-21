<?php

session_start();
include '../kardex/bd/conexion.php';
$path = "datos.xml";

$_SESSION['strQry'] = $strQry;
$strQry = "SELECT * FROM calificaciones ORDER BY matriculaId";

$tablaBD = mysqli_query($link, $strQry);


//conexion a un manejador de base datos
//selecionar una base de datos
//ejecutrar query

$writer = new XMLWriter();
$writer->openURI($path);
$writer->startDocument('1.0');

//entidad libros
$writer->startElement('calificaciones');

//iniciar ciclo para recorrer tabal de bd
while ($registro = mysqli_fetch_array($tablaBD)) { 
	$id      = $registro['id'];
    $matriculaId   = $registro['matriculaId'];
    $cursoId  = $registro['cursoId']; 
    $profesorId  = $registro['profesorId']; 
    $ciclo  = $registro['ciclo']; 
    $anio  = $registro['anio'];  
    $calif  = $registro['calif'];

	$writer->startElement('calificaciones');
	$writer->writeAttribute('id', "$id");
	$writer->writeAttribute('matriculaId', "$matriculaId");
	$writer->writeAttribute('cursoId', "$cursoId");
	$writer->writeAttribute('profesorId', "$profesorId");
	$writer->writeAttribute('ciclo', "$ciclo");
	$writer->writeAttribute('anio', "$anio");
	$writer->writeAttribute('calif', "$calif");
	$writer->endElement();
                                         
}

//cierra la entidad
$writer->endElement();

//cierra el archivo de datos
$writer->endDocument();

//vacia buffer
$writer->flush();

echo "Ha sido creado archivo datos.xml";
?>