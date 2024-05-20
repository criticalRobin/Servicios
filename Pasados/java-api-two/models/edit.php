<?php
include_once "connection.php";

class Edit
{
    public static function edit()
    {
        $conn = Connection::connect();
        $id = $_GET["id"];
        $name = $_GET["name"];
        $lastName = $_GET["lastName"];
        $courseId = $_GET["courseId"];

        $query = "UPDATE students SET name = '$name', lastName = '$lastName', courseId = '$courseId' WHERE id = '$id'";
        $ans = $conn->prepare($query);
        $ans->execute();

        echo json_encode($ans);
    }
}