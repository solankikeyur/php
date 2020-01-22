<?php

function smallNumArray($numArray){
    $smallNum = $numArray[0];
    foreach($numArray as $n){
        if($n < $smallNum){
            $smallNum = $n;
        }
    }

    echo $smallNum;

}
$numArray = [5,71,4,6,8,0];
smallNumArray($numArray);
?>