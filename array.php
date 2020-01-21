<?php

include 'header.php';
include_once 'header.php';

echo "<h1>Simple Array</h1>";
$laptopBrands = array('Dell','Lenovo','Hp');
$otherBrands = array('Acer','Mi','Apple');
print_r($laptopBrands);
echo count($laptopBrands);
for($i = 0;$i < count($otherBrands);$i++){
    $laptopBrands[count($laptopBrands)] = $otherBrands[$i];
}
print_r($laptopBrands);


echo "<h1>Associative Array</h1>";
$studentNames = array('Keyur','Nikunj','Hardik','Mahesh');
$assignedRollNum = array();
$count = 1;
foreach($studentNames as $n){
    $assignedRollNum[$n] = 'CE'.$count;
    $count++;
}
print_r($assignedRollNum);
echo "<br>Hardik roll number is ".$assignedRollNum['Hardik'];

echo "<h1>Multidimensional Array</h1>";

$food = array(
    'healthy' => array('Salad','Oats','Fruits','Green-Tea'),
    'unhealthy' => array('Ice-Cream','Pizza','Wafers','Maggie')
);
print_r($food);

echo "<h4>Healthy Food</h4>";
echo "<ul>";
foreach($food['healthy'] as $h){
    echo "<li>".$h."</li>";
}
echo "</ul>";
echo "<h4>Unhealthy Food</h4>";
echo "<ul>";
foreach($food['unhealthy'] as $uh){
    echo "<li>".$uh."</li>";
}
echo "</ul>";

$cars = array(
    array('Volvo','xc90','Automatic'),
    array('Audi','R8','Automatic'),
    array('Mahindra','Thar','Manual'),
    array('Toyota','Fortuner','Manual')
);

echo "<table border = 2>";
    echo "<tr>";
        echo "<th>";
            echo "Brand";
        echo "</th>";
        echo "<th>";
            echo "Model";
        echo "</th>";
        echo "<th>";
            echo "Transmission Type";
        echo "</th>";
    echo "</tr>";
    foreach($cars as $c){
        echo "<tr>";
        foreach($c as $i){
            echo "<td>";
            echo $i;
            echo "</td>";
        }
        echo "</tr>";
    }

echo "</table>";

?>