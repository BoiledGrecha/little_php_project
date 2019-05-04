<?PHP
    session_start();
    include("install.php");
    //$_SESSION["status"] = "adm";
    //$_SESSION["login"] = "lol";
    
    if ($_POST)
        //header("location: admin_panel.php")
        session_unset();
    //session_unset();
?>


<html>
 <head>
  <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
  <title>BEST EVER SHOP</title>
 </head>
<body>
    <h1> TURBOSHMOT.COM</h1><br>
    <?PHP   if (!($_SESSION["login"]))
                include("login.php");
            else
                echo "<div>".$_SESSION["login"]."</div>
    <form action=\"index.php\" method = \"POST\"><a href=\"cabinet.php\">Личный кабинет</a><br>
        <input type = \"image\" src = \"http://s1.iconbird.com/ico/0612/vistabasesoftwareicons/w128h1281339252558DeleteRed2.png\" name = \"delete\">
    </form> "; ?>
    <a href="basket.php"> КОРЗИНА </a><br>
    <a href="contacts.php"> КОНТАКТЫ </a><br>
    
</body></html>