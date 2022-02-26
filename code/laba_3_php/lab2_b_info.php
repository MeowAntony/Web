<?php
session_start();


if (isset($_SESSION["name"]) && isset($_SESSION["fname"]) && isset($_SESSION["age"])) {
    echo nl2br("Фамилия: " . ($_SESSION["fname"]) . "\n");
    echo nl2br("Имя: " . ($_SESSION["name"]) . "\n");
    echo nl2br("Возраст: " . ($_SESSION["age"]) . "\n");
}
else{
    echo "Error";
}

