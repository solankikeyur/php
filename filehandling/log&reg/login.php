<?php


$fetch_details = file_get_contents("regDetails.txt");
$regDetails = json_decode($fetch_details);

if(checkLogin($regDetails)){
   header("location:welcome.php");
}else{
    echo "Incorrect Login details";
}

function checkLogin($regDetails){
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    foreach($regDetails as $r){
        if($r->email == $loginEmail && $r->password == $loginPassword){
            session_start();
            $_SESSION['loggedUser'] = $r->name;
            return true;
        }else{
            
        }
    }
}

?>