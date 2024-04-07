<?php
include_once "connection.php";

class Delete
{
    public static function delete($studentId)
    {
        $conn = Connection::connect();
        $id = $studentId;
        $query = "DELETE FROM estudiante WHERE cedula = $id";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}