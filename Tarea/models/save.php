<?php
include_once "connection.php";

class Save
{
    public static function save()
    {
        $id = $_POST["id"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $address = $_POST["address"];
        $phoneNumber = $_POST["phoneNumber"];
        $conn = Connection::connect();
        $query = "INSERT INTO estudiante (cedula, nombre, apellido, direccion, telefono) VALUES ('$id', '$firstName', '$lastName', '$address', '$phoneNumber')";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}