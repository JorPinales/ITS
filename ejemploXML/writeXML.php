<?php

$path = "../ejemploXML/datos.xml";


//conexion a un manejador de base datos
//selecionar una base de datos
//ejecutrar query

$writer = new XMLWriter();
$writer->openURI($path);
$writer->startDocument('1.0');

//entidad libros
$writer->startElement('libros');

//iniciar ciclo para recorrer tabal de bd
//registro 1
$writer->startElement('libro');
$writer->writeAttribute('id', '1');
$writer->writeAttribute('titulo', 'Libro Uno');
$writer->writeAttribute('autor', 'Autor Uno');
$writer->writeAttribute('editorial', 'Editorial Uno');
$writer->endElement();

//registro 2
$writer->startElement('libro');
$writer->writeAttribute('id', '2');
$writer->writeAttribute('titulo', 'Libro Dos');
$writer->writeAttribute('autor', 'Autor Dos');
$writer->writeAttribute('editorial', 'Editorial Dos');
$writer->endElement();

//registro 3
$writer->startElement('libro');
$writer->writeAttribute('id', '3');
$writer->writeAttribute('titulo', 'Libro Tres');
$writer->writeAttribute('autor', 'Autor Tres');
$writer->writeAttribute('editorial', 'Editorial Tres');
$writer->endElement();

//registro 4
$writer->startElement('libro');
$writer->writeAttribute('id', '4');
$writer->writeAttribute('titulo', 'Libro Cuatro');
$writer->writeAttribute('autor', 'Autor Cuatro');
$writer->writeAttribute('editorial', 'Editorial Cuatro');
$writer->endElement();

//registro 5
$writer->startElement('libro');
$writer->writeAttribute('id', '5');
$writer->writeAttribute('titulo', 'Libro Cinco');
$writer->writeAttribute('autor', 'Autor Cinco');
$writer->writeAttribute('editorial', 'Editorial Cinco');
$writer->endElement();

//registro 6
$writer->startElement('libro');
$writer->writeAttribute('id', '6');
$writer->writeAttribute('titulo', 'Libro Seis');
$writer->writeAttribute('autor', 'Autor Seis');
$writer->writeAttribute('editorial', 'Editorial Seis');
$writer->endElement();

//cierra la entidad
$writer->endElement();

//cierra el archivo de datos
$writer->endDocument();

//vacia buffer
$writer->flush();

echo "Ha sido creado archivo datos.xml";
?>