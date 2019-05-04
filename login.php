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

<html><body>
	<div>
    <form method="POST" action="login.php">
        <fieldset>
            <legend>Login</legend>
            <input type="text" name="login" placeholder="Login" value="" />
            <input type="password" name="passwd" placeholder="Password" value="" />
        </fieldset>
        <input type="submit" name="submit" value="OK" />
    </form>
    <a href="register.php">Create account</a>
 </div>
</body></html>
