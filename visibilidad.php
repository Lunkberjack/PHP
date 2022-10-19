<?php
/**
 * Public permite acceso desde cualquier lugar
 * Private solo permite acceso desde la misma clase
 * Protected solo permite acceso usando la herencia (herederas y
 * padre-madre)
 */
class Visibilidad
{
    private string $privada;
    public string $publica;
    protected string $protegida;
}

/**
 * Desde esta clase derivada se intentan modificar las variables
 * públicas y protegidas
 */
class HeredaVisibilidad extends Visibilidad
{
    protected string $nombre;
    public function __construct()
    {
        // parent:: (Acceso estático)
        // parent-> ()
        $this->publica = "Valor asignado desde la clase derivada";
        $this->protegida = "Valor asignado desde la clase derivada";
    }
}

// Se modifica el valor de una propiedad pública y de una propiedad
// protegida de la clase derivada.
$visibilidad = new Visibilidad();
$visibilidad->publica = "Valor asignado desde un objeto de la propia clase";
echo $visibilidad->publica;
$visibilidad->nombre = "Tu nombre te lo ha dado tu padre o madre";
echo $visibilidad->nombre."<br>";

// Acceder a una propiedad protegida de la clase base.
$heredaVisibilidad = new HeredaVisibilidad();
$heredaVisibilidad->protegida = "El valor te lo ha asignado tu hijo-hija";
echo $heredaVisibilidad->protegida."<br>";

// Acceder a una propiedad privada de la clase base.
$visibilidad->privada = "Intento de asignar valor a una propiedad privada";
?>