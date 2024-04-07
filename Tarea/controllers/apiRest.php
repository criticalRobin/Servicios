<?php
include_once "../models/connection.php";
include_once "../models/getData.php";
include_once "../models/save.php";
include_once "../models/delete.php";
include_once "../models/update.php";

$opt = $_SERVER['REQUEST_METHOD'];

switch ($opt) {
    case 'GET':
        GetData::getData();
        break;
    case 'POST':
        Save::save();
        break;
    case 'PUT':
        $studentId = $_GET["id"];
        $firstName = $_GET["firstName"];
        $lastName = $_GET["lastName"];
        $address = $_GET["address"];
        $phoneNumber = $_GET["phoneNumber"];
        Update::update($studentId, $firstName, $lastName, $address, $phoneNumber);
        break;
    case 'DELETE':
        $studentId = $_GET["id"];
        Delete::delete($studentId);
        break;
    default:
        echo "No es una petición rest";
        break;
}