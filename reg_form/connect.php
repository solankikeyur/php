<?php

function connect($dbHost,$dbUser,$dbPassword,$dbName){
    $db = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
    if($db){
        echo "Connected Successfully";
        return $db;
    }else{
        echo "Error".mysqli_error($db);
    }
}

$conn = connect("localhost","keyur","admin","customer_portal");

function insertRecord($conn,$tableName,$dataArray){
    $cols = implode(",",array_keys($dataArray));
    $values = "'".implode("','",array_values($dataArray)). "'";
    $insertQuery = "INSERT INTO `$tableName`($cols) VALUES ($values) ";
    if(mysqli_query($conn,$insertQuery)){
        echo "Inserted Successfully";
    }else{
        echo "Errors at insert:-".mysqli_error($conn);
    }
}




function fetchRecords($conn){
    $selectQuery = "SELECT C.c_id,C.c_fname,C.c_lname,CA.c_state,CA.c_country,COH.c_value Hobbies,COC.c_value Clients FROM
    customers C LEFT JOIN customer_address CA ON C.c_id = CA.c_id 
    LEFT JOIN customer_additional_info COH ON C.c_id=COH.c_id AND COH.c_field_key='Hobbies'
    LEFT JOIN customer_additional_info COC ON C.c_id=COC.c_id AND COC.c_field_key='Clients'";
    $result = mysqli_query($conn,$selectQuery);
    if($result){
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}

function deleteRecord($conn,$tableName,$condition){
    $deleteQuery = "DELETE FROM $tableName WHERE $condition";
    if(mysqli_query($conn,$deleteQuery)){
        echo "Record Deleted";
    }else{
        echo "Error:-".mysqli_error($conn);
    }
}

function viewRecord($conn,$tableName,$condition){
    $selectQuery = "SELECT * FROM $tableName WHERE $condition";
    
    if(mysqli_query($conn,$selectQuery)){
        $result = mysqli_query($conn,$selectQuery);
        return $result;
    }else{
        echo "Error In Query:".mysqli_error($conn);
    }
}

function fetchOtherData($result){
    $array = [];
    while($row = mysqli_fetch_assoc($result)){
        $array[$row['c_field_key']] = $row['c_value'];
    }
    return $array;
}

function updateRecord($conn,$tableName,$data,$condition){
    $cols = [];
    foreach ($data as $key => $value) {
        $cols[] = "$key = '$value'";
    }
    //print_r($cols);
    $updateQuery = "UPDATE $tableName SET ".implode(",",$cols)."WHERE $condition ";
    echo $updateQuery."<br>";
    if(mysqli_query($conn,$updateQuery)){
        print_r($cols);
        echo "<br>";
        echo "Updated Successfully";
        echo "<br>";
    }else{
        echo "Update Error=".mysqli_error($conn);
    }
}

?>