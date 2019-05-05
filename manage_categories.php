<?PHP
session_start();
    if (!($_SESSION["status"] === "adm"))
        exit("<html><head><title>ERROR</title> </head> <body><div style=\"text-align: center\"><h1> You dont have enougth permits.</h1><img src = \"imgs/urist.JPG\" height = 1000><br><a href = \"index.php\">НА ГАЛВНУЮ</a></div></body></html>");
    $str = unserialize(file_get_contents("categories"));
    echo "<html><body>";
    
    if ($_POST["submit"] === "УДАЛИТЬ")
    {
        unset($str[$_POST["key"]]);
        file_put_contents("categories", serialize($str));
    }
    elseif ($_POST["submit"] === "ДОБАВИТЬ")
    {
        $str[$_POST["key"]] = $_POST["value"];
        file_put_contents("categories", serialize($str));
    }
    echo "<form action=\"manage_categories.php\" method = \"POST\">
        Ключ в массиве :<input type = \"text\" name = \"key\" value = \"\"><br>
        Как будет отображаться <input type = \"text\" name = \"value\" value = \"\">
        <input type = \"submit\" name = \"submit\" value = \"ДОБАВИТЬ\"></form>";
    foreach($str as $key => $value)
    {
        echo "<form action=\"manage_categories.php\" method = \"POST\"><div>".$key." => ".$value.
        "<input type = \"hidden\" name = \"key\" value = \"".$key."\">
        <input type = \"submit\" name = \"submit\" value = \"УДАЛИТЬ\"></form>";
    }
    echo "</body></html>";
?>