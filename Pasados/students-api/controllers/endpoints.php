<?php
include_once "../models/getData.php";
include_once "../models/save.php";
include_once "../models/update.php";
include_once "../models/delete.php";


$opts = $_SERVER['REQUEST_METHOD'];

switch ($opts) {
    case 'GET':
        GetData::getData();
        break;
    case 'POST':
        Save::save();
        break;
    case 'PUT':
        Update::update();
        break;
    case 'DELETE':
        Delete::delete();
        break;
    default:
        echo "No es un metodo valido";
        break;
}