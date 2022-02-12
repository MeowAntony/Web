<?php
$str = "x";
for ($i = 0; $i < 20; $i++) { 
    echo nl2br("$str\n");
    $str .= "x";
}
