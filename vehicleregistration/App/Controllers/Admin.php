<?php

namespace App\Controllers;
use \Core\View; 
use App\Models\ServiceModel;
use App\Controllers\Service;

class Admin extends \Core\BaseController {
    
    public function index() {
        $serviceRecords = ServiceModel::getAllServiceRecord();
        View::renderTemplate("Admin/dashboard.html", [
            "serviceRecords" => $serviceRecords
        ]);
    }

    public function editService() {
        $id = $this->routeParams['id'];
        $_SESSION['service_id'] = $id;
        $timeSlot = ['9-10','10-11','11-12','12-1','1-2','2-3','3-4','4-5','5-6'];
        $serviceRecord = ServiceModel::getServiceRecord("service_id=$id");
        View::renderTemplate("Admin/serviceForm.html", [
            "serviceRecord" => $serviceRecord[0],
            'timeSlot' => $timeSlot
        ]);
    }

    public function updateService() {
        if(isset($_POST['service'])) {
           $record = Service::prepareServiceData($_POST['service']);
           $record['service_status'] = $_POST['service']['status'];
           $id = $_SESSION['service_id'];
           if(ServiceModel::updateService($record,$id)){
            echo "<script>alert('Service request updated');window.location.href='/cybercom/vehicleregistration/Public/Admin/';</script>";

           }
           
        }
        
    }
    
}



?>