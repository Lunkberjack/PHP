<?php
class Usuario {
    public $id;
    public $nombre;
    public $apellidos;

    public function info() {
        return $this->id .':'. $this->nombre .' '. $this->apellidos;
    }
}
?>