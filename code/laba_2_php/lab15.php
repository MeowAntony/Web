<?php

function printStringReturnNumber() {
    echo nl2br("This is function \n");
    return 19;
}

$my_num = printStringReturnNumber();
echo "return = $my_num";