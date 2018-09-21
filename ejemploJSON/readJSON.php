<?php

$path = "data.json";

if (!file_exists($path))
    exit("File not found");

$data = file_get_contents($path);
$json = json_decode($data, true);

echo "<html><body><table border=1>";
echo "<tr><th>Marca</th><th>Modelo</th><th>Color</th></tr>";
foreach ($json['vehiculos'] as $row) {
    echo "<tr><td>".$row['marca']."</td><td>".$row['modelo']."</td><td>".
         $row['color']."</td></tr>";
}
echo "</table></body></html>";

?>
