<?php

class log {

    private $id_usuario;
    private $sql;
    private $fecha;

    public function __construct($id_usuario, $sql,$fecha) {
        $this->id_usuario= $id_usuario;
        $this->sql = $sql;
        $this->fecha= $fecha;
    }

    public function obtenerId() {
        return $this->id_usuario;
    }

    public function obtenerSQL() {
        return $this->sql;
    }

    public function obtenerFecha() {
        return $this->fecha;
    }
    
    public static function nuevo_log($conexion,$consulta,$id_usuario) {
     $log_insertado = false;       
    
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO log(id_usuario,consulta,fecha) VALUES(:id_usuario, :consulta, :fecha) ";
                $id_usuariotemp= $id_usuario;
                $consultatemp = $consulta;
                $fechatemp =date('Y-m-d H:i:s');
;

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_usuario', $id_usuariotemp, PDO::PARAM_STR);
                $sentencia->bindParam(':consulta', $consultatemp, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha', $fechatemp, PDO::PARAM_STR);
                $log_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $log_insertado;

}

}
