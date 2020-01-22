<?php
function primeNum($num){
    for($i = 2;$i < $num;$i++){
        if($num%$i == 0){
            return 0;
            break;
        }else{
            return 1;
        }
    }
}
$flag = primeNum(18);
if($flag == 0){
    echo "Not Prime";
}else{
    echo "Prime";
}


?>