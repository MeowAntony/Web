<?php

$a = 10;
$b = 3;
# 10 - 3 = 7
# 7 - 3 = 4
# 4 - 3 = 1
echo nl2br($a % $b . "\n");

$a = 2000;
$b = 16;
if ($a % $b === 0) {
    echo nl2br("Делится. Результат: " . ($a / $b) . "\n\n");
}
else {
    echo nl2br("Делится с остатком. Остаток: " . ($a % $b) . "\n\n");
}


$st = pow(2, 10);
echo nl2br("2^10 = " . $st . "\n");

echo nl2br("sqrt(245) = " . sqrt(245) . "\n");

$array = [
    4, #16 4 25 361 169 0 100
    2, 
    5,
    19,
    13,
    0,
    10
];
$sum_numbers = 0;
foreach ($array as $value) {
    $sum_numbers += $value ** 2;
}
echo nl2br("answer = " . sqrt($sum_numbers) . "\n\n");


$sqrt379 = sqrt(379);
echo nl2br("0. = " . round($sqrt379, 0) . "\n");
echo nl2br("0.0 = " . round($sqrt379, 1) . "\n");
echo nl2br("0.00 = " . round($sqrt379, 2) . "\n");

$sqrt587 = sqrt(587);
$arr = [
    "floor" => floor($sqrt587),
    "ceil" => ceil($sqrt587)
];
echo nl2br("floor = " . $arr['floor'] . ", ceil = " . $arr['ceil'] . "\n\n");


$arr_new = [
    4,
    -2,
    5,
    19,
    -130,
    0,
    10
];
echo nl2br("min = " . min($arr_new) . ", max = " . max($arr_new) . "\n\n");


echo nl2br(rand(1, 100) . "\n");

$arr_num = [];
echo "arr = ";
for ($i = 0; $i < 10; $i++) { 
    $arr_num[$i] = rand(1, 100);
    echo $arr_num[$i] . ', ';
}
echo nl2br("\n\n");


$a = 1;
$b = 5;
echo nl2br(abs($a - $b) . "\n");
$a = 15;
$b = 561;
echo nl2br(abs($a - $b) . "\n") ;
$a = 3;
$b = 3;
echo nl2br(abs($a - $b) . "\n");

$mas = [
    1, 
    2, 
    -1, 
    -2, 
    3, 
    -3
];
$mas_new = [];
echo "mas = ";
for ($i = 0; $i < sizeof($mas); $i++) { 
    $mas_new[$i] = abs($mas[$i]);
    echo $mas_new[$i] . ", ";
}
echo nl2br("\n\n");

$number = 36;
$index = 0;
$mas = [];
for ($i = 1; $i <= $number; $i++) { 
    if ($number % $i == 0) {
        $mas[$index] = $i;
        $index += 1;
    }
}
echo "Делители = ";
for ($i = 0; $i < sizeof($mas); $i++) { 
    echo $mas[$i] . ' ';
}
echo nl2br("\n");
$mas = [
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
    10
];
$need_sum = 0;
$sum = 0;
for ($i = 0; $i < 10; $i++) { 
    $sum += $mas[$i];
    $need_sum++;
    if ($sum > 10) {
        break;
    }
}
echo "Количество нужных чисел: " . $need_sum;