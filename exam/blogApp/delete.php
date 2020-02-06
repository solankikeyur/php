<?php
require_once "post_data.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tbl = $_GET['tbl'];
    if($tbl == "blog_post"){
        deleteRecord($conn,$tbl,"b_id = '$id' ");
        echo "<script>alert('Deleted Successfully');location.href = 'blog_posts.php';</script>";
    }elseif($tbl = "category"){
        deleteRecord($conn,$tbl,"c_id = '$id' ");
        echo "<script>alert('Deleted Successfully');location.href = 'manage_cat.php';</script>";
    }
}else{
    echo "<script>alert('Delete Record id not found please try again');location.href = 'blog_posts.php';</script>";
}
?>