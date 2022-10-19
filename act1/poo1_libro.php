<?php
class Libro
{
    private $titulo;
    private $idioma;
    private $resumen;
    private $isbn;
    private $es_novedad;
    private $autores;
    private $especialidad;
    private $ejemplares;

    function __construct($titulo, $idioma, $resumen, $isbn, $es_novedad, $especialidad)
    {
        $this->titulo = $titulo;
        $this->idioma = $idioma;
        $this->resumen = $resumen;
        $this->isbn = $isbn;
        $this->es_novedad = $es_novedad;
        $this->especialidad = $especialidad;

        $especialidad = new Especialidad($especialidad);
        $especialidad->add_book($this);
    }

    function add_ejemplar($ejemplar)
    {
        array_push($this->ejemplares[$ejemplar]);
    }

    function add_autor($autor)
    {
        array_push($this->autores[$autor]);
    }
}
?>