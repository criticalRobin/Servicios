<?php
include_once "../models/getOne.php";
include_once "../models/getData.php";
include_once "../models/getFiltered.php";
include_once "../models/create.php";
include_once "../models/delete.php";
include_once "../models/edit.php";

$opt = $_SERVER["REQUEST_METHOD"];

switch ($opt) {
    case "GET":
        if (isset($_GET["level"]) && isset($_GET["parallel"])) {
            GetFiltered::getFiltered();
        } elseif (isset($_GET["id"])) {
            GetOne::getOne();
        } else {
            GetData::getData();
        }
        break;
    case "POST":
        Create::create();
        break;
    case "DELETE":
        Delete::delete();
        break;
    case "PUT":
        Edit::edit();
        break;
    default:
        echo json_encode("Method not allowed");
        break;
}