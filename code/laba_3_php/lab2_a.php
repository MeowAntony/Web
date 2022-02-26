<?php

# только англ text =(
echo nl2br("Количество слов: " . (str_word_count($_POST["comment"])) . "\n");
echo nl2br("Количество символов: " . strlen(($_POST["comment"])) . "\n");


