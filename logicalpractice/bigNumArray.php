<?php
function bigNumArray($numArray){
    $bigNum = $numArray[0];
    foreach($numArray as $n){
        if($bigNum < $n){
            $bigNum = $n;
        }
    }
    return $bigNum;
}
$numArray = [1,5,6,15,19,25,70,8,75];
echo bigNumArray($numArray)."<br>";
function secHighNum($numArray){
    $num = $numArray[0];
    $high = bigNumArray($numArray);
    foreach($numArray as $n){
        if($n > $num && $n < $high){
            $num = $n;
        }
    }
    return $num;
}

echo secHighNum($numArray);
?>