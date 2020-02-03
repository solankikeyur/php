<?php

require_once "connect.php";
date_default_timezone_set('Asia/Kolkata');
session_start();

function getPostValue($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        if(!empty($_POST[$section][$fieldName])){
            return $_POST[$section][$fieldName];
        }
    }else{
        return "";
    }
}

function checkEmptyValidation($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        if(empty($_POST[$section][$fieldName])){
            return true;
        }
    }
}

function emailValidation($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        if(!empty($_POST[$section][$fieldName])){
            if (!filter_var($_POST[$section][$fieldName], FILTER_VALIDATE_EMAIL)) {
                return true;
            }
        }
    }
}

function matchPassword($section,$password,$conPassword){
    if(isset($_POST[$section][$password]) && isset($_POST[$section][$conPassword])){
        if($_POST[$section][$password] !== $_POST[$section][$conPassword]){
            return true;
        }
    }
}

function checkSession($sessionName){
    if(isset($_SESSION[$sessionName])){
        if(!empty($_SESSION[$sessionName])){
            return true;
        }
    }
}


function checkFormValidation($section,$fieldName){
    if(isset($_POST[$section][$fieldName])){
        switch($fieldName){
            case "fname":
                if(checkEmptyValidation($section,$fieldName)){
                    return "<span>Please Enter Firstname</span>";
                }
            break;
            case "lname":
                if(checkEmptyValidation($section,$fieldName)){
                    return "<span>Please Enter Lastname</span>";
                }
            break;

            case "email":
                if(checkEmptyValidation($section,$fieldName)){
                    return "<span>Please Enter Email</span>";
                }elseif(emailValidation($section,$fieldName)){
                    return "<span>Email Not valid</span>";
                }
            break;

            case "password":
                if(checkEmptyValidation($section,$fieldName)){
                    return "<span>Please Enter Password</span>";
                }
            break;

            case "mobile":
                if(checkEmptyValidation($section,$fieldName)){
                    return "<span>Please Enter Mobile number</span>";
                }
            break;

            case "conPassword":
                if(checkEmptyValidation($section,$fieldName)){
                    return "<span>Please enter password again</span>";
                }elseif(matchPassword($section,"password","conPassword")){
                    return "<span>Password didn't matched</span>";
                }
            break;

            case "info":
                if(checkEmptyValidation($section,$fieldName)){
                    return "<span>Please Enter information</span>";
                }
            break;
        }
    }
}

function checkErrors($section){
    if(isset($_POST[$section])){
        $data = $_POST[$section];
        foreach ($data as $key => $value) {
            if(checkFormValidation($section,$key)){
                return 1;
            }
        }
    }
}

function prepareData(){
    if(isset($_POST['reg'])){
        $data = $_POST['reg'];
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch ($key) {

                case 'prefix':
                    $preparedData['u_prefix'] = $value;
                break;

                case 'fname':
                    $preparedData['u_fname'] = $value;
                break;

                case 'lname':
                    $preparedData['u_lname'] = $value;
                break;

                case 'email':
                    $preparedData['u_email'] = $value;
                break;
                
                case 'mobile':
                    $preparedData['u_mobile'] = $value;
                break;
                case 'password':
                    $preparedData['u_password'] = $value;
                break;

                case 'info':
                    $preparedData['u_information'] = $value;
                break;
                
            }
        }
    }

    $createDate = date("Y/m/d");
    $preparedData['u_createdate'] = $createDate;
    return $preparedData;
}

function prepareCatData(){
    if(isset($_POST['cat'])){
        $data = $_POST['cat'];
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch ($key) {

                case 'title':
                    $preparedData['c_title'] = $value;
                break;

                case 'content':
                    $preparedData['c_content'] = $value;
                break;

                case 'url':
                    $preparedData['c_url'] = $value;
                break;

                case 'meta':
                    $preparedData['c_meta_title'] = $value;
                break;

                case 'parentCat':
                    $preparedData['parent_cat_id'] = $value;
                break;

                                
            }
        }
        
}
$createDate = date("Y/m/d");
         $preparedData['created_at'] = $createDate;
         return $preparedData;

}

function prepareBlogData(){
    if(isset($_POST['blog'])){
        $data = $_POST['blog'];
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch ($key) {

                case 'title':
                    $preparedData['b_title'] = $value;
                break;

                case 'content':
                    $preparedData['b_content'] = $value;
                break;

                case 'url':
                    $preparedData['b_url'] = $value;
                break;

                case 'published':
                    $preparedData['b_published_at'] = $value;
                break;

                case 'category':
                    $cat = implode(",",$_POST['blog']['category']);
                    $preparedData['b_category'] = $cat;
                                
            }
        }
        
}
        $createDate = date("Y/m/d");
        $u_id = $_SESSION['u_id'];
         $preparedData['b_created_at'] = $createDate;
         $preparedData['u_id'] = $u_id;
         return $preparedData;

}

function sessionRedirect($sessionName){
    if(empty($_SESSION[$sessionName])){
        header("location:login.php");
    }
}

if(isset($_POST['reg']['submit'])){
    if(checkErrors('reg')){
        echo "There are errors";
    }elseif(isset($_POST['reg']['check'])){

        $user = prepareData();
        insertRecord($conn,"user",$user);
        echo "<script>alert('Registered Successfully');location.href = 'login.php';</script>";
        echo "Readdy to insert";
    }
}

if(isset($_POST['addCat']['submit'])){
    $category = prepareCatData();
    $url = $_POST['cat']['url'];
    $record = fetchRecord($conn,"category","c_url = '$url'");
    if(mysqli_num_rows($record) > 0){
        echo "<script>alert('URL already exists');</script>";
    }else{
        insertRecord($conn,"category",$category);
        echo "<script>alert('Created Successfully');location.href = 'manage_cat.php';</script>";    
    }
}

if(isset($_POST['blog']['submit'])){
    $blog = prepareBlogData();
    insertRecord($conn,"blog_post",$blog);
    echo "<script>alert('Created Successfully');location.href = 'blog_posts.php';</script>";

}

if(isset($_POST['blog']['update'])){
    $blog = prepareBlogData();
    $id = $_GET['id'];
    updateRecord($conn,"blog_post",$blog,"b_id = '$id' ");
}

?>