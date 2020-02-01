<?php

require_once "postData.php";

$stuId = $_GET['stuid'];

deleteRecord($conn,'stu_data',"stu_id='$stuId' ");

?>