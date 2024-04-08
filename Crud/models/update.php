<?php
include_once "connection.php";

class Update
{
    public static function update($personId)
    {
        $conn = Connection::connect();
        $id = $personId;
        $firstName = $_GET["firstName"];
        $lastName = $_GET["lastName"];

        $query = "UPDATE persona SET firstName = '$firstName', lastName = '$lastName' WHERE id = '$id'";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}