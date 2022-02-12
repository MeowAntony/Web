<?php

function increaseEnthusiasm(string $str) {
    return $str . "!";
}

echo nl2br(increaseEnthusiasm("Привет") . "\n");

function repeatThreeTimes(string $str) {
    return $str . $str . $str;
}

echo nl2br(repeatThreeTimes("Пока")  . "\n");

echo nl2br(increaseEnthusiasm(repeatThreeTimes("Позитив")) . "\n");

function cut(string $str, int $count = 10) {
    $str_new = "";
    for ($i = 0; $i < $count; $i++) { 
        $str_new .= $str[$i];
    }
    return $str_new;
}
echo nl2br(cut("Hello", 3) . "\n");

$arrGlobal = [
    1,
    2,
    3,
    4,
    5,
    6
];
function req($arr, $now) {
    echo $arr[$now] . " ";
    if ($now + 1 < sizeof($arr)) {
        req ($arr, $now + 1);
    }
}
echo "mas = ";
echo nl2br(req($arrGlobal, 0) . "\n");

$number = 255;
function fun(int $num) {
    $sum = 0;
    while ($num != 0) {
        $sum += $num % 10;
        $num /= 10;
    }
    if ($sum > 9) {
        return fun($sum);
    }
    else {
        return $sum;
    }
}
echo fun($number);