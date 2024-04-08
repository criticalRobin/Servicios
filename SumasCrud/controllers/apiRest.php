<?php
include_once "../models/getData.php";
include_once "../models/save.php";
include_once "../models/delete.php";

$opts = $_SERVER["REQUEST_METHOD"];

switch ($opts) {
    case "GET":
        GetData::getData();
        break;
    case "POST":
        Save::save();
        break;
    case "DELETE":
        $id = $_GET["id"];
        Delete::delete($id);
        break;
    default:
        echo "No es un metodo http";
        break;
}