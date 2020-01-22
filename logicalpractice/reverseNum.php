<?php
function revNumber($num){
    $r = 0;
    while($num != 0){
        $r = $r * 10;
        $r = $r + ($num%10);
        $num = (int)($num / 10);
    }
echo $r;
}
revNumber(123);
?>