<?PHP
	session_start();
    include("install.php");
	if ($_POST["delete_x"])
	{
		$str = unserialize(file_get_contents("baskets"));
		unset($str[session_id()]);
		session_unset();
		file_put_contents("baskets", serialize($str));
		header("Location: index.php");
	}
?>


<html>
 <head>
 	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "styles.css">
  <title>BEST EVA SHOP</title>
 </head>
<body>
	<div class = "op">
	<h1 align="center"> TURBOSHMOT.COM</h1><br>
</div>
	<div id="log">
	<a href="basket.php"><table><tr class = "catalog"><td> Корзина <td><?PHP include("minimal.php")?></a><br><br>
	
	<?PHP   if (!($_SESSION["login"]))
                include("login.php");
            else
                echo "<div>".$_SESSION["login"]."</div>
    <form action=\"index.php\" method = \"POST\"><a href=\"cabinet.php\">Личный кабинет</a><br>
        <input type = \"image\" src = \"http://s1.iconbird.com/ico/0612/vistabasesoftwareicons/w128h1281339252558DeleteRed2.png\" name = \"delete\" value=\"Выйти\" height = 30>
	</form> "; ?>
	</div>
	<form method = "POST" action="index.php">
		<input type="submit" name="submit" value = "Открыть каталог"/></form>
		<?PHP if ($_POST["submit"]) include("catalog.php"); ?>
	</form>
	<div id = "al">
   		<a href="contacts.php"> КОНТАКТЫ </a><br>
	</div>	
	<div>

	</div>
	</div>
</body></html>