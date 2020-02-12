<?php
namespace App\Controllers;
use \Core\View;
use \App\Models\RegisterModel;

class Register extends \Core\Controller {

    public function index() {
        View::renderTemplate("Register/register.html");
    }

    public function addNew() {
       $fName = $_POST['fName'];
       $lName = $_POST['lName'];
        RegisterModel::insertRecord($fName, $lName);

    }
}


?>