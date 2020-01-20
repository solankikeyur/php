<?php

$count = 0;
while($count <= 10){
    echo $count;
    $count++;
}


$l =5;
/*do{
   echo "Age is $l";
   $l++;
}while($l<=18);*/

do{
    echo "number is $l";
    $l++;
}while($l<=5);


for($i=0;$i<=10;$i++){
    echo "i value is $i <br>";
}

$colors = array("red","blue","green","yellow");

foreach($colors as $c){
    echo "colour is $c<br>";
}

?>