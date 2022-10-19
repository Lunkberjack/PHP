<?php
class Ejemplar 
{
    private $idioma;
    private $numero_ejemplar;
    private $precio; 
    private $libro;

    function __construct($idioma, $num, $precio, $libro)
    {
        $this->idioma = $idioma;
        $this->numero_ejemplar = $num;
        $this->precio = $precio;
        $this->libro = $libro;
    }
}
?>