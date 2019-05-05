<?PHP
    session_start();
    $id = session_id();
    $str = unserialize(file_get_contents("baskets"));
    $str1 = $str[$id];
    if ($_POST["delete_x"])
    {
        unset($str[$id][$_POST["id"]]);
        file_put_contents("baskets", serialize($str));
		$str = unserialize(file_get_contents("baskets"));
		unset($_SESSION["total_elements"]);
		unset($_SESSION["total_money"]);
		header("Location: basket.php");
	}
	if ($_POST["submit"] === "ОФОРМИТЬ ЗАКАЗ")
	{
		if (!($_SESSION["login"]))
			echo "<div>Пожалуйста войдите в аккаунт</div><a href = login.php>Страница Логина</a>";
		else
		{	
			$order = unserialize(file_get_contents("orders"));
			$order[] = array("login" => $_SESSION["login"], "order" => $str1, "money" => $_SESSION["total_money"]);
			file_put_contents("orders", serialize($order));
			unset($str[$id]);
			file_put_contents("baskets", serialize($str));
			$str = unserialize(file_get_contents("baskets"));
			$str1 = $str[$id];
			unset($_SESSION["total_elements"]);
			unset($_SESSION["total_money"]);
		}

	}
	if (count($str1) < 1)
        echo "<div>Ваша корзина пуста =(</div><br><a href=\"catalog.php\"> Каталог </a><br>";
    else
    {
		$total = 0;
		$_SESSION["total_elements"] = 0;
        $str2 = unserialize(file_get_contents("items"));
        
        foreach($str2 as $j)
        {
            if ($str1[$j["address"]])
            {
				$_SESSION["total_elements"] += (float)$str1[$j["address"]];
                $total += (float)$j["price"] * (float)$str1[$j["address"]];
                echo
				"<table style='background-color: white; class='tab'>
                <tr class='tdd'>
                    <td class='tdd'>
                    <img src =\"".$j["address"]."\"height = 100>
                    </td>
                    <td class='tdd'>
                    <div>Название: ".$j["name"]."</div>
                    </td>
                    <td class='tdd'>
                    <div>Цена у.е. ".$j["price"]."</div>
                    </td>
                    <td class='tdd'>
                    <div>Количество: ".$str1[$j["address"]]."</div>
                    </td>
                    <td class='tdd'>
                    <div>За товар этого вида: ".(float)$j["price"] * (float)$str1[$j["address"]]."</div>
                    </td>";
                echo
                    "<td class='tdd'>
                    <form method = \"POST\" action = \"basket.php\">
                    <input type = \"hidden\" name = \"id\" value = \"".$j["address"]."\">
                    <input type = \"image\" src = \"http://s1.iconbird.com/ico/0612/vistabasesoftwareicons/w128h1281339252558DeleteRed2.png\" name = \"delete\" height = 30>
                    </form>
                    </td>
                    </tr>
                </table>";
								
            }
		}
		$_SESSION["total_money"] = $total; 
        echo "<table><tr><td><div>Итого : ".$total."</div></td><td><form method = \"POST\" action = \"basket.php\"><input type = \"submit\" name = \"submit\" value = \"ОФОРМИТЬ ЗАКАЗ\"</td></tr></table>";
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
