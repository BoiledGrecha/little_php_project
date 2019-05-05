<?PHP
    session_start();
    if (!($_SESSION["status"] === "adm"))
        exit("<html><head><title>ERROR</title> </head> <body><div style=\"text-align: center\"><h1> You dont have enougth permits.</h1><img src = \"imgs/urist.JPG\" height = 1000><br><a href = \"index.php\">НА ГАЛВНУЮ</a></div></body></html>");
    $str = unserialize(file_get_contents("orders"));
    if ($_POST["submit"] === "ОТМЕНИТЬ")
    {
        array_splice($str, (int)$_POST["id"], 1);
        file_put_contents("orders", (serialize($str)));
    }
    for ($i = 0; $i < count($str); $i++)
    {
        echo "<h3>".$str[$i]["login"]."</h3><br>";
        echo "<table>";
        foreach($str[$i]["order"] as $key => $value)
            echo "<tr><td><img src =\"".$key."\" height = 150></td><td><div>".$value."</div></td></tr>";
        echo "<tr><td>";
        echo $str[$i]["money"];
        echo "</td></tr><td>
        <form method = \"POST\" action = \"manage_orders.php\">
        <input type = \"hidden\" name = \"id\" value =\"$i\">
        <input type = \"submit\" name = \"submit\" value = \"ОТМЕНИТЬ\">
        </form></td></tr></table>";
    }
?>