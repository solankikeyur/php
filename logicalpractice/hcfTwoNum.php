<?php
function hcfTwoNum($num1,$num2){
    $ans = 1;
    $loop = 1;

    if($num1 < $num2){
        $loop = $num1;
    }else{
        $loop = $num2;
    }

    for($i = 1;$i <= $loop;$i++){
        if($num1%$i == 0){
            if($num2%$i == 0){
                if($ans < $i){
                    $ans = $i;
                }
            }
        }
    }
    return $ans;
}

?>