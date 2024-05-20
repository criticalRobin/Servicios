<?php
include_once "../models/getFiltered.php";

$opts = $_SERVER["REQUEST_METHOD"];

switch ($opts) {
    case 'GET':
        GetFiltered::getFiltered();
        break;
    default:
        echo json_encode("No es un endpoint valido");
        break;
}