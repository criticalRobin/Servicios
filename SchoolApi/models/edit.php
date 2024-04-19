<?php
include_once "connection.php";
class Edit
{
    public static function edit()
    {
        $connection = Connection::connect();
        $id = $_POST["id"];
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $courseId = $_POST["courseId"];

        $query = "UPDATE students SET name = '$name', lastName = '$lastName', courseId = $courseId WHERE id = $id";
        $ans = $connection->prepare($query);
        $ans->execute();

        echo json_encode("Student updated");
    }
}