<?php
class Guardar
{
    public static function guardar()
    {
        include_once 'conexion.php';
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $conexion = new Conexion();
        $conexion = $conexion->conectar();
        $insertSql = "INSERT INTO estudiante (cedula, nombre, apellido, direccion, telefono) VALUES ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono')";
        $resultado = $conexion->prepare($insertSql);
        $resultado->execute();
    }
}