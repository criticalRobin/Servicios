<?php
class Conexion
{
    public function conectar()
    {
        define("server", "localhost");
        define("user", "root");
        define("psw", "");
        define("db", "quinto");
        define("port", "3306");
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        
        try {
            $conexion = new PDO("mysql:host=" . server . ";dbname=" . db . ";port=" . port, user, psw, $opc);
            return $conexion;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            die("error en la conexion a la base de datos" . $e->getMessage());
        }
    }


}
?>