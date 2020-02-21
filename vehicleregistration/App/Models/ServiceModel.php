<?php

namespace App\Models;
use PDO;
class ServiceModel extends \Core\Model {

    public function insertServiceRecord($data) {
        return parent::insertData('service_registration',$data);
    }
   
    public function getServiceRecord($condition) {
        return parent::fetchRecord('service_registration', $condition);
    }

    public function getAllServiceRecord(){
        return parent::fetchAll('service_registration');
    }

    public function checkSlot($time, $date) {
        $selectQuery = "SELECT * FROM service_registration WHERE service_timeslot='$time' AND service_date='$date'";
        $db = static::getDb();
        $stmt = $db->query($selectQuery);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }

    public function updateService($data, $id) {
        return parent::updateRecord('service_registration', $data,"service_id=$id");
    }

}

?>