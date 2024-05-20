<?php
include_once 'consulta.php';
include_once 'guardar.php';
include_once 'editar.php';
include_once 'borrar.php';

$opc = $_SERVER['REQUEST_METHOD'];

switch ($opc) {
    case 'GET':
        Consulta::consultar();
        break;
    case 'POST':
        Guardar::guardar();
        break;
    case 'PUT':
        Editar::editar();
        break;
    case 'DELETE':
        $resultado = "estas en un DELETE";
        Borrar::borrar();
        break;
    default:
        $resultado = "estas en un default";
        echo $resultado;
        break;
}