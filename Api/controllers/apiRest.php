<?php
include_once ('../models/consulta.php');
include_once ('../models/add.php');
include_once ('../models/delete.php');
include_once ('../models/update.php');

header('Content-Type: application/json');

$opc = $_SERVER["REQUEST_METHOD"];
switch ($opc) {
    case 'GET':
        Consulta :: getEstudiantes();
        break;
    case 'POST':
        Guardar :: guardarEstudiantes();
        break;
    case 'DELETE':
        Eliminar :: eliminarEstudiantes();
        break;
    case 'PUT':
        Actualizar :: actualizarEstudiantes();
        break;
    default:
        echo "No se encontro la opcion";
        break;
}
?>