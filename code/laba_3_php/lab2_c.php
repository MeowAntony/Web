<?php 
session_start();

if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["salary"]) && isset($_POST["pet"])) {
    $_SESSION["mas"] = [
        "name" => $_POST["name"],
        "age" => $_POST["age"],
        "salary" => $_POST["salary"],
        "pet" => $_POST["pet"]
    ];
    
    header('Location: ./lab2_c_info.php');
}
else{   
    echo "Error";
}
