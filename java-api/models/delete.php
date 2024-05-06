<?php
include_once "connection.php";
class Delete
{
    public static function delete()
    {
        $conn = Connection::connect();
        $id = $_GET["id"];
        $query = "DELETE FROM students WHERE id = '$id'";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}