<?php

if(isset($_POST["add"])){
    if ( !empty($_POST["email"] ) && !empty($_POST["header"] ) && !empty($_POST["text"])){
        $fp = fopen("categories/" . ($_POST['category']) . '/' . ($_POST["header"]) . '.txt', 'w+');
        fwrite($fp, $_POST["text"]);
        fclose($fp);

    }
}

$mas_files = [];
$categories = [];
$dir = opendir('categories');



$TABLE =    '<table border="1">
            <caption>Таблица объявлений</caption>
            <tr>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Текст</th>
            </tr>';

while ($file = readdir($dir)) {
    if (is_dir('categories/' . $file) && $file != '.' && $file != '..'){
        array_push($categories, $file);

        foreach (scandir('categories/' . $file) as $file_info){
            if ($file_info != '.' and $file_info != '..'){
                $text = file_get_contents("categories/$file/$file_info");
                $header = explode('.', $file_info)[0];
                $TABLE .= "<tr> <td> $file </td> <td> $header </td> <td> $text </td> </tr>";
            }
        }

        
    }
}

$TABLE .= '</table>';

$CATEGORIES_ALL = "<select name='category'>";
foreach ($categories as $value) {
    $CATEGORIES_ALL .= "<option value='$value'>$value</option>";
}
$CATEGORIES_ALL .= "</select>";


?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="POST">
            <p>
                Введите данные:
            </p>
            <p>
                Email: 
                <input type="text" name="email" value="">
            </p>
            <p>
                Выбор категории:
                <?php
                    echo $CATEGORIES_ALL;
                ?>
            </p>
            <p>
                Заголовок объявления:
                <input type="text" name="header" value="">
            </p>
            <p>
                Текст объявления:
                <input type="text" name="text" value="">
            </p>
            <p>
                <input type="submit" value="Добавить" name="add">
            </p>
        </form>
        <?php
            echo $TABLE;
        ?>
    </body>
</html>