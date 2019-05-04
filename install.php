<?php
if (!file_exists("private"))
	mkdir("private");
if (!file_exists("private/passwd"))
{
	// Add default users: {login=root, passwd=root, status=admin}
	//$passwd_file["root"] = array("passwd" => hash("whirlpool","root"), "status" => "adm");
	file_put_contents("private/passwd", "a:1:{s:4:\"root\";a:2:{s:6:\"passwd\";s:128:\"06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c\";s:6:\"status\";s:3:\"adm\";}}");
}


// добавить единой строкой что будет лежать для какого то количества вещей
//файл нам нужен только для самого первого запуска чтоб создать первичную базу товаров и админов
?>
