<?php
class Borrar
{
    public static function borrar()
    {
        include_once 'conexion.php';
        $conexion = new Conexion();
        $conexion = $conexion->conectar();
        $cedula = $_GET["cedula"];
        $borrarSql = "DELETE FROM estudiante WHERE cedula = '$cedula'";
        $resultado = $conexion->prepare($borrarSql);
        $resultado->execute();
    }

}
