<?PHP
    session_start();
    if ($_SESSION["status"] === "adm")
    {
        echo "<html>
        <head>
         <title>BEST EVER SHOP</title>
        </head>
       <body>
           <h1> ADM PANEL</h1><br>
           <a href=\"add_item.php\">Добавить товар</a><br>
           <a href=\"delete_item.php\">Изменение и удаление товара</a><br>
           <a href=\"acc_list.php\">Управление учетными записями</a><br>
           <a href=\"manage_categories.php\">Управление категориями товаров</a><br>
           <a href=\"manage_orders.php\">Просмотр заказов</a><br>
        </body></html>";
    }
    else
        echo "<html><head><title>ERROR</title> </head> <body><div style=\"text-align: center\"><h1> You dont have enougth permits.</h1><img src = \"imgs/urist.JPG\" height = 1000><br><a href = \"index.php\">НА ГАЛВНУЮ</a></div></body></html>";
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
	</div>
</body></html>