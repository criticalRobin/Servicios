<?php
// include_once "../models/getData.php";
include_once "../models/getOne.php";
include_once "../models/save.php";
include_once "../models/update.php";
include_once "../models/delete.php";

$opt = $_SERVER["REQUEST_METHOD"];

switch ($opt) {
    case "GET":
        $id = $_GET["id"];
        GetOne::getOne($id);
        break;
    case "POST":
        Save::save();
        break;
    case "PUT":
        $id = $_GET["id"];
        Update::update($id);
        break;
    case "DELETE":
        $id = $_GET["id"];
        Delete::delete($id);
        break;
    default:
        echo "No es una peticion valida";
        break;
}