<?php
$path = "datos.xml";

if (!file_exists($path))
    exit("No se encuentra el archivo de datos");
$xml = XMLReader::open($path);
echo "<html>
<head>
    <script type='text/javascript' src='../js/funciones.js'></script>
</head>
    <body>
    <table border=1>";
echo "<h2>Esta tabla fue generada con XML</h2>
      <tr>
		<th>ID</th>
		<th>Matricula ID</th>
		<th>Curso ID</th>
		<th>Profesor ID</th>
		<th>Ciclo</th>
		<th>Año</th>
		<th>Calificacion</th>
	  </tr>";
while ($xml->read())
if ($xml->nodeType == XMLReader::ELEMENT && $xml->name == 'calificaciones') {
    $fields = array();
    $fields[0] = $xml->getAttribute('id');
    $fields[1] = $xml->getAttribute('matriculaId');
    $fields[2] = $xml->getAttribute('cursoId');
    $fields[3] = $xml->getAttribute('profesorId');
    $fields[4] = $xml->getAttribute('ciclo');
    $fields[5] = $xml->getAttribute('anio');
    $fields[6] = $xml->getAttribute('calif');
    echo "<tr>
    		<td>".$fields[0]."</td>
    		<td>".$fields[1]."</td>
    		<td>".$fields[2]."</td>
    		<td>".$fields[3]."</td>
    		<td>".$fields[4]."</td>
    		<td>".$fields[5]."</td>
    		<td>".$fields[6]."</td>
    	  </tr>";
}
echo "</table>
<input type='button' id='buttonJSON' value='Generar JSON' onclick='generarJSON()'>
<input type='button' id='verJSON' value='Ver JSON' onclick='verArchivo()'>
<input type='button' id='buttonVerJSON' value='Ver tabla JSON' onclick='verTablaJSON()'>
</body></html>";
$xml->close();

?>