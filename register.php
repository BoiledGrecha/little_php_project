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
		echo ("Username и Password обязательно должны быть заполнены");
	}
?>

<html><body>
	<form method="POST" action="register.php">
		Username: <input type="text" name="login" value="" />
		<br />
		Password: <input type="password" name="passwd" value="" />
		<br />
		e-mail: <input type="text" name="mail" value="" />
		<br />
		Phone number: <input type="text" name="phone" value="" />
		<br />
		<input type="submit" name="submit" value="OK">
	</form>
</body></html>
