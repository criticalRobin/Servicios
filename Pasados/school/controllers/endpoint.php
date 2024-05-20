<?php
include_once "../models/getDataFiltered.php";

$opts = $_SERVER["REQUEST_METHOD"];

switch ($opts) {
    case 'GET':
        GetDataFiltered::getDataFiltered();
        break;
    default:
        echo json_encode("No valid endpoint");
        break;
}