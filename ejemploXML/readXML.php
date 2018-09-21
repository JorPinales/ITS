<?php
$path = "../ejemploXML/datos.xml";

if (!file_exists($path))
    exit("No se encuentra el archivo de datos");
$xml = XMLReader::open($path);
echo "<html><body><table border=1>";
echo "<tr><th>Id</th><th>Titulo</th><th>Autor</th><th>Editorial</th></tr>";
while ($xml->read())
if ($xml->nodeType == XMLReader::ELEMENT && $xml->name == 'libro') {
    $fields = array();
    $fields[0] = $xml->getAttribute('id');
    $fields[1] = $xml->getAttribute('titulo');
    $fields[2] = $xml->getAttribute('autor');
    $fields[3] = $xml->getAttribute('editorial');
    echo "<tr><td>".$fields[0]."</td><td>".$fields[1]."</td><td>".
         $fields[2]."</td><td>".$fields[3]."</td></tr>";
}
echo "</table>
<input type='button' id='buttonJSON' value='Generar JSON'>
</body></html>";
$xml->close();

?>