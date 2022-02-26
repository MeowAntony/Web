<?php
session_start();


if (isset($_SESSION["mas"])) {
    echo "<ul>";
    foreach ($_SESSION["mas"] as $value) {
        echo nl2br("<li>" . ($value) . "</li>");
    }
    echo "</ul>";
}
else{
    echo "Error";
}

