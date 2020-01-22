<?php

function findTable($num){
    for($i = 1;$i <= 10;$i++){
        echo "$num x $i = ".($num*$i);
        echo "<br>";
    }
}

findTable(17);

?>