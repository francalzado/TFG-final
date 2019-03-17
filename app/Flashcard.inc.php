<?php

class Flashcard {

    private $id_fc;
    private $id_tema;
    private $pregunta;
    private $r1;
    private $r2;
    private $r3;
    private $r4;
    private $cuerpo;
    private $val;

    public function __construct($id_fc, $id_tema, $pregunta, $r1, $r2, $r3, $r4, $cuerpo, $val) {
        $this->id_fc = $id_fc;
        $this->id_tema = $id_tema;
        $this->pregunta = $pregunta;
        $this->r1 = $r1;
        $this->r2 = $r2;
        $this->r3 = $r3;
        $this->r4 = $r4;
        $this->cuerpo = $cuerpo;
        $this->val = $val;
    }

    public function obtenerId() {
        return $this->id_fc;
    }

    public function obtenerIdTema() {
        return $this->id_tema;
    }

    public function obtenerPregunta() {
        return $this->pregunta;
    }

    public function obtenerR1() {
        return $this->r1;
    }

    public function obtenerR2() {
        return $this->r2;
    }

    public function obtenerR3() {
        return $this->r3;
    }

    public function obtenerR4() {
        return $this->r4;
    }

    public function obtenerCuerpo() {
        return $this->cuerpo;
    }

    public function obtenerVal() {
        return $this->val;
    }

}
