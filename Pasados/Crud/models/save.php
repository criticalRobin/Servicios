<?php
include_once "connection.php";
class Save
{
    public static function save()
    {
        $conn = Connection::connect();
        $id = $_POST["id"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];

        $query = "INSERT INTO persona (id, firstName, lastName) VALUES ('$id', '$firstName', '$lastName')";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}