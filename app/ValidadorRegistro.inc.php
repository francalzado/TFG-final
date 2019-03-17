<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistro {

    private $aviso_inicio;
    private $aviso_cierre;
    private $nombre;
    private $email;
    private $apellidos;
    private $password;
    private $error_nombre;
    private $error_email;
    private $error_password;
    private $error_confirm_password;

    public function __construct($nombre, $apellidos, $email, $password, $confirm_password, $conexion) {
        $this->aviso_inicio = "<br><div class ='alert alert-danger' role = 'alert'>";
        $this->aviso_cierre = "</div>";
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;


        $this->error_nombre = $this->validar_nombre($nombre);
        $this->error_email = $this->validar_email($email, $conexion);
        $this->error_password = $this->validar_password($password);
        $this->error_confirm_password = $this->validar_confirm_password($password, $confirm_password);

        if ($this->error_password === "" && $this->error_confirm_password === "")
            $this->password = $password;
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre($nombre) {
        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir tu nombre";
        } else {
            $this->nombre = $nombre;
        }
        if (strlen($nombre) < 1 || strlen($nombre) > 25)
            return "Debes introducir un nombre de entre 2 y 25 caracteres";

        return "";
    }

    private function validar_apellidos($apellidos) {

        $this->apellidos = $apellidos;

        if (strlen($apellidos) > 50)
            return "Debes introducir unos apellidos de hasta 50 caracteres";

        return "";
    }

    private function validar_email($email, $conexion) {
        if (!$this->variable_iniciada($email)) {
            return "Debes escribir tu email";
        } else {
            $this->email = $email;
        }
        if (strlen($email) < 10 || strlen($email) > 25)
            return "Debes introducir un email de entre 10 y 25 caracteres";

        if (RepositorioUsuario :: email_existe($conexion, $email)) {
            return "Este email ya está en uso. <a href = '#'>recuperar contraseña ";
        }

        return "";
    }

    private function validar_password($password) {
        if (!$this->variable_iniciada($password)) {
            return "Debes escribir tu password";
        }
        return "";
    }

    private function validar_confirm_password($password, $confirm_password) {
        if (!$this->variable_iniciada($password))
            return "Debes introducir una contraseña";

        if (!$this->variable_iniciada($confirm_password))
            return "Debes repetir tu password";

        if ($password != $confirm_password)
            return "Ambas contraseñas deben ser iguales";

        return "";
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_apellidos() {
        return $this->apellidos;
    }

    public function obtener_email() {
        return $this->email;
    }

    public function obtener_password() {
        return $this->password;
    }

    public function obtener_confirm_password() {
        return $this->confirm_password;
    }

    public function obtener_error_nombre() {
        return $this->error_nombre;
    }

    public function obtener_error_email() {
        return $this->error_email;
    }

    public function obtener_error_password() {
        return $this->error_password;
    }

    public function obtener_error_confirm_password() {
        return $this->error_confirm_password;
    }

    public function mostrar_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_error_nombre() {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }

    public function mostrar_email() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrar_error_email() {
        if ($this->error_email !== "") {
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }

    public function mostrar_error_password() {
        if ($this->error_password !== "") {
            echo $this->aviso_inicio . $this->error_password . $this->aviso_cierre;
        }
    }

    public function mostrar_error_confirm_password() {
        if ($this->error_confirm_password !== "") {
            echo $this->aviso_inicio . $this->error_confirm_password . $this->aviso_cierre;
        }
    }

    public function registro_valido() {
        if ($this->error_nombre === "" && $this->error_password === "" && $this->error_confirm_password === "" && $this->error_email === "") {
            return true;
        }
        return false;
    }

}
