<?php
include_once "connection.php";

class Delete
{
    public static function delete($personId)
    {
        $conn = Connection::connect();
        $id = $personId;
        $query = "DELETE FROM persona WHERE id='$id'";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}