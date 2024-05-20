<?php
class Consulta
{
    public static function consultar()
    {
        include ("conexion.php");
        $objeto = new conexion();
        $conexion = $objeto->conectar();
        $sqlSelect = "SELECT * FROM estudiante";
        $resultado = $conexion->prepare($sqlSelect);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
}
