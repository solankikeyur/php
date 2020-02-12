<?php

namespace Core;
use PDO;
use App\Config;
abstract class Model {

    public static function getDb() {
        static $db = null;
        if( $db === null ) {
            $host = Config::dbHost;
            $dbName = Config::dbName;
            $dbUser = Config::dbUser;
            $dbPass = Config::dbPass;

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$dbUser, $dbPass);
                return $db;
            } catch(PDOException $e) {  
                echo $e->getMessage();
            }
        }
    }

}


?>