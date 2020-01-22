<?php
function factorialNum($num){
    $ans = 1;
    for($i = 0;$i < $num;$i++){
        $ans = $ans * ($num - $i);
    }
    echo $ans;
}
factorialNum(5);
?>