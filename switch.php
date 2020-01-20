<?php

$day = "saturday";

echo "died";

$string ="my name is keyur";

switch($day){
    case "sunday":
        echo "Its a weekend";
    break;
    case "saturday":
        echo "Its a weekend";
    break;
    default:
        echo "Its not a weekend";
    break;
}

if(preg_match("/keyur/",$string)){
    echo "Yes present";
}

?>