<?php

require_once "connect.php";
date_default_timezone_set('Asia/Kolkata');

function getPostData($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        if(!empty($_POST[$section][$fieldName])){
            return $_POST[$section][$fieldName];;
        }
    }else{
        return "";
    }
}

function validateEmpty($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        if(empty($_POST[$section][$fieldName])){
            return true;
        }
    }
}

function validateEmail($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        if(!empty($_POST[$section][$fieldName])){
            if (!filter_var($_POST[$section][$fieldName], FILTER_VALIDATE_EMAIL)) {
                return true;
              }
        }
    }
}

function validateForm($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        switch($fieldName){
            case "email":
                if(validateEmpty($section,$fieldName)){
                    return "<span>Please Enter Email</span>";
                }elseif(validateEmail($section,$fieldName)){
                    return "<span>Please enter valid email</span>";
                }
            break;

            default:
                if(validateEmpty($section,$fieldName)){
                    return "<span>Please enter $fieldName</span>";
                }
            break;
        }
    }
}

function checkErrors($section){
    if(isset($_POST[$section])){
        $data = $_POST[$section];
        foreach ($data as $key => $value) {
            if(validateForm($section,$key)){
                return 1;
            }
        }
    }
}

function checkSession($sessionName){
    session_start();
    if(isset($_SESSION[$sessionName])){
        if(!empty($_SESSION[$sessionName])){
            return true;
        }
    }
}

function sessionRedirect($sessionName){
    session_start();
    if(empty($_SESSION[$sessionName])){
        header("location:login.php");
    }
}

function prepareData(){
    if(isset($_POST['stu'])){
        $data = $_POST['stu'];
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'name':
                    $preparedData['stu_name'] = $value;
                break;

                case 'email':
                    $preparedData['stu_email'] = $value;
                break;
                
                case 'address':
                    $preparedData['stu_address'] = $value;
                break;

                case 'class':
                    $preparedData['stu_class'] = $value;
                break;
                
            }
        }
    }
    return $preparedData;
}

if(isset($_POST['addStudent'])){
    
    if(checkErrors('stu')){
        echo "There are errors";
    }else{
        $stuData = prepareData();
        insertRecord($conn,"stu_data",$stuData);
        echo "Ready to insert";
    }
}

if(isset($_POST['updateStudent'])){
    if(checkErrors('stu')){
        echo "There are errors";
    }else{
        $stuData = prepareData();
        $stuId = $_GET['stuid'];
        updateRecord($conn,"stu_data",$stuData,"stu_id = '$stuId' ");
    }
}



?>