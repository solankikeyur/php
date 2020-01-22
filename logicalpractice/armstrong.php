<?php

function checkArmStrong($num){
    $n = (string)$num;
    $result = 0;
    for($i = 0;$i < strlen($n);$i++){
        $f = (int)$n[$i];
        $cube = $f * $f * $f;
        $result = $result + $cube;
    }

    if($num == $result){
        echo "Number is Armstrong";
    }else{
        echo "Number is not armstrong";
    }
}

checkArmStrong(37);


?>