<?php

require  '/vendor/autoload.php';

$mysqli = new mysqli('db', 'root', 'helloworld', 'web');
if (mysqli_connect_errno()){
    printf("Подключение к серверу MySQL невозможно");
    exit;
}

if(isset($_POST["add"])){
    if ( !empty($_POST["email"] ) && !empty($_POST["header"] ) && !empty($_POST["text"])){
        $email = $_POST["email"];
        $title = $_POST["header"];
        $description = $_POST["text"];
        $category = $_POST['category'];
        $mysqli->query("INSERT INTO ad (email, title, description, category) VALUES ('$category', '$title', '$description', '$category')");
    }
}

$mas_files = [];
$categories = [];



$TABLE =    '<table border="1">
            <caption>Таблица объявлений</caption>
            <tr>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Текст</th>
                <th>Почта</th>
            </tr>';

// Загрузка категорий
if ($result = $mysqli->query('SELECT category FROM categories')){
    while($row = $result->fetch_assoc()){
        array_push($categories, $row["category"]);
    }
    $result->close();
}

// Загрузка таблицы
if ($result = $mysqli->query('SELECT * FROM ad')){
    while($row = $result->fetch_assoc()){
        $category = $row["category"];
        $title = $row["title"];
        $text = $row["description"];
        $email = $row["email"];
        $TABLE .= "<tr> <td> $category </td> <td> $title </td> <td> $text </td> <td> $email </td> </tr>";
    }
    $result->close();
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