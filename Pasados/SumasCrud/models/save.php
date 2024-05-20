<?php
include_once "connection.php";

class Save
{
    public static function save()
    {
        $conn = Connection::connect();
        $id = $_POST["id"];
        $numOne = $_POST["numOne"];
        $numTwo = $_POST["numTwo"];
        $ans = $numOne + $numTwo;

        $query = "INSERT INTO sumas (id, num_one, num_two, ans) VALUES ($id, $numOne, $numTwo, $ans)";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}