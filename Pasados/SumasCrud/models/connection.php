<?php
class Connection{
    private static $connection;

    public static function connect(){
        if(!isset(self::$connection)){
            try{
                $dns = "mysql:host=localhost;dbname=operaciones;charset=utf8;port=3306";
                $opts = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
                self::$connection = new PDO($dns, "root", "", $opts);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
}