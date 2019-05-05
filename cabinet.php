<?PHP
    session_start();
    if (!($_SESSION["login"]))
        header('Location: login.php');
    
    $str = file_get_contents("private/passwd");
    $str = unserialize($str);
    $login = $_SESSION["login"];
    $str = $str[$login];
    echo "<html><head><title> Личный кабинет </title> </head> <body> <div class='text' id='reg' >Login : $login</div>";
    foreach(array_keys($str) as $i)
    {
        if ($i === "passwd" || $i === "status")
            continue;
        echo "<div class='text' id='reg'>".$i." : ".$str[$i]."</div>";
    }
    echo "<a class='text' id='reg' href=\"change_data.php\">Изменить данные</a><br>    <a class='text' id='reg' href=\"change_pass.php\">Изменить пароль</a>";
    if ($_SESSION["status"] === "adm")
    {
        include("admin_panel.php");
    }
?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "styles.css">
	<title>Каталог</title>
	</head>
	<body >
	<div class="op">
	</div>
	<div class="text" id="formain">
	<br>
	<?php 
		if ($_SERVER[REQUEST_URI] !== "/index.php")
			echo '<a href="index.php"> На главную </a><br>';
	?>
	</div>
</body></html>