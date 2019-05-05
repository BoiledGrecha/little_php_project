<?php
	session_start();
	$str = unserialize(file_get_contents("baskets"));
	$str = $str[session_id()];
	$str1 = unserialize(file_get_contents("items"));
	$total_items = 0;
	$total_money = 0;
	if ($str)
	{
		foreach($str as $key => $num)
		{
			foreach($str1 as $i)
			{
				if ($i["address"] == $key)
				{
					$total_items += $num;
					$total_money += $num * (int)$i["price"];
					break;
				}
			}
		}
	}
	if ($total_items > 0)
		echo "<td>Кол-во: $total_items </td><td>у.е: $total_money</td>";
	echo "</tr></table>";
?>