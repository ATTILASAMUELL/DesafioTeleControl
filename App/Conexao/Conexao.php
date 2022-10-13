<?php

namespace App\Conexao;
use PDO;
use PDOException;
class Conexao
{
    public static $bd = "mysql:dbname=sistema-telecontrol;host=127.0.0.1";
    public static $root = "root";
    public static $senha = "";

    public static function  Conectar()
    {
        try
        {

            $pdo = new PDO(self::$bd, self::$root, self::$senha);

            return $pdo;
        
        } 
        catch(PDOException $e)
        {
            //print_r($e);
            return array(
                'error' => "Error ao conectar"
            );
        }
    }
      
}
