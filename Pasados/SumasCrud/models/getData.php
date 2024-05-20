<?php
include_once "connection.php";

class GetData
{
    public static function getData()
    {
        $conn = Connection::connect();
        $query = "SELECT * FROM sumas";
        $ans = $conn->prepare($query);
        $ans->execute();
        $data = $ans->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}