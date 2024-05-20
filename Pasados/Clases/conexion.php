<?php
class conexion
{
    public static function conectar()
    {
        define("server", "localhost");
        define("user", "root");
        define("pass", "");
        define("mainDataBase", "quinto");
        define("port", "3306");
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        try {
            $conexion = new PDO("mysql:host=" . server . ";dbname=" . mainDataBase . ";port=" . port, user, pass, $opc);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            die("error en la conexion a la base de datos" . $e->getMessage());
        }
    }
}