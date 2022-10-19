<?php
include_once '/opt/lampp/htdocs/act1/poo1_autor.php';
include_once '/opt/lampp/htdocs/act1/poo1_ejemplar.php';
include_once '/opt/lampp/htdocs/act1/poo1_especialidad.php';
include_once '/opt/lampp/htdocs/act1/poo1_libro.php';

$libro1 = new Libro("abc", "deutsch", "def", 1234, true, "ciencia");
$autor1 = new Autor("ABC", "DEF", "española");
$libro1->add_autor($autor1);

$ejemplar1 = new Ejemplar("deutsch", 234, 15.99, $libro1);
$libro1->add_ejemplar($ejemplar1);
$especialidad = new Especialidad("cocina");

var_dump($libro1);
var_dump($autor1);
var_dump($ejemplar1);
?>