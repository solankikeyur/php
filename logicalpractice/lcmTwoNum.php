<?php

require_once "hcfTwoNum.php";

function lcmTwoNum($num1,$num2){
    
    echo "HCF is ".hcfTwoNum($num1,$num2)."<br>";
    $result = ($num1*$num2) / hcfTwoNum($num1,$num2);
    echo "LCM is ".$result;

}
lcmTwoNum(10,20);
?>