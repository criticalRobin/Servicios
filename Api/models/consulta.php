<?php

include_once 'conexion.php';

class  Consulta {

    public static function getEstudiantes() {
        $cnx = new Conexion();
        $conexion = $cnx->conectar();
        $consulta = "SELECT * FROM estudiante";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }

}

?>