<?php
include_once "../models/getAll.php";
include_once "../models/getFiltered.php";
include_once "../models/save.php";
include_once "../models/edit.php";
include_once "../models/delete.php";

header("Content-Type: application/json");

$opts = $_SERVER["REQUEST_METHOD"];

switch ($opts) {
    case 'GET':
        if (isset($_GET["level"]) && isset($_GET["parallel"])) {
            GetFiltered::getFiltered();
        } else {
            GetAll::getAll();
        }
        break;
    case 'POST':
        Save::save();
        break;
    case 'PUT':
        Edit::edit();
        break;
    case 'DELETE':
        Delete::delete();
        break;
    default:
        echo "Not a vald endpoint";
        break;
}