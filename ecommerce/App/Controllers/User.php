<?php

namespace App\Controllers;
use \Core\View;
use \Core\Model;
use App\Models\UserModel;
class User extends \Core\BaseController {
    public function userLoginForm() {
        View::renderTemplate("User/userLogin.html");
    }
    public function validateLogin() {
        $email = $_POST['login']['email'];
        $password = $_POST['login']['password'];
        $user = UserModel::getUser($email,$password);
        if($user) {
            $_SESSION['userId'] = $user[0]['user_id'];
            $_SESSION['userName'] = $user[0]['user_firstname'];           
           header("location:/cybercom/ecommerce/Public");
        } else{
            echo "<script>alert('Incorrect login details');window.location.href='/cybercom/ecommerce/Public/User/userLoginForm';</script>";        }
    }
    public function registerForm() {
        View::renderTemplate("User/userRegister.html");
    }

    public function userLogout() {
        session_destroy();
        header("location:/cybercom/ecommerce/Public");
    }
    public function registerUser() {
        $preparedData = $this->prepareUserData($_POST['register']);
        if(UserModel::insertUser($preparedData)) {
            echo "<script>alert('Registered Successfully');window.location.href='/cybercom/ecommerce/Public/User/userLoginForm';</script>";
        }
    }
    public function prepareUserData($data) {
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch($key) {
                case  'firstName':
                    $preparedData['user_firstname'] = $value;
                break;
                case 'lastName' :
                    $preparedData['user_lastname'] = $value;
                break;
                case 'email' :
                    $preparedData['user_email'] = $value;
                break;
                case 'password' :
                    $preparedData['user_password'] = $value;
                break;

            }
        }
        return $preparedData;
    }
}


?>