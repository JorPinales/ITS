<?php

$path = "data.json";

if (!file_exists($path))
    exit("File not found");

$data = file_get_contents($path);
$json = json_decode($data, true);

echo "<html>
<head> <script type='text/javascript' src='../js/funciones.js'></script></head>
<body>
<h2>Esta tabla fue generada con JSON</h2>
<table border=1>";
echo "<tr><th>ID</th><th>Matricula ID</th><th>Curso ID</th><th>Profesor ID</th>
<th>Ciclo</th><th>Año</th><th>Calificacion</th></tr>";
foreach ($json['calificaciones'] as $row) {
    echo "<tr>
    		<td>".$row['id']."</td>
    		<td>".$row['matriculaId']."</td>
    		<td>".$row['cursoId']."</td>
    		<td>".$row['profesorId']."</td>
    		<td>".$row['ciclo']."</td>
    		<td>".$row['anio']."</td>
    		<td>".$row['calif']."</td>
    	</tr>";
}
echo "</table>
<input type='button' id='imprimirJSON' value='Imprimir Tabla' onclick='imprimirTabla()'>
</body></html>";

?>
