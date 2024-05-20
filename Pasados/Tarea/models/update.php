<?php
include_once "connection.php";

class Update
{
    public static function update($studentId, $studentFirstName, $studentLastName, $studentAddress, $studentPhoneNumber)
    {
        $conn = Connection::connect();
        $id = $studentId;
        $firstName = $studentFirstName;
        $lastName = $studentLastName;
        $address = $studentAddress;
        $phoneNumber = $studentPhoneNumber;
        $query = "UPDATE estudiante SET nombre = '$firstName', apellido = '$lastName', direccion = '$address', telefono = '$phoneNumber' WHERE cedula = $id";
        $ans = $conn->prepare($query);
        $ans->execute();

    }
}