<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calender Page</title>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
    <h1>Calender</h1><hr>
    <form method="POST" action="calender.php">
        Enter Year:<br>
        <input type="number" name="txtYear" placeholder="Enter Year Here" id="txtYear" ><br><br>
        Select Month:<br>
        <select name="txtMonth" id="txtMonth">
            <option disabled selected value="0">Select Month</option>
            <option value="1">JAN</option>
            <option value="2">FEB</option>
            <option value="3">MAR</option>
            <option value="4">APR</option>
            <option value="5">MAY</option>
            <option value="6">JUN</option>
            <option value="7">JUL</option>
            <option value="8">AUG</option>
            <option value="9">SEP</option>
            <option value="10">OCT</option>
            <option value="11">NOV</option>
            <option value="12">DEC</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Show Calender" >
    </form>



<?php
session_start();
$year = 0;
$month = 0;

function showCalender($month,$year){
    echo "<h1>!!!Calender!!!</h1><hr>";
    $day = 1;
$num = 1;
$jd = gregoriantojd($month,$day,$year);
$dayName = jddayofweek($jd,0);
$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
$count = 0;
echo "<table>";
echo "<tr>";
echo "<td>";
    echo "Sunday";
echo "</td>";
echo "<td>";
    echo "Monday";
echo "</td>";
echo "<td>";
    echo "Tuesday";
echo "</td>";
echo "<td>";
    echo "Wednesday";
echo "</td>";
echo "<td>";
    echo "Thursday";
echo "</td>";
echo "<td>";
    echo "Friday";
echo "</td>";
echo "<td>";
    echo "Saturday";
echo "</td>";
echo "</tr>";
for($i = 1;$i <= 5;$i++){
echo "<tr>";
for($j = 1;$j <= 7;$j++){
    if($j <= $dayName && $i==1){
        echo "<td>";
        echo " ";
        echo "</td>";
    }else{
        if($num <= $days){
            echo "<td>";
            echo $num;
            echo "</td>";
            $num++;
        }else{
            echo "<td>";
        echo " ";
        echo "</td>";
        }
    }    
}
echo "</tr>";
}
echo "</table>";
$_SESSION['txtYear'] = $year;
$_SESSION['txtMonth'] = $month;
}

if(!empty($_SESSION['txtMonth']) && !empty($_SESSION['txtYear'])){
    $year = $_SESSION['txtYear'];
    $month = $_SESSION['txtMonth'];  
}
if(isset($_POST['txtYear']) && isset($_POST['txtMonth'])){
            $year = $_POST['txtYear'];
            $month = $_POST['txtMonth'];   
           
            
            
}
showCalender($month,$year);
    

/**if(isset($_POST['txtYear']) && isset($_POST['txtMonth'])){
    if(empty($_POST['txtYear']) && empty($_POST['txtMonth'])){
        echo "<h2>Enter All required fields</h2>";
    }else{
        
        }**/

?>
</body>
</html>