<?php
class Autor
{
    private $nombres;
    private $apellidos;
    private $nacionalidad;
    private $libros;

    function __construct($nombres, $apellidos, $nacionalidad)
    {
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->nacionalidad = $nacionalidad;
    }
    function set_nombres($nombres)
    {
        $this->nombres = $nombres;
    }

    function get_nombres()
    {
        return $this->nombres;
    }

    function set_apellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    function get_apellidos()
    {
        return $this->apellidos;
    }

    function set_nacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    }

    function get_nacionalidad()
    {
        return $this->nacionalidad;
    }
}
?>