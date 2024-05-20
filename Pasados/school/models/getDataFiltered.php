<?php
include_once "connection.php";

class GetDataFiltered
{
    public static function getDataFiltered()
    {
        $conn = Connection::connect();
        $level = $_GET["level"];
        $parallel = $_GET["parallel"];

        $query = "SELECT a.name, a.lastName, b.level, b.parallel 
        FROM students AS a
        INNER JOIN courses AS b ON b.id = a.courseId
        WHERE b.level = '$level' AND b.parallel = '$parallel'";
        $ans = $conn->prepare($query);
        $ans->execute();
        $data = $ans->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}