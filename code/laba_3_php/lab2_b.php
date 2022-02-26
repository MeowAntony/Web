<?php 
session_start();

if (isset($_POST["name"]) && isset($_POST["fname"]) && isset($_POST["age"])) {
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["fname"] = $_POST["fname"];
    $_SESSION["age"] = $_POST["age"];

    header('Location: ./lab2_b_info.php');
}
else{   
    echo "Error";
}


