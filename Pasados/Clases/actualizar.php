<?php
class Editar{
    public static function editar(){
        include_once 'conexion.php';
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $conexion = new Conexion();
        $conexion = $conexion->conectar();
        $updateSql = "UPDATE estudiante SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', telefono = '$telefono' WHERE cedula = '$cedula'";
        $resultado = $conexion->prepare($updateSql);
        $resultado->execute();
    }
}