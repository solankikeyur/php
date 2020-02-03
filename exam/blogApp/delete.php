<?php

require_once "post_data.php";

$id = $_GET['id'];
$tbl = $_GET['tbl'];
if($tbl == "blog_post"){
    deleteRecord($conn,$tbl,"b_id = '$id' ");
    echo "<script>alert('Deleted Successfully');location.href = 'blog_posts.php';</script>";

}elseif($tbl = "category"){
    deleteRecord($conn,$tbl,"c_id = '$id' ");
    echo "<script>alert('Deleted Successfully');location.href = 'manage_cat.php';</script>";
}


?>