<?php
	session_start();
	if ($_POST['submit'] === "OK" && $_POST['login'] && $_POST['passwd'])
	{
		$passwd_file = file_get_contents("private/passwd");
		$passwd_file = unserialize($passwd_file);
		if (isset($passwd_file[$_POST['login']]))
			echo ("USER ALREADY EXISTS");
		else
		{
			$passwd_file[$_POST["login"]] = array("passwd" => hash("whirlpool", $_POST["passwd"]), "mail" => $_POST["mail"], "phone" => $_POST["phone"]);
			$passwd_file = serialize($passwd_file);
			file_put_contents("private/passwd", $passwd_file);
			$_SESSION["login"] = $_POST["login"];
			header('Location: index.php');
		}
	}
	elseif ($_POST["submit"] === "OK")
	{
		echo ("Ник и Пароль обязательно должны быть заполнены");
	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "styles.css">
	<title>Регистрация</title>
	</head>
	<body>
	<div class="op" id="reg">
	<form method="POST" action="register.php" class="rr">
		<label>Ник: <input type="text" name="login" value="" /></label>
		<br />
		<label>Пароль: <input type="password" name="passwd" value="" /></label>
		<br />
		<label>e-mail: <input type="text" name="mail" value="" /></label>
		<br />
		<label>Номер телефона: <input type="text" name="phone" value="" /></label>
		<br />
		<input type="submit" name="submit" value="OK">
	</form>
	</div>
	<div class="text" id="formain">
	<?php 
		if ($_SERVER[REQUEST_URI] !== "/index.php")
			echo '<a href="index.php"> На главную </a><br>';
	?>
	</div>
</body></html>
