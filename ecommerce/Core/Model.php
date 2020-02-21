<?php

namespace Core;
use PDO;
use \App\Config;

abstract class Model {
    protected function getDb() {
        static $db = null;
        if($db == null) {
            try{
                // $dbCon = ;
                // echo $dbCon;
                $db = new PDO("mysql:host=localhost;dbname=ecommerce","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                return $db;
            }catch(PDOException $e) {
                echo "connection error : " ,$e;
            }
        }
         else {
            return $db;
        }
    }

    public function insertData($tableName , $data) {
        $tablefields = implode(",", array_keys($data));
        $tableValues = [];
        foreach(array_values($data) as $value) {
            if($value != 'NULL') {
                $tableValues[] = "'" . $value . "'";
            }else {
                $tableValues[] = $value; 
            }
        }
        $tableValues = implode(",", $tableValues);
        $insertQuery = "insert into $tableName ($tablefields) values ($tableValues)";
        //echo $insertQuery;
        try {
            $db = static::getDb();
            print_r($db);
            $db->exec($insertQuery);
            
            return $db->lastInsertId();
        } catch(PDOException $e) {
            
            echo "Error : " . $e->getMessage();
        }
    }

    public function updateRecord($tableName, $data, $condition ="") {
        $tempArr = [];
        foreach($data as $key => $value) {
            if($value != 'NULL')
                $tempArr[] = $key . "=" . "'$value'"; 
            else 
                $tempArr[] = $key . "=" . "$value"; 
        }
        $fieldValue = implode(",", $tempArr);
        $updateQuery = "update $tableName set $fieldValue where $condition" ;
                        
        try {
            $db = static::getDB();
            return $db->exec($updateQuery);
        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }    
    }



    public function fetchAll($tableName) {
        $selectQuery = "SELECT * FROM $tableName";
        try {
            $db = static::getDb();
            $stmt = $db->query($selectQuery);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function fetchRecord($tableName,$condition) {
        $selectQuery = "SELECT * FROM $tableName WHERE $condition";
       // echo $selectQuery;
        try {
            $db = static::getDb();
            $stmt = $db->query($selectQuery);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $th) {
            echo "Fetch Record Error:=".$th->getMessage();
        }
    }
    
    public function deleteRecord($tableName, $condition) {
        $deleteQuery = "DELETE FROM $tableName WHERE $condition";
        try {
            $db = static::getDb();
            $db->exec($deleteQuery);
            return 1;

        } catch (PDOException $th) {
            echo "Delete Excception:-".$th->getMessage();
        }
    }
}


?>