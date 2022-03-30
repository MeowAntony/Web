<?php
require  '../../vendor/autoload.php';



/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient()
{
    $client = new Google\Client();
    $client->setApplicationName("Chebunet");
    $client->setScopes(Google\Service\Sheets::SPREADSHEETS);
    $client->useApplicationDefaultCredentials();

    return $client;
}


// Get the API client and construct the service object.
$client = getClient();
$service = new Google_Service_Sheets($client);

// Prints the names and majors of students in a sample spreadsheet:
// https://docs.google.com/spreadsheets/d/1aK38SirtYsDzqHvKyDgDWstIleRuldK7LyKMxZHSULw/edit
$spreadsheetId = '1aK38SirtYsDzqHvKyDgDWstIleRuldK7LyKMxZHSULw';

if(isset($_POST["add"])){
    if ( !empty($_POST["email"] ) && !empty($_POST["header"] ) && !empty($_POST["text"])){
        $response = $service->spreadsheets_values->get($spreadsheetId, "A1:D");
        $values = $response->getValues();
        $new_row = sizeof($values) + 1;
        $new_cells = [[
            0 => $_POST['category'],
            1 => $_POST["header"],
            2 => $_POST["text"],
            3 => $_POST["email"]
        ]];
        $insertion_range = "A{$new_row}:D${new_row}";
        $request_body = new Google_Service_Sheets_ValueRange(["values" => $new_cells]);
        $request_params = ["valueInputOption" => "RAW"];
        $response = $service->spreadsheets_values->update($spreadsheetId, $insertion_range, $request_body, $request_params);

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
$response = $service->spreadsheets_values->get($spreadsheetId, "F1:F");
$values = $response->getValues();
if ($values != NULL) {
    foreach ($values as $value) {
        array_push($categories, $value[0]);
    }
}

// Загрузка таблицы
$response = $service->spreadsheets_values->get($spreadsheetId, "A1:D");
$values = $response->getValues();
if ($values != NULL) {
    foreach ($values as $value) {
        $category = $value[0];
        $title = $value[1];
        $text = $value[2];
        $email = $value[3];
        $TABLE .= "<tr> <td> $category </td> <td> $title </td> <td> $text </td> <td> $email </td> </tr>";
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