<?php
include_once "../Models/borrar.php";
include_once "../Models/consulta.php";
include_once "../Models/guardar.php";
include_once "../Models/actualizar.php";
$opc = $_SERVER['REQUEST_METHOD'];
switch($opc){
    case "GET":
        crudS::SeleccionarEstudiantes();
        break;
    case "POST":
        crudG::GuardarEstudiantes();
        break;
    case "PUT":
         crudA::ActualizarEstudiantes();
            break;
    case "DELETE":
        $cedula=$_GET['cedula'];
        crudB::BorrarEstudiantes($cedula);
        break;
}