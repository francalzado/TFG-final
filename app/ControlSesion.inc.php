<?php

class ControlSesion {

    public static function iniciar_sesion($id_usuario, $email, $nombre, $rol,$contador) {
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['email'] = $email;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['rol'] = $rol;
        $_SESSION['contador'] = $contador;
        $_SESSION['id_tema']="";
        $_SESSION['puntuacion']= 0;
        $_SESSION['score']= 0;
    }

    public static function cerrar_sesion() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['id_usuario'])) {
            unset($_SESSION['id_usuario']);
        }
        if (isset($_SESSION['email'])) {
            unset($_SESSION['email']);
        }
        if (isset($_SESSION['rol'])) {
            unset($_SESSION['rol']);
        }
        if (isset($_SESSION['nombre'])) {
            unset($_SESSION['nombre']);
        }

        session_destroy();
    }

    public static function getRol() {
        return $_SESSION['rol'];
    }
    
    public static function setContador(){
       $_SESSION['contador'] = $_SESSION['contador']+1;

        return $_SESSION['contador'];
    }
    
    public static function setPuntuacion($totalPuntuacion){
       $_SESSION['puntuacion'] = $_SESSION['puntuacion'] + $totalPuntuacion;

        return $_SESSION['contador'];
    }    

    public static function getNombre() {
        return $_SESSION['nombre'];
    }

    public static function sesion_iniciada() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['id_usuario'])) {
            return true;
        } else {
            return false;
        }
    }

}
