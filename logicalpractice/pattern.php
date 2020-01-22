<?php


function patternOne($n){
    
    for($i = $n;$i >= 0;$i=$i-2){
        
        for($j = 0;$j <= $i;$j++){
            echo "*"." ";
        }
        echo "<br>";
    }
    
}
patternOne(10);

function patternTwo($n){
    for($i = $n;$i >= 0;$i--){
        for($j = 1;$j <= $i;$j++){
            echo $j." ";
        }
        echo "<br>";
    }
}

patternTwo(8);

function patternThree($n){
    for($i = 0;$i <= $n;$i++){
        for($j = 0;$j <= $i;$j++){
            echo "*"." ";
        }
        echo "<br>";
    }
}

patternThree(10);

function patternFour($n){
    for($i = 0;$i <= $n;$i++){
        for($j = 1;$j <= $i;$j++){
            echo $j." ";
        }
        echo "<br>";
    }
}
patternFour(10);

echo "<br>";

function patternFive($num){
    for($i = 1;$i <= 4;$i++){
       for($j = $i;$j <= $num;$j = $j+4){
           echo $j." ";
       }
       echo "<br>";
    }
}
patternFive(12);

echo "<br>";
function patternSix(){
    $c = 0;
    for($row = 1;$row <= 5;$row++){
        for($col = 1;$col <= $row + $c;$col++){
            echo "*";
        }
        
        $c = $row + $c;
        for($j = 1;$j <= $row;$j++){
            echo "0";
        }
        echo "<br>";
    }
    
}
patternSix();
echo "<br>";

function patternFloyd(){
    $c = 1;
    for($i = 1;$i <= 5;$i++){
        for($j = 1;$j <= $i;$j++){
            echo $c." ";
            $c = $c + 1;
        }
        echo "<br>";
    }
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
