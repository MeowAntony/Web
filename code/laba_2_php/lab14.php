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
    echo nl2br("Делится. Результат: " . ($a / $b) . "\n");
}
else {
    echo nl2br("Делится с остатком. Остаток: " . ($a % $b) . "\n");
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
echo nl2br("answer = " . sqrt($sum_numbers));


