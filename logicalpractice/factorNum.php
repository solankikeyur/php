<?php

function factorNum($num){
    $factors = [];
    for($i = 1;$i <= $num;$i++){
        if($num%$i == 0){
            $factors[$i] = $i;
        }
    }
    echo "Factors for $num are ";
    foreach($factors as $f){
        echo $f."  ";
    }
}

factorNum(10);

?>