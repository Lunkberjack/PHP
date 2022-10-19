<?php
echo ("Ejemplos sobre ámbitos de variables\n");
echo ("------------------------------------\n");
$a = 1; // ámbito global

function test()
{
    $GLOBALS['a'] = 10;
    echo "Dentro de la función "; // Referencia a una variable ámbito local
    var_dump($GLOBALS['a']);
}
test();

function otro_test()
{
    global $a;
    $a = 20;
    echo "Dentro de la función ";
    var_dump($a);
}
otro_test();

echo "Fuera de la función $a";
?>
