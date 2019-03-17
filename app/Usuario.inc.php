<?php

class Usuario {

    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;

    public function __construct($id_usuario, $nombre, $apellidos, $email, $password, $rol) {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function obtenerId() {
        return $this->id_usuario;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerApellidos() {
        return $this->apellidos;
    }

    public function obtenerEmail() {
        return $this->email;
    }

    public function obtenerPassword() {
        return $this->password;
    }

    public function obtenerRol() {
        return $this->rol;
    }

    public function cambiarPassword($password) {
        $this->password = $password;
    }

    public function cambiarActiva($activa) {
        $this->activa = $activa;
    }

}
