<?PHP
    session_start();
    if (!($_SESSION["login"]))
        header('Location: login.php');
    $str = file_get_contents("private/passwd");
    $str = unserialize($str);
    $login = $_SESSION["login"];
    $str1 = $str[$_SESSION["login"]];
    if($_POST["submit"] === "Change")
    {
        foreach (array_keys($_POST) as $i)
        {
            if ($i === "submit")
                continue;
            $str[$login][$i] = $_POST[$i];
        }
        $str = serialize($str);
        file_put_contents("private/passwd", $str);
        header("Location: cabinet.php");
    }
    echo "<html><head><title> BEST SHOP EVA </title> </head> <body> <div>Login : $login</div><br><form method = \"POST\" action = \"change_data.php\">";
    foreach(array_keys($str1) as $i)
    {
        if ($i === "passwd" || $i === "status")
            continue;
        echo $i." : <input type=\"text\" name=\"$i\" value = \"".$str1[$i]."\"/><br>";
    }
    echo "<input type=\"submit\" name=\"submit\" value = \"Change\"/></form>";
    
?>