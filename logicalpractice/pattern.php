<?php


function patternOne($n){
    echo "<table border = 2>";
    for($i = $n;$i >= 0;$i=$i-2){
        echo "<tr>";
        for($j = 0;$j <= $i;$j++){
            echo "<td>";
            echo "*";
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    
}
patternOne(10);

function patternTwo($n){
    echo "<table border = 2>";
    for($i = $n;$i >= 0;$i--){
        echo "<tr>";
        for($j = 1;$j <= $i;$j++){
            echo "<td>";
            echo $j;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

patternTwo(9);

function patternThree($n){
    echo "<table border=2>";
    for($i = 0;$i <= $n;$i++){
        echo "<tr>";
        for($j = 0;$j <= $i;$j++){
            echo "<td>";
            echo "*";
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

patternThree(10);

function patternFour($n){
    echo "<table border = 2>";
    for($i = 0;$i <= $n;$i++){
        echo "<tr>";
        for($j = 1;$j <= $i;$j++){
            echo "<td>";
            echo $j;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
patternFour(10);

echo "<br>";

function patternFive($num){
    echo "<table border = 2>";
    for($i = 1;$i <= 4;$i++){
        echo "<tr>";
       for($j = $i;$j <= $num;$j = $j+4){
           echo "<td>";
           echo $j;
           echo "</td>";
       }
       echo "</tr>";
    }
    echo "</table>";
}
patternFive(12);

echo "<br>";
function patternSix(){
    $c = 0;
    echo "<table border = 2>";
    for($row = 1;$row <= 5;$row++){
        echo "<tr>";
        for($col = 1;$col <= $row + $c;$col++){
            echo "<td>";
            echo "*";
            echo "</td>";
        }
        
        $c = $row + $c;
        for($j = 1;$j <= $row;$j++){
            echo "<td>";
            echo "0";
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    
}
patternSix();
echo "<br>";

function patternFloyd(){
    $c = 1;
    echo "<table border = 2>";
    for($i = 1;$i <= 5;$i++){
        echo "<tr>";
        for($j = 1;$j <= $i;$j++){
            echo "<td>";
            echo $c;
            echo "</td>";
            $c = $c + 1;
        }
        echo "</tr>";
    }
    echo "</table>";
}

patternFloyd();
echo "<br>";
function patternChess(){
    for($i = 1;$i <= 8;$i++){
        for($j = 1;$j <= 8;$j++){
            $box = $i+$j;
            if($box%2 == 0){
                echo "<img style='background-color:white' height='20' width='20'>";
            }else{
                echo "<img style='background-color:black' height='20' width='20'>";
            }   
            
            
        }
        echo "<br>";
    }
}

patternChess();

echo "<br>";
function outputTable(){
    echo "<table border=1>";
    for($row = 1;$row <= 6;$row++){
        echo "<tr>";
        for($col = 1;$col <= 5;$col++){
            echo "<td>";
            echo "$row X $col = ".($row*$col);
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
outputTable();

echo "<br>";
function numberTable(){
    
    echo "<table border=1>";
    for($row = 1;$row <= 10;$row++){
        echo "<tr>";
        for($col = 1;$col <= 10;$col++){
            echo "<td>";
            echo $row*$col;
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

numberTable();
?>
