<?PHP
    session_start();
    if (!($_SESSION["status"] === "adm"))
        exit("<html><head><title>ERROR</title> </head> <body> You dont have enougth permits. </body></html>");
    if ($_POST["del"] === "Delete Item")
    {
        $str = file_get_contents("items");
        $str = unserialize($str);
        unset($str[(int)$_POST["ID"]]);
        $str = serialize($str);
        file_put_contents("items", $str);
    }
    if ($_POST["submit"] === "Change")
    {
        $str = file_get_contents("items");
        $str = unserialize($str);
        $str[(int)$_POST["ID"]] = array("address" => $_POST["address"], "name" => $_POST["name"], "price" => $_POST["price"],
            "color" => $_POST["color"], "gender" => $_POST["gender"],
            "type" => $_POST["type"], "description" => $_POST["description"]);
        $str = serialize($str);
        file_put_contents("items", $str);
    }
    
    $str = file_get_contents("items");
    $str = unserialize($str);
    if (count($str) == 0)
        exit("<html><head><title> =( </title> </head> <body> Пока нет доступных товаров. <br><a href=\"add_item.php\">Добавить</a></body></html>");
   
    for ($j = 0; $j < count($str); $j++)
    {
        //добавить в начало саму картинку и наверное сделать табличкой
        $i = $str[$j];
        echo 
        "<form method = \"POST\" action = \"delete_item.php\">
            <input type=\"hidden\" name = \"ID\" value =".$j.">
            Адрес картинки: <input type=\"text\" name = \"address\" value =".$i["address"].">
            Название: <input type=\"text\" name = \"name\" value =".$i["name"].">
            Цена (в рублях): <input type=\"text\" name = \"price\" value =".$i["price"].">
            Цвет изделия: <input type=\"text\" name = \"color\" value =".$i["color"].">
            Пол(M/F/UNI): <input type=\"text\" name = \"gender\" value =".$i["gender"].">
            Тип изделия: <input type=\"text\" name = \"type\" value =".$i["type"].">
            Описание (не обязательно): <input type=\"text\" name = \"description\" value =".$i["description"].">
        <input type=\"submit\" name=\"submit\" value = \"Change\"/>
        <input type=\"submit\" name=\"del\" value = \"Delete Item\"><br>
    </form>";
    }
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "styles.css">
	<title>Корзина</title>
	</head>
	<body>
	<div class="op">
	</div>
	<div class="text" id="formain">
	<?php 
		if ($_SERVER[REQUEST_URI] !== "/index.php")
			echo '<a href="index.php"> На главную </a><br>';
	?>
	</div>
</body></html>