<?php

namespace App\Models;

class UserModel extends \Core\Model {
    public function insertUser($data) {
        return parent::insertData('user_details',$data);
    }
    public function getUser($email,$password) {
        return parent::fetchRecord('user_details',"user_email='$email' AND user_password='$password'");
    }
}

?>