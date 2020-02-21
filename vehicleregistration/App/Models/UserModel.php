<?php

namespace App\Models;
use PDO;
class UserModel extends \Core\Model {

    public function insertUser($data) {
        return parent::insertData('user',$data);
    }
   
    public function insertAddress($data) {
        return parent::insertData('user_address', $data);
    }

    public function checkRecord($email, $password) {
        return parent::fetchRecord('user', "user_email='$email' AND user_password='$password'");
    }
}

?>