<?php

function connect($dbHost,$dbUser,$dbPass,$dbName){
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
    if($db){
        return $db;
    }else{
        echo "Connection Error:-".mysqli_connect($db);
    }
}
$conn = connect("localhost","keyur","admin","student_management");

function fetchRecord($conn,$tableName,$condition){
    $selectQuery = "SELECT * FROM $tableName WHERE $condition";
   // echo $selectQuery;
    $result = mysqli_query($conn,$selectQuery);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }else{
        return 0;
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

function insertRecord($conn,$tableName,$data){
    $cols = implode(",",array_keys($data));
    $values = "'".implode("','",array_values($data))."'";
    $insertQuery = "INSERT INTO $tableName ($cols) VALUES ($values)";
    if(mysqli_query($conn,$insertQuery)){
        echo "<script>alert('Inserted Successfully');location.href = 'displayStudents.php';</script>";
    }else{
        echo "Error in insert:-".mysqli_error($conn);
    }
}

function updateRecord($conn,$tableName,$data,$condition){
    $cols = [];

    foreach ($data as $key => $value) {
        $cols[] = "$key = '$value'";
    }
    $updateQuery = "UPDATE $tableName SET ".implode(',',$cols). "WHERE $condition";
    if(mysqli_query($conn,$updateQuery)){
        echo "<script>alert('Updated Successfully');location.href='displayStudents.php';</script>";
    }else{
        echo mysqli_error($conn);
    }
}

function deleteRecord($conn,$tableName,$condition){
    $deleteQuery = "DELETE FROM $tableName WHERE $condition";
    if(mysqli_query($conn,$deleteQuery)){
        echo "<script>alert('Deleted Successfully');location.href='displayStudents.php';</script>";
    }
}

