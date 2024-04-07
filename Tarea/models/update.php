<?php
include_once "connection.php";

class Update
{
    public static function update($studentId)
    {
        $conn = Connection::connect();
        $id = $studentId;
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $address = $_POST["address"];
        $phoneNumber = $_POST["phoneNumber"];
        $query = "UPDATE estudiante SET nombre = '$firstName', apellido = '$lastName', direccion = '$address', telefono = '$phoneNumber' WHERE cedula = $id";
        $ans = $conn->prepare($query);
        $ans->execute();

    }
}