<?php
class GetFiltered
{
    public static function getFiltered()
    {
        $connection = Connection::connect();
        $level = $_GET["level"];
        $parallel = $_GET["parallel"];

        $query = "SELECT * FROM students WHERE courseId = (SELECT id FROM courses WHERE level = '$level' AND parallel = '$parallel')";
        $ans = $connection->prepare($query);
        $ans->execute();
        $data = $ans->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($data);
    }
}