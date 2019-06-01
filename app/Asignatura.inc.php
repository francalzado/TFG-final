<?php

class Asignatura {

    private $id_asignatura;
    private $nombre;
    private $curso;
    private $cuatrimestre;

    public function __construct($id_asignatura, $nombre, $curso, $cuatrimestre) {
        $this->id_asignatura = $id_asignatura;
        $this->nombre = $nombre;
        $this->curso = $curso;
        $this->cuatrimestre = $cuatrimestre;
    }

    public function obtenerId() {
        return $this->id_asignatura;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

        public function obtenerCurso() {
        return $this->curso;
    }
    
        public function obtenerCuatrimestre() {
        return $this->cuatrimestre;
    }
}

