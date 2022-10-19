<?php
//variables por referencia
$foo = 'Bob'; // Asigna el valor 'Bob' a $foo
$bar = &$foo; // Referenciar $foo vía $bar.

$bar = "Mi nombre es $bar<br>";  // Modifica $bar...
echo $bar."\n";
echo $foo;
echo "\nFin"; 

$vocales = array( 1 => "a", 3=> "e","i","o","u");
var_dump($vocales[5]);
?>