<?php
class MyDestructableClass
{
    function __destruct()
    {
        echo "Dentro del destructor ";
    }

    public function __construct()
    {
        echo "Dentro del constructor ";
    }

    public function saluda(string $nombre)
    {
        echo "Hola " . $nombre;
    }
}
$myDestructablePony = new MyDestructableClass();
$myDestructablePony->saluda("Lunkberjack");
?>