<?php
include_once "connection.php";

class Save
{
    public static function save()
    {
        $connection = Connection::connect();
        $id = $_POST["id"];
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $courseId = $_POST["courseId"];

        $query = "INSERT INTO students VALUES('$id', '$name', '$lastName', '$courseId')";
        $ans = $connection->prepare($query);
        $ans->execute();
    }
}