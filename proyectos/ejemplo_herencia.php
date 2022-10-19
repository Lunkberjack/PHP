<?php
class Prueba
{
    static public function getNew()
    {
        return new static;
    }
}

class Hija extends Prueba
{}

$obj1 = new Prueba();
$obj2 = new $obj1;
// Se comprueba si las dos instancias son iguales.
var_dump($obj1 !== $obj2);

$obj3 = Prueba::getNew();
// Se comprueba si la instancia creada es de la 
// clase Prueba
var_dump($obj3 instanceof Prueba);

$obj4 = Hija::getNew();
// Se comprueba si la instancia creada es de la 
// clase Hija
var_dump($obj4 instanceof Hija);
?>
