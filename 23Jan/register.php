<?php
if(isset($_POST['txtName']) && isset($_POST['txtSurName'])){
    if(empty($_POST['txtName']) && empty($_POST['txtSurName'])){
        echo "Please fill details";
    }else{
        
        $name = $_POST['txtName'];
        $surName = $_POST['txtSurName'];
        $details = file_get_contents("regDetails.txt");
        $regDetails = json_decode($details);
        $count = count($regDetails);
        $store = [];
        $store['name'] = $name;
        $store['surname'] = $surName;
        $regDetails[$count] = $store;
        $file = fopen("regDetails.txt","w");
        $encoded = json_encode($regDetails);
        file_put_contents("regDetails.txt",$encoded);
        $count++;
        print_r($regDetails);
    }
}

?>

<form method="POST" action="register.php">
    <input type="text" name="txtName" placeholder="Enter Name" ><br><br>
    <input type="text" name="txtSurName" placeholder="Enter Surname" ><br><br>
    <input type="submit" name="submit" value="Save Details" >
</form>