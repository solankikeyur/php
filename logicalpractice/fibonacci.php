<?php

//0,1,1,2,3,5

$start = 0;
$next = 1;
echo $start."<br>";
echo $next."<br>";
for($i = 1;$i <= 5;$i++){
    $second = $start + $next;
    echo $second."<br>";
    $start = $next;
    $next = $second;
}

?>