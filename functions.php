<?php


    function printName(){
        echo "My Name is Keyur Solanki";
    }
    printName();

    $name = "Keyur Solanki";
    function printNameTwo($name){
        echo "My name is $name";
    }
    printNameTwo($name);
    printNameTwo("Keyur");

    function printSum($num1,$num2){
        echo "Sum is ".($num1+$num2);
    }
    printSum(20,30);

    function sum($num1,$num2){
        return $num1+$num2;
    }

    function divide($num1,$num2){
        return $num1/$num2;
    }

    echo divide(10,2);

    echo divide(sum(10,20),sum(1,1));


?>