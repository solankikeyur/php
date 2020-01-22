<?php

function leapYear($year){
    if($year%4 == 0){
        echo "Its Leap Year";
    }else{
        echo "Its Not a leap year";
    }
}

leapYear(2001);
?>