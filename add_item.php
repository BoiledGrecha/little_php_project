<?PHP
    session_start();
    if (!($_SESSION["status"] === "adm"))
        exit("<html><head><title>ERROR</title> </head> <body><div style=\"text-align: center\"><h1> You dont have enougth permits.</h1><img src = \"imgs/urist.JPG\" height = 1000><br><a href = \"index.php\">НА ГАЛВНУЮ</a></div></body></html>");
    if ($_POST["address"] && $_POST["color"] && $_POST["gender"] && $_POST["type"] && $_POST["name"] && $_POST["price"])
    {
        $str = file_get_contents("items");
        $str = unserialize($str);
        $str[]=array("address" => $_POST["address"], "name" => $_POST["name"], "price" => $_POST["price"],
            "color" => $_POST["color"], "gender" => $_POST["gender"],
            "type" => $_POST["type"], "description" => $_POST["description"]);
        $str = serialize($str);
        file_put_contents("items", $str);
    }
?>

<html><head>
  <title>BEST EVER SHOP</title>
 </head><body>
    <form method = "POST" action = "add_item.php">
        Адрес картинки: <input type="text" name = "address"/><br>
        Название: <input type="text" name = "name" /><br>
        Цена (в рублях): <input type="text" name = "price" /><br>
        Цвет изделия: <input type="text" name = "color" /><br>
        Пол(M/F/UNI): <input type="text" name = "gender" /><br>
        Тип изделия: <input type="text" name = "type" /><br>
        Описание (не обязательно): <input type="text" name = "description" /><br>
        <input type="submit" name="submit" value = "OK" /> 
    </form>
</body></html>

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