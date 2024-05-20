<?php
include_once "connection.php";

class GetOne
{
    public static function getOne($personId)
    {
        $conn = Connection::connect();
        $id = $personId;
        $query = "SELECT * FROM persona WHERE id='$id'";
        $ans = $conn->prepare($query);
        $ans->execute();
        $data = $ans->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}