<?php

namespace App\Controllers;
use \Core\View; 
use App\Models\UserModel;
class User extends \Core\BaseController {
   public function validateLogin() {
       $email = $_POST['email'];
       $password = $_POST['password'];
       $result = UserModel::checkRecord($email, $password);
       if($result) {
           $_SESSION['user_id'] = $result[0]['user_id'];
           header("location:/cybercom/vehicleregistration/Public/Main/myAccount");
       } else {
           echo "<script>alert('Invalid Login Details');window.location.href='/cybercom/vehicleregistration/Public/Main/index';</script>";
       }
   }
   
   public function validateRegister() {
       $userData = $this->prepareUserData($_POST['regUser']);
       $addressData = $this->prepareAddressData($_POST['regAdd']);
      $lastInsertedId = UserModel::insertUser($userData);
      $addressData['user_id'] = $lastInsertedId;
      UserModel::insertAddress($addressData);
      echo "<script>alert('Registered Successfully');window.location.href='/cybercom/vehicleregistration/Public/Main/index';</script>";
   }
   public function prepareUserData($data) {
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch($key) {
                case "firstName":
                    $preparedData['user_firstname'] = $value;
                break;
                case "lastName":
                    $preparedData['user_lastname'] = $value;
                break;
                case "email":
                    $preparedData['user_email'] = $value;
                break;
                case "password":
                    $preparedData['user_password'] = $value;
                break;
                case "phoneNo":
                    $preparedData['user_phoneno'] = $value;
                break;
            }
        }
        return $preparedData;
   }

   public function prepareAddressData($data) {
    $preparedData = [];
    foreach ($data as $key => $value) {
        switch($key) {
            case "street":
                $preparedData['address_street'] = $value;
            break;
            case "city":
                $preparedData['address_city'] = $value;
            break;
            case "state":
                $preparedData['address_state'] = $value;
            break;
            case "zipCode":
                $preparedData['address_zipcode'] = $value;
            break;
            case "country":
                $preparedData['address_country'] = $value;
            break;
        }
    }

    return $preparedData;
}

    
}


?>