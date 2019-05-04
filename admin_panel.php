<?PHP
    session_start();
    if ($_SESSION["status"] === "adm")
    {
        echo "<html>
        <head>
         <title>BEST EVER SHOP</title>
        </head>
       <body>
           <h1> ADM PANEL</h1><br>
           <a href=\"add_item.php\">Добавить товар</a><br>
           <a href=\"delete_item.php\">Изменение и удаление товара</a><br>
           <a href=\"acc_list.php\">Управление учетными записями</a><br>
        </body></html>";
    }
    else
        echo "<html><head><title>ERROR</title> </head> <body> You dont have enougth permits. </body></html>";
?>
