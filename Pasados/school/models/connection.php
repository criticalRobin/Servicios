<?php
class Connection
{
    private static $conn;

    public static function connect()
    {
        if (!isset($conn)) {
            try {
                $dns = "mysql:host=localhost;dbname=school;charset=utf8;port=3306";
                $opt = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
                self::$conn = new PDO($dns, "root", "", $opt);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conn;
    }
}