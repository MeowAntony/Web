<?php

function check10(int $num1, int $num2) {
    return $num1 + $num2 > 10 ? TRUE : FALSE ;
}
echo nl2br((check10(5, 6) ? "true" : "false") . "\n");

function equal(int $num1, int $num2) {
    return $num1 === $num2 ? TRUE : FALSE ;
}
echo nl2br((equal(5, 5) ? "true" : "false") . "\n");

$test = 0;
echo $test == 0 ? "верно": "";
echo nl2br("\n");

$age = 56;
if ($age < 10 || $age > 99) {
    echo nl2br("Число не входит в диапазон (10;99) \n");
}
else {
    $sum = 0;
    while ($age != 0) {
        $sum += $age % 10;
        $age /= 10;
    }
    if ($sum > 9) {
        echo nl2br("Сумма цифр двузначна \n");
    }
    else {
        echo nl2br("Сумма цифр однозначна \n");
    }
}

$arr = [
    1, 
    2, 
    3
];
if (sizeof($arr) === 3) {
    echo $arr[0] + $arr[1] + $arr[2];
}