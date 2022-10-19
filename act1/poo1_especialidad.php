<?php
// Almudena nos dijo el año pasado que los nombres
// de entidades (clases) nunca se ponían en plural.
// No sé si es correcto, pero seguiré la convención.
class Especialidad 
{
    private $especialidad;
    private $descripcion;
    private $libros;

    function __construct($esp)
    {
        $this->especialidad = $esp;
    }
    function add_book($libro)
    {
        array_push($this->libros, $libro);
    }

    function del_book($libro)
    {
        unset($this->libros[$libro]);
    }
}
?>