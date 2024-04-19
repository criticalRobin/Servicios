<?php
class Actualizar
{
    public static function actualizarEstudiantes()
    {
        $datosPUT = [];
        $cedula = $_GET['cedula'];
        $datosPUT = json_decode(file_get_contents("php://input"), true);

        $sqlUpdate = "UPDATE estudiante SET nombre = '$datosPUT[nombre]', apellido = '$datosPUT[apellido]', direccion = '$datosPUT[direccion]', telefono = '$datosPUT[telefono]' WHERE cedula = '$cedula'";

        $objeto = new Conexion();
        $conexion = $objeto->conectar();
        $resultado = $conexion->prepare($sqlUpdate);
        $resultado->execute();
        echo json_encode('Se actualizo');

    }
}
?>