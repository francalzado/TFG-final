<?php

class Recurso {

    private $id_recurso;
    private $id_tema;
    private $enlace;

    public function __construct($id_recurso, $id_tema, $enlace) {
        $this->id_recurso = $id_recurso;
        $this->id_tema = $id_tema;
        $this->enlace = $enlace;
    }

    public function obtenerId() {
        return $this->id_recurso;
    }

    public function obtenerIdTema() {
        return $this->id_tema;
    }

    public function obtenerEnlace() {
        return $this->enlace;
    }

}
