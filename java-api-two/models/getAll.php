<?php
include_once "connection.php";

class GetAll
{
    public static function getAll()
    {
        $conn = Connection::connect();
        $query = "SELECT * FROM students";
        $ans = $conn->prepare($query);
        $ans->execute();
        $data = $ans->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}