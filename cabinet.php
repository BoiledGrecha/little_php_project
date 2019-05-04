<?PHP
    session_start();
    if (!($_SESSION["login"]))
        header('Location: login.php');
    
    $str = file_get_contents("private/passwd");
    $str = unserialize($str);
    $login = $_SESSION["login"];
    $str = $str[$login];
    echo "<html><head><title> BEST SHOP EVA </title> </head> <body> <div>Login : $login</div><br>";
    foreach(array_keys($str) as $i)
    {
        if ($i === "passwd" || $i === "status")
            continue;
        echo "<div>".$i." : ".$str[$i]."</div><br>";
    }
    echo "<a href=\"change_data.php\">Изменить данные</a>    <a href=\"change_pass.php\">Изменить пароль</a>";
    if ($_SESSION["status"] === "adm")
    {
        include("admin_panel.php");
    }
    
?>
