<?php
include_once  ("conexion.php");
class Guardar
{

    public static function guardarEstudiantes()
    {
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $sql = "insert into estudiante(cedula, nombre, apellido, direccion, telefono) values ('$cedula', '$nombre', '$apellido', '$direccion', '$telefono')";

        $objeto = new Conexion();
        $conexion = $objeto->conectar();

        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        echo json_encode('Se guardo');

    }



}


?>