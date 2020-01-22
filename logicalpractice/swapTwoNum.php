<?php

function swapTwoNum($num1,$num2){
    echo "Before Swap: <br>";
    echo "num1 = $num1 and num2 = $num2<br>";
    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;
    echo "After Swap: <br>";
    echo "num1 = $num1 and num2 = $num2";
}

swapTwoNum(10,20);

?>