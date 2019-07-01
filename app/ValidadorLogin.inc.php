<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorLogin {

    private $usuario;
    private $error;

    public function __construct($email, $password, $conexion) {
        $this->error = "";

        if (!$this->variable_iniciada($email) || !$this->variable_iniciada($password)) {
            $this->usuario = null;
            $this->error = "Debes introducir email y contraseña";
        } else {
            $this->usuario = RepositorioUsuario::obtener_usuario_por_email($conexion, $email);
            
            if (is_null($this->usuario)) {
                $this->error = "Los datos son incorrectos";
            }
            if((password_verify($password, $this->usuario->obtenerPassword()))==false){
                $this->error = "Los datos son incorrectos";
            }
        }
    }
    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }
    public function obtener_usuario() {
        return $this->usuario;
    }

    public function obtener_error() {
        return $this->error;
    }

    public function mostrar_error() {
        if ($this->error !== "") {
            echo "<br><div class ='alert alert-danger' role = 'alert'>";
            echo $this->error;
            echo "</div><br>";
        }
    }

}
