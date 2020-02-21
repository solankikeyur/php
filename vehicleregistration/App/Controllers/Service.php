<?php

namespace App\Controllers;
use \Core\View; 
use App\Models\ServiceModel;

class Service extends \Core\BaseController {
    public function addServiceRequest() {
        if(isset($_POST['service'])){
            $serviceData = $this->prepareServiceData($_POST['service']);
            $serviceData['user_id'] = $_SESSION['user_id'];
            $serviceData['service_status'] = "Pending";
            $vehicleNo = $serviceData['service_vehicleno'];
            $licenceNo = $serviceData['service_licenceno'];
            $serviceDate = $serviceData['service_date'];
            $serviceTime = $serviceData['service_timeslot'];
            echo $serviceDate;
            $slot = ServiceModel::checkSlot($serviceTime, $serviceDate);
            echo "<pre>";
            print_r($slot);
            echo "</pre>";
            
            if($this->checkServiceRecord("service_vehicleno ='$vehicleNo'")) {
                echo "<script>alert('Vehicle Number already for other user')</script>";
                $timeSlot = ['9-10','10-11','11-12','12-1','1-2','2-3','3-4','4-5','5-6'];
                View::renderTemplate("User/serviceForm.html",[
                    "postedData" => $serviceData,
                    'timeSlot' => $timeSlot
                ]);
            }elseif($this->checkServiceRecord("service_licenceno = '$licenceNo'")) {
                echo "<script>alert('License Number already for other user')</script>";
                $timeSlot = ['9-10','10-11','11-12','12-1','1-2','2-3','3-4','4-5','5-6'];
                View::renderTemplate("User/serviceForm.html",[
                    "postedData" => $serviceData,
                    'timeSlot' => $timeSlot
                ]);
            }elseif($slot >= 3){
                echo "<script>alert('time slot not available')</script>";
                $timeSlot = ['9-10','10-11','11-12','12-1','1-2','2-3','3-4','4-5','5-6'];
                View::renderTemplate("User/serviceForm.html",[
                    "postedData" => $serviceData,
                    'timeSlot' => $timeSlot
                ]);
               
            }else {
                if(ServiceModel::insertServiceRecord($serviceData)) {
                    echo "<script>alert('Service request added');window.location.href='/cybercom/vehicleregistration/Public/Main/myAccount';</script>";
                }
            }
            
        }
       
       
    }
    public function checkServiceRecord($condition) {
        $result = ServiceModel::getServiceRecord($condition);
        if($result) {
            if($result[0]["user_id"] != $_SESSION["user_id"]) {
                return true;
            }
        }
    }
    public function prepareServiceData($data) {
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch($key) {
                case "title":
                    $preparedData['service_title'] = $value;
                break;
                case "vehicleNumber":
                    $preparedData['service_vehicleno'] = $value;
                break;
                case "licenseNumber":
                    $preparedData['service_licenceno'] = $value;
                break;
                case "date":
                    $preparedData['service_date'] = $value;
                break;
                case "timeSlot":
                    $preparedData['service_timeslot'] = $value;
                break;
                case "vehicleIssue":
                    $preparedData['service_issue'] = $value;
                break;
                case "center":
                    $preparedData['service_center'] = $value;
                break;

            }
        }
        return $preparedData;
    }
}


?>