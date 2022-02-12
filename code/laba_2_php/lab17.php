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

$mas = [
    2,
    5,
    3,
    9
];
$result = $mas[0] * $mas[1] + $mas[2] * $mas[3];
echo nl2br("result = $result\n");

$mas = [
    "name" => "Антон",
    "surname" => "Смирнов",
    "patronymic" => "Сергеевич"
];
echo nl2br("ФИО: " . $mas["surname"] . ' ' . $mas["name"] . ' ' . $mas["patronymic"] . "\n");

$date = [
    "year" => 2022,
    "month" => 2,
    "day" => 12
];
echo nl2br($date["year"] . "-" . $date["month"] . "-" . $date["day"] . "\n");

$arr = ['a', 'b', 'c', 'd', 'e'];
echo nl2br("Count: " . sizeof($arr) . "\n");
#либо
$count = 0;
foreach ($arr as $value) {
    $count += 1;
}
echo nl2br("Count: $count\n");

$arr = ['a', 'b', 'c', 'd', 'e'];
# находим количество элементов
$count = 0;
foreach ($arr as $value) {
    $count += 1;
}
echo nl2br("Last: " . $arr[$count - 1] . "\n");
echo nl2br("PreLast: " . $arr[$count - 2] . "\n");
