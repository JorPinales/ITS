<?php

$path = "data.json";
$file = fopen($path, "w");

$vehiculos = array("vehiculos"=>
[
	array("marca"=>"Tesla", "modelo"=>"Model 3","color"=>"rojo"),
    array("marca"=>"chevrolet","modelo"=>"suburban","color"=>"blanco"),
    array("marca"=>"chevrolet","modelo"=>"malibu","color"=>"blanco"),
    array("marca"=>"ford","modelo"=>"mustang","color"=>"blanco"),
    array("marca"=>"ford","modelo"=>"fiesta","color"=>"blanco"),
    array("marca"=>"chrysler","modelo"=>"ram","color"=>"blanco"),
    array("marca"=>"chrysler","modelo"=>"300","color"=>"blanco")
    ]
);

$json = json_encode($vehiculos);
fwrite($file, $json);
fclose($file);
echo "Se ha escrito archivo data.json con éxito"
?>