<?PHP
    session_start();
    
    $str = file_get_contents("categories");
    $str = unserialize($str);
    echo "<table><tr>";
    foreach (array_keys($str) as $j)
        echo "<td><form action=\"catalog.php\" method = \"POST\">
            <input type=\"submit\" name=\"choose\" value = \"".$str[$j]."\"/></form></td>";

    echo "</tr></table>";
    if ($_POST["id"])
    {
        $id = session_id();
        $str = unserialize(file_get_contents("baskets"));
        if ($str[$id][$_POST["id"]])
            $str[$id][$_POST["id"]] += $_POST["value"];
        else
            $str[$id][$_POST["id"]] = $_POST["value"];
        file_put_contents("baskets", serialize($str));
        $_POST["choose"] = $_POST["catalog"];
    }
    if ($_POST["choose"])
    {
        if ($_POST["choose"] === "Все")
        {
            $arr = unserialize(file_get_contents("items"));
            echo "<table><tr class = \"catalog\">";
            foreach($arr as $i)
                echo
                "<td class = \"catalog_td\"><div><img src =\"".$i["address"]."\"height = 300><br>
                    <div>Название: ".$i["name"]."</div><br>
                    <div>Цена у.е. ".$i["price"]."</div><br>
                    <div>Описание: ".$i["description"]."</div><br></div>
                <form action=\"catalog.php\" method = \"POST\"><br>
                    <input type = \"hidden\" name = \"id\" value = \"".$i["address"]."\">
                    <input type = \"hidden\" name = \"catalog\" value = \"".$_POST["choose"]."\">
                    <input type = \"text\" name = \"value\" value = \"0\">
                    <input type = \"submit\" name = \"submit\" value = \"В корзину\"></form></td>";
            echo "</tr></table>";
        }
        else
        {
            $arr = unserialize(file_get_contents("items"));
            echo "<table><tr class = \"catalog\">";
            foreach($arr as $i)
            {
                foreach($i as $j)
                {
                    if ($j == $_POST["choose"])
                    {
                        echo
                        "<td class = \"catalog_td\"><div><img src =\"".$i["address"]."\"height = 300><br>
                            <div>Название: ".$i["name"]."</div><br>
                            <div>Цена у.е. ".$i["price"]."</div><br>
                            <div>Описание: ".$i["description"]."</div><br></div>
                        <form action=\"catalog.php\" method = \"POST\"><br>
                            <input type = \"hidden\" name = \"id\" value = \"".$i["address"]."\">
                            <input type = \"hidden\" name = \"catalog\" value = \"".$_POST["choose"]."\">
                            <input type = \"text\" name = \"value\" value = \"0\">
                            <input type = \"submit\" name = \"submit\" value = \"В корзину\"></form></td>";
                        break;
                    }
                }
            }
            echo "</tr></table>";
        }
    }
?>

<html id="back">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" href = "styles.css">
    <title>Каталог</title>
    </head>
    <body <?php
            if ($_SERVER[REQUEST_URI] !== '/index.php')
                echo 'class="op"'; ?>>
    <div class="op">
    </div>
    <div class="text" id="formain">
    <?php
        if ($_SERVER[REQUEST_URI] !== "/index.php")
            echo '<a href="index.php"> На главную </a><br>';
    ?>
    </div>
</body></html>