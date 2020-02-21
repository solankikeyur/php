<?php

namespace App\Controllers;
use \Core\View; 
use App\Models\ServiceModel;

class Main extends \Core\BaseController {
    public function index() {
        View::renderTemplate("User/loginForm.html");
    }
    public function registerForm() {
        View::renderTemplate("User/registerForm.html");
    }

    public function myAccount() {
        $userId = $_SESSION['user_id'];
        $serviceRecords = ServiceModel::getServiceRecord("user_id='$userId'");
        View::renderTemplate("User/dashboard.html", [
            "serviceRecords" => $serviceRecords
        ]);
    }

    public function serviceForm() {
        $timeSlot = ['9-10','10-11','11-12','12-1','1-2','2-3','3-4','4-5','5-6'];
        View::renderTemplate("User/serviceForm.html", [
            'timeSlot' => $timeSlot,
            'postedData' => "" 
        ]);
    }
}



?>