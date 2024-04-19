<?php
include_once "connection.php";

class GetOne
{
    public static function getOne()
    {
        $connection = Connection::connect();
        $id = $_GET["id"];
        $query = "SELECT * FROM students WHERE id = $id";
        $ans = $connection->prepare($query);
        $ans->execute();
        $data = $ans->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}