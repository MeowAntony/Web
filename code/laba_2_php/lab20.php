<?php

$mas = [
    51,
    15,
    24,
    16,
    37
];
function req1($mas, $index) {
    $sum = $mas[$index];
    if (sizeof($mas) > $index + 1) {
        $sum += req1($mas, $index + 1);
    }
    return $sum;
}
echo nl2br((req1($mas, 0) / sizeof($mas)) . "\n");

function req2($now) {
    if ($now <= 100){
        return $now + req2($now + 1);
    }
    return 0;
    
}
echo nl2br(req2(1) . "\n");

$mas = [
    1,
    4,
    9,
    16,
    25,
    36,
    49
];
$mas_new = [];
function req3($mas, $index, &$mas_new) {
    $mas_new[$index] = sqrt($mas[$index]);
    if (sizeof($mas) > $index + 1) {
        req3($mas, $index + 1, $mas_new);
    }
}
req3($mas, 0, $mas_new);
echo "mas = ";
foreach ($mas_new as $value) {
    echo "$value ";
}
echo nl2br("\n");

$mas = [];
function req4(&$mas, $index) {
    $mas[chr(ord('a') + $index)] = $index + 1;
    if ($index < 25) {
        req4($mas, $index + 1);
    }
}
req4($mas, 0);
foreach ($mas as $key => $value) {
    echo nl2br("$key => $value\n");
}

$str = '1234567890';
$sum = 0;
function req5($str, &$sum, $index) {
    $num = intval(substr($str, $index, 2));
    $sum += $num;
    if ($index + 2 < strlen($str)) {
        req5($str, $sum, $index + 2);
    }
}
req5($str, $sum, 0);
echo nl2br("sum = $sum");