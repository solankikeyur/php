<?php

$numArray = [1,5,2,8,9,-1,0,75,55];

$count = count($numArray);
for($i = 0;$i < $count;$i++){

    for($j = 0;$j < $count-1;$j++){
        if($numArray[$j] > $numArray[$j+1]){
            $temp = $numArray[$j];
            $numArray[$j] = $numArray[$j+1];
            $numArray[$j+1] = $temp;
        }
    }
}

print_r($numArray);

?>