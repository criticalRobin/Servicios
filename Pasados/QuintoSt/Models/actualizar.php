<?php
class crudA
{
    public static function ActualizarEstudiantes($cedula, $nombre, $apellido, $direccion, $telefono)
    {
        include_once ('conexion.php');
        $objeto = new conexion();
        $conectar = $objeto->conectar();
        $sql = "Update estudiante set nombre='$nombre',apellido='$apellido',direccion='$direccion',telefono='$telefono' where cedula ='$cedula'";
        $resultado = $conectar->prepare($sql);
        $resultado->execute();
        echo json_encode($resultado);
        $conectar->commit();
    }
}