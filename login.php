<?php
	session_start();
	if ($_SESSION["login"])
		header("Location: index.php");
	if ($_POST["submit"])
	{
		if (!($_POST["login"]) || !($_POST["passwd"]))
		{
			echo ( "Incorrect login/password. Please try again or create account.");
		}
		else
		{
			$i = unserialize(file_get_contents("private/passwd"));
			if ($i[$_POST["login"]])
			{
				if ($i[$_POST["login"]]["passwd"] == hash("whirlpool", $_POST["passwd"]))
				{
					$_SESSION["login"] = $_POST["login"];
					$_SESSION["status"] = $i[$_POST["login"]]["status"];
					header("Location: index.php");
				}
				else
					echo ( "Incorrect login/password. Please try again or create account.");
			}
			else
				echo ( "Incorrect login/password. Please try again or create account.");
		}
	}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "styles.css">
		<title>Login</title>
	</head>
	<body>
	<div class="op">	
	<div id="login" >
    <form method="POST" action="login.php" >
        <fieldset>
            <legend>Войти</legend>
			<input type="text" name="login" placeholder="Логин" value=""/>
			<br/>
            <input type="password" name="passwd" placeholder="Пароль" value=""/>
        </fieldset>
        <input type="submit" name="submit" value="OK" />
    </form>
	<a href="register.php">Регистрация</a>
	<br/>
	</div>
	</div> 
	<div class="text" id="formain">
	<?php 
		if ($_SERVER[REQUEST_URI] !== "/index.php")
			echo '<a href="index.php"> На главную </a><br>';
	?>
	</div>
</body></html>
