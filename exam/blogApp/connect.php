<?php

function connect($dbHost,$dbUser,$dbPass,$dbName){
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
    if($db){
        return $db;
    }else{
        echo "Error in Connection:-".mysqli_error($db);
    }
}
$conn = connect("localhost","keyur","admin","blog_app");

function insertRecord($conn,$tableName,$dataArray){
    $cols = implode(",",array_keys($dataArray));
    $values = "'".implode("','",array_values($dataArray))."'";
    $insertQuery = "INSERT INTO $tableName ($cols) VALUES($values)";
    if(mysqli_query($conn,$insertQuery)){
        echo "Registered Successfull";
    }else{
        echo "Error in Insertion:-".mysqli_error($conn);
    }
}
function fetchRecord($conn,$tableName,$condition){
    $selectQuery = "SELECT * FROM $tableName WHERE $condition";
    $result = mysqli_query($conn,$selectQuery);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else{
        return $result;
    }
}

function fetchAllRecord($conn,$tableName){
    $selectQuery = "SELECT * FROM $tableName";
    $result = mysqli_query($conn,$selectQuery);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else{
        echo "No REsults found";
    }
}


function deleteRecord($conn,$tableName,$condition){
    $deleteQuery = "DELETE FROM $tableName WHERE $condition";
    if(mysqli_query($conn,$deleteQuery)){
        return true;
    }else{
        echo "Error in deletion:-".mysqli_error($conn);
    }
}


function updateRecord($conn,$tableName,$data,$condition){
    $cols = [];

    foreach ($data as $key => $value) {
        $cols[] = "$key = '$value'";
    }
    $updateQuery = "UPDATE $tableName SET ".implode(',',$cols). "WHERE $condition";
    if(mysqli_query($conn,$updateQuery)){
        echo "<script>alert('Updated Successfully');location.href='blog_posts.php';</script>";
    }else{
        echo mysqli_error($conn);
    }
}

?>