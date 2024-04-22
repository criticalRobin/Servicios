<?php
include_once "connection.php";
class Edit
{
    public static function edit()
    {
        $connection = Connection::connect();

        $data = [];
        $id = $_GET["id"];
        $data = json_decode(file_get_contents("php://input"), true);

        $query = "UPDATE students SET name = '$data[name]', lastName = '$data[lastName]', courseId = $data[courseId] WHERE id = '$id'";
        $ans = $connection->prepare($query);
        $ans->execute();

        echo json_encode("Student updated");
    }
}