<?PHP
    session_start();
    if (!($_SESSION["status"] === "adm"))
        exit("<html><head><title>ERROR</title> </head> <body><div style=\"text-align: center\"><h1> You dont have enougth permits.</h1><img src = \"imgs/urist.JPG\" height = 1000><br><a href = \"index.php\">НА ГАЛВНУЮ</a></div></body></html>");
    if ($_POST["submit"] === "REMOVE USER")
    {
        if ($_POST["login"] === "root")
            echo "Вы не можете удалить этого пользователя.";
        else
        {
            $str = file_get_contents("private/passwd");
            $str = unserialize($str);
            unset($str[$_POST["login"]]);
            $str = serialize($str);
            file_put_contents("private/passwd", $str);
        }
    }
    elseif ($_POST["submit"] === "GIVE ADM")
    {
        $str = file_get_contents("private/passwd");
        $str = unserialize($str);
        $str[$_POST["login"]]["status"] = "adm";
        $str = serialize($str);
        file_put_contents("private/passwd", $str);
    }
    elseif ($_POST["submit"] === "REMOVE ADM")
    {
        $str = file_get_contents("private/passwd");
        $str = unserialize($str);
        unset($str[$_POST["login"]]["status"]);
        $str = serialize($str);
        file_put_contents("private/passwd", $str);
    }
    elseif ($_POST["submit"] === "Change")
    {
        $str = file_get_contents("private/passwd");
        $str = unserialize($str);
        foreach(array_keys($str[$_POST["login"]]) as $j)
            {
                if ($j === "passwd" || $j === "status")
                    continue;
                $str[$_POST["login"]][$j] = $_POST[$j];
            }
        $str = serialize($str);
        file_put_contents("private/passwd", $str);
    }
    elseif ($_POST["submit"] === "ADD USER")
    {
        if ($_POST["login"] !== "root")
        {
            $str = file_get_contents("private/passwd");
            $str = unserialize($str);
            $str[$_POST["login"]] = array("passwd"=> hash("whirlpool", $_POST["passwd"]), "status" => $_POST["flag"]);
            $str = serialize($str);
            file_put_contents("private/passwd", $str);
        }
        else
            echo "Операции с рутом запрещены!";
    }
    
    $str = file_get_contents("private/passwd");
    $str = unserialize($str);
    
    echo "<form method = \"POST\" action = \"acc_list.php\">
    <input type=\"text\" name=\"login\" value = \"\"/><input type=\"text\" name=\"passwd\" value = \"\"/>
    <input type=\"radio\" name=\"flag\" value = \"adm\">Make admin
    <input type=\"submit\" name=\"submit\" value = \"ADD USER\"/></form>";

    foreach(array_keys($str) as $i)
    {
        if ($i === "root")
            continue;
        echo 
        "<form method = \"POST\" action = \"acc_list.php\">
            <input type=\"hidden\" name = \"login\" value =".$i.">"
            .$i." ".$str[$i]["status"];
        if ($str[$i]["status"] ==="adm")
            echo "<input type=\"submit\" name=\"submit\" value = \"REMOVE ADM\"/>";
        else
            echo "<input type=\"submit\" name=\"submit\" value = \"GIVE ADM\"/>";
        echo "<input type=\"submit\" name=\"submit\" value = \"CHANGE INFO\"/>";
        echo "<input type=\"submit\" name=\"submit\" value = \"REMOVE USER\"/></form>";
        if ($_POST["submit"] === "CHANGE INFO" && $_POST["login"] === $i)
        {
            $str = file_get_contents("private/passwd");
            $str = unserialize($str);
            echo "<form method = \"POST\" action = \"acc_list.php\">";
            foreach(array_keys($str[$i]) as $j)
            {
                if ($j === "passwd" || $j === "status")
                    continue;
                echo $j." : <input type=\"text\" name=\"$j\" value = \"".$str[$i][$j]."\"/><br>";
            }
            echo "<input type=\"submit\" name=\"submit\" value = \"Change\"/></form>";
        }
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