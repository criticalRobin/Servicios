<?php
include_once "connection.php";
class Save
{
    public static function save()
    {
        $conn = Connection::connect();
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"];
        $firstName = $data["name"];
        $lastName = $data["lastName"];
        $courseId = $data["courseId"];

        $query = "INSERT INTO students VALUES('$id', '$firstName', '$lastName', '$courseId')";
        $ans = $conn->prepare($query);
        $ans->execute();

        echo json_encode($ans);
    }
}