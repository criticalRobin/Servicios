<?php
include_once "../Models/borrar.php";
include_once "../Models/consulta.php";
include_once "../Models/guardar.php";
include_once "../Models/actualizar.php";

header('Content-Type: application/json');
$opc = $_SERVER['REQUEST_METHOD'];
switch ($opc) {
    case "GET":
        crudS::SeleccionarEstudiantes();
        break;
    case "POST":
        crudG::GuardarEstudiantes();
        break;
    case "PUT":
        $datoMod = json_decode(file_get_contents('php://input'));
        crudA::ActualizarEstudiantes(
            $datoMod->cedula,
            $datoMod->nombre,
            $datoMod->apellido,
            $datoMod->direccion,
            $datoMod->telefono
        );
        break;
    case "DELETE":
        $cedula = $_GET['cedula'];
        crudB::BorrarEstudiantes($cedula);
        break;
}