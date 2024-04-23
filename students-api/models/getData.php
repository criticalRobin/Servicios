<?php
include_once "connection.php";
class GetData
{
    public static function getData()
    {
        $connection = Connection::connect();
        $query = "SELECT * FROM students";
        $ans = $connection->prepare($query);
        $ans->execute();
        $data = $ans->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}