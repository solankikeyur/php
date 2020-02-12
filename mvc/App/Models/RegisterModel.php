<?php
namespace App\Models;

class RegisterModel extends \Core\Model {

    public function insertRecord($fName, $lName) {
        echo "Insert new Record";
        $query = "INSERT INTO user(f_name,l_name) VALUES('$fName','$lName')";
        echo $query;
        $db = static::getDb();
        $db->exec($query);
    }
}


?>