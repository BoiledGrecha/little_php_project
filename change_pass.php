<?PHP
    session_start();
    if (!($_SESSION["login"]))
        header('Location: login.php');
    if ($_SESSION["login"] === "root")
        header("Location: cabinet.php");
    $login = $_SESSION["login"];
    if($_POST["submit"] === "Change")
    {
        $str = file_get_contents("private/passwd");
        $str = unserialize($str);
        if (hash("whirlpool", $_POST["passwd"]) === $str[$login]["passwd"])
        {
            $str[$login]["passwd"] = hash("whirlpool", $_POST["passwd_new"]);
            $str = serialize($str);
            file_put_contents("private/passwd", $str);
            header("Location: cabinet.php");
        }
        else
            echo "Великая неудача";
    }
    echo "<html><head><title> BEST SHOP EVA </title> </head> <body> <div>Login : $login</div><br><form method = \"POST\" action = \"change_pass.php\">";
    echo "Старый пароль:<input type=\"password\" name=\"passwd\" /><br>";
    echo "Новый пароль:<input type=\"password\" name=\"passwd_new\" /><br>";
    echo "<input type=\"submit\" name=\"submit\" value = \"Change\"/></form>";
    
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "styles.css">
	<title></title>
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