<?php

require  '/vendor/autoload.php';

class Ad
{
    private string $email, $category, $title, $description;

    public function __construct(string $email, string $category, string $title, string $description) 
    {
        $this->email = $email;
        $this->category = $category;
        $this->title = $title;
        $this->description = $description;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getCategory()
    {
        return $this->category;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
}
class View
{
    public function renderAds(array $ads, array $categories)
    {
        $html = file_get_contents('index.html');
        $categoriesHtml = "";
        foreach ($categories as $category) {
            $categoriesHtml .= "<option value='$category'>$category</option>";
        }
        $html = str_replace('<!-- $CATEGORIES$ -->', $categoriesHtml, $html);
        $tableHtml = "";
        foreach ($ads as $ad) {
            $tableHtml .= "<tr> <td>" . $ad->getCategory() . "</td> <td>". $ad->getTitle() ." </td> <td>". $ad->getDescription() ." </td> <td> ". $ad->getEmail() ." </td> </tr>";
        }
        $html = str_replace('<!-- $TABLE$ -->', $tableHtml, $html);

        echo $html;
    }
}


class MySql
{
    private mysqli $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('db', 'root', 'helloworld', 'web');
        if (mysqli_connect_errno())
            throw new mysqli_sql_exception();
    }
    public function saveAd(Ad $ad)
    {
        $statement = $this->mysqli->prepare("INSERT INTO ad (email, title, description, category) VALUES (?, ?, ?, ?)");
        $email = $ad->getEmail();
        $title = $ad->getTitle();
        $description = $ad->getDescription();
        $category = $ad->getCategory();
        
        if($statement->bind_param("ssss", $email, $title, $category, $description)===false || $statement->execute()===false || $statement->close()===false)
            throw new mysqli_sql_exception();
        
    }
    public function getAds()
    {
        $adsArr = [];
        if ($result = $this->mysqli->query('SELECT * FROM ad')){
            while($row = $result->fetch_assoc())
                $adsArr[] = new Ad($row["email"], $row["category"], $row["title"], $row["description"]);
                
            $result->close();
        }
        return $adsArr;
    }
    public function getCategories()
    {
        $categories = [];
        if ($result = $this->mysqli->query('SELECT category FROM categories')){
            while($row = $result->fetch_assoc())
                $categories[] = $row["category"];
            $result->close();
        }
        return $categories;
    }
}

class Controller
{
    private View $view;
    private MySql $mysql;
    public function __construct()
    {
        $this->view = new View();
        $this->mysql = new MySql();
    }
    public function get()
    {
        $this->view->renderAds($this->mysql->getAds(), $this->mysql->getCategories());
    }
    public function post()
    {
        if (empty($_POST["email"]) || empty($_POST["title"]) || empty($_POST["description"]) || empty($_POST['category'])){
            echo "Error (ha-ha)";
            return;
        }

        $this->mysql->saveAd(new Ad($_POST["email"], $_POST['category'], $_POST["title"], $_POST["description"]));
        $this->view->renderAds($this->mysql->getAds(), $this->mysql->getCategories());
    }
}

$controller = new Controller();
try {
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $controller->get();
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->post();
    }
} catch (\Throwable $th) {
    echo "Error he-he";
}
