<?php
include_once "connection.php";

class Delete
{
    public static function delete()
    {
        $connection = Connection::connect();
        $id = $_GET["id"];
        $query = "DELETE FROM students WHERE id = $id";
        $ans = $connection->prepare($query);
        $ans->execute();
    }
}