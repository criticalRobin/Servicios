<?php
class Connection
{
    private static $connection;

    public static function connect()
    {
        if (!isset(self::$connection)) {
            try {
                $dns = "mysql:host=localhost;dbname=quinto;charset=utf8;port=3306";
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
                self::$connection = new PDO($dns, "root", "", $options);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                die("Error al conectarse con la base de datos, error: " . $ex->getMessage());
            }
        }
        return self::$connection;
    }
}