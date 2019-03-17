<?php

class Tema {

    private $id_asignatura;
    private $id_tema;
    private $titulo;
    public function __construct($id_tema,$id_asignatura,$titulo) {
        $this->id_asignatura = $id_asignatura;
        $this->id_tema = $id_tema;
        $this->titulo = $titulo;
    }

    public function obtenerId() {
        return $this->id_tema;
    }
    
    public function obtenerIdAsignatura() {
        return $this->id_asignatura;
    }

    public function obtenerTitulo() {
        return $this->titulo;
    }

}

