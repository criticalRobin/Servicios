<?php
include_once "connection.php";

class Delete
{
    public static function delete($optId)
    {
        $conn = Connection::connect();
        $id = $optId;

        $query = "DELETE FROM sumas WHERE id='$id'";
        $ans = $conn->prepare($query);
        $ans->execute();
    }
}