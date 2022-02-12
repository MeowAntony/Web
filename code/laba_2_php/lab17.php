<?php

$mas = [];
$nowStr = "x";
echo "mas = ";
for ($i = 0; $i < 8; $i++) { 
    $mas[$i] = $nowStr;
    $nowStr .= "x";
    echo $mas[$i] . " ";
}
echo nl2br("\n");

function arrayFill($str, $num) {
    $answer = [];
    for ($i = 0; $i < $num; $i++) { 
        $answer[$i] = $str;
    }
    return $answer;
}
$arr = arrayFill("a", 6);
echo "mas = ";
for ($i = 0; $i < sizeof($arr); $i++) { 
    echo $arr[$i] . " ";
}
echo nl2br("\n");

$mas = [
    [1, 2, 3],
    [4, 5],
    [6]
];
$sum = 0;
for ($i = 0; $i < sizeof($mas); $i++) { 
    for ($j = 0; $j < sizeof($mas[$i]); $j++) { 
       $sum += $mas[$i][$j];
    }
}
echo nl2br("sum = $sum \n");

$mas = [];
$index_now = 1;
for ($i = 0; $i < 3; $i++) {
    $mas[$i] = [];
    for ($j = 0; $j < 3; $j++) { 
        $mas[$i][$j] = $index_now;
        $index_now += 1;
    }
}