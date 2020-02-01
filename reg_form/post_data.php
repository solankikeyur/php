<?php

require_once "connect.php";
echo "<pre>";
print_r($_POST);
echo "</pre>";

session_start();

function getValue($section,$fieldname,$required=""){
    if(isset($_POST[$section][$fieldname])){
        if(!empty($_POST[$section][$fieldname])){
            return $_POST[$section][$fieldname];
        }
    }else{
        return $required;
    }
}

function validateEmpty($section,$fieldname){
    global $errors;
    if(isset($_POST[$section][$fieldname])){
        if(empty($_POST[$section][$fieldname])){
            return 1;
        }
    }
}

function validateEmail($section,$fieldname){
    if(isset($_POST[$section][$fieldname])){
        if(!empty($_POST[$section][$fieldname])){
            if(!filter_var($_POST[$section][$fieldname], FILTER_VALIDATE_EMAIL)){
                return 1;
            }
        }
    }
}

function validateFile(){
    if(isset($_POST[$section][$fieldname])){
        
    }
}

function checkErrors($section){
    if($_POST[$section]){
        $array = $_POST[$section];
        foreach ($array as $key => $value) {
            if(validateEmpty($section,$key)){
                return 1;
            }
        }
    }
}

function fetchCustomerDetails(){
    if(isset($_POST["account"])){
        $account = $_POST["account"];
        $customers = [];
        foreach ($account as $key => $value) {
            switch($key){
                case "prefix":
                    $customers["c_prefix"] = $value;
                break;
                case "firstname":
                    $customers["c_fname"] = $value;
                break;
                case "lastname":
                    $customers["c_lname"] = $value;
                break;
                case "phonenumber":
                    $customers["c_phonenumber"] = $value;
                break;
                case "email":
                    $customers["c_email"] = $value;
                break;
                case "password":
                    $customers["c_password"] = $value;
                break;
            }
        }
        return $customers;
    }
}

function fetchAddressDetails($c_id){
    if(isset($_POST["address"])){
        $address = $_POST["address"];
        $c_address = [];
        $c_address["c_id"] = $c_id;
        foreach ($address as $key => $value) {
            switch($key){
                case "addressline1":
                    $c_address["c_addressline1"] = $value;
                break;
                case "addressline2":
                    $c_address["c_addressline2"] = $value;
                break;
                case "company":
                    $c_address["c_company"] = $value;
                break;
                case "state":
                    $c_address["c_state"] = $value;
                break;
                case "country":
                    $c_address["c_country"] = $value;
                break;
                case "postalcode":
                    $c_address["c_postalcode"] = $value;
                break;
            }
        }
        return $c_address;
    }
}

function fetchOtherDetails($conn,$c_id){
    if(isset($_POST["other"])){
        $other = $_POST["other"];
        $c_other = [];
        foreach ($other as $key => $value) {
                    switch($key){
                        case "getintouch":
                            $values = implode(" ",$value);
                            $c_other["c_field_key"] = $key;
                            $c_other["c_value"] = $values;
                            $c_other["c_id"] = $c_id;
                            insertRecord($conn,"customer_additional_info",$c_other);
                        break;
                        case "hobbies":
                            $values = implode(" ",$value);
                            $c_other["c_field_key"] = $key;
                            $c_other["c_value"] = $values;
                            $c_other["c_id"] = $c_id;
                            insertRecord($conn,"customer_additional_info",$c_other);
                        break;
                        default:
                            $c_other["c_field_key"] = $key;
                            $c_other["c_value"] = $value;
                            $c_other["c_id"] = $c_id;
                            insertRecord($conn,"customer_additional_info",$c_other);
                        break;
                    }
            }
        }  
    }

    function updateOtherDetails($conn,$c_id){
        if(isset($_POST["other"])){
            $other = $_POST["other"];
            $c_other = [];
            foreach ($other as $key => $value) {
                        switch($key){
                            case "getintouch":
                                $values = implode(" ",$value);
                                $c_other["c_field_key"] = $key;
                                $c_other["c_value"] = $values;
                                updateRecord($conn,"customer_additional_info",$c_other,"c_id = $c_id AND c_field_key='$key'");
                            break;
                            case "hobbies":
                                $values = implode(" ",$value);
                                $c_other["c_field_key"] = $key;
                                $c_other["c_value"] = $values;
                                updateRecord($conn,"customer_additional_info",$c_other,"c_id = $c_id AND c_field_key='$key'");
                            break;
                            default:
                                $c_other["c_field_key"] = $key;
                                $c_other["c_value"] = $value;
                                updateRecord($conn,"customer_additional_info",$c_other,"c_id = $c_id AND c_field_key='$key'");
                            break;
                        }
                }
            }  
        }
    


    

if(isset($_POST["submit"])){
 if(checkErrors("account") || checkErrors("address") || checkErrors("other") || validateEmail("account","email")){
     echo "There are errors";
 }else{
     $customers = fetchCustomerDetails();
     insertRecord($conn,"customers",$customers);
     $c_id = mysqli_insert_id($conn);
     $address = fetchAddressDetails($c_id);
     insertRecord($conn,"customer_address",$address);
     fetchOtherDetails($conn,$c_id);
 }
}

if(isset($_POST["update"])){
    if(checkErrors("account") || checkErrors("address") || checkErrors("other") || validateEmail("account","email")){
        echo "There are errors";
    }else{
        $c_id = $_GET['c_id'];
        $customers = fetchCustomerDetails();
        updateRecord($conn,"customers",$customers,"c_id = $c_id");
        $address = fetchAddressDetails($c_id);
        updateRecord($conn,"customer_address",$address,"c_id = $c_id");
        updateOtherDetails($conn,$c_id);
        echo 'Updatedd';
        header("location:'showData.php'");
    }
}

?>