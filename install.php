<?php
if (!file_exists("private"))
	mkdir("private");
if (!file_exists("private/passwd"))
{
	// Add default users: {login=root, passwd=root, status=admin}
	//$passwd_file["root"] = array("passwd" => hash("whirlpool","root"), "status" => "adm");
	file_put_contents("private/passwd", "a:1:{s:4:\"root\";a:2:{s:6:\"passwd\";s:128:\"06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c\";s:6:\"status\";s:3:\"adm\";}}");
}
//создам просто список категорий который будет постоянно храниться и в случае чего добавляться достаточно быстро
if (!file_exists("categories"))
	file_put_contents("categories", serialize(array("All" => "Все", "Male" => "Мужское", "Female" => "Женское", "Uni" => "Для всех", "Red" => "Красное", "Pants" => "Штаны")));

//создадим файл в котором будет по номеру сессии хранить что в корзине у юзера, чтоб не надо было для сборки логиниться

if (!file_exists("baskets"))
	file_put_contents("baskets", "");

if (!file_exists("orders"))
	file_put_contents("orders", "");

if (!file_exists("items"))
	file_put_contents("items", "a:8:{i:0;a:7:{s:7:\"address\";s:184:\"https://cdn.lookastic.ru/%D0%BA%D1%80%D0%B0%D1%81%D0%BD%D1%8B%D0%B5-%D1%81%D0%BF%D0%BE%D1%80%D1%82%D0%B8%D0%B2%D0%BD%D1%8B%D0%B5-%D1%88%D1%82%D0%B0%D0%BD%D1%8B/nike-original-461092.jpg\";s:4:\"name\";s:14:\"Штаники\";s:5:\"price\";s:4:\"1000\";s:5:\"color\";s:14:\"Красное\";s:6:\"gender\";s:14:\"Мужское\";s:4:\"type\";s:10:\"Штаны\";s:11:\"description\";s:22:\"Изумительно\";}i:1;a:7:{s:7:\"address\";s:86:\"http://femme-etoile.ru/wp-content/uploads/2016/01/9fed9e399fd13bb80fa0b4cb1158836b.png\";s:4:\"name\";s:10:\"Ротан\";s:5:\"price\";s:4:\"1000\";s:5:\"color\";s:14:\"Красное\";s:6:\"gender\";s:14:\"Женское\";s:4:\"type\";s:10:\"Кофты\";s:11:\"description\";s:10:\"Бомба\";}i:2;a:7:{s:7:\"address\";s:86:\"http://www.kawaicat.ru/image/?p=upload/products/8f061ea384e8ca0384e8f11cb5aecb52_b.jpg\";s:4:\"name\";s:10:\"Шорты\";s:5:\"price\";s:4:\"3000\";s:5:\"color\";s:10:\"Синее\";s:6:\"gender\";s:14:\"Женское\";s:4:\"type\";s:10:\"Штаны\";s:11:\"description\";s:20:\"Прекрасные\";}i:3;a:7:{s:7:\"address\";s:86:\"http://www.kawaicat.ru/image/?p=upload/products/fa4751bd7aa5821c509f2aba005eea7b_b.jpg\";s:4:\"name\";s:16:\"Леггинсы\";s:5:\"price\";s:4:\"6000\";s:5:\"color\";s:12:\"Черное\";s:6:\"gender\";s:14:\"Женское\";s:4:\"type\";s:10:\"Штаны\";s:11:\"description\";s:24:\"Удивительные\";}i:4;a:7:{s:7:\"address\";s:86:\"http://www.kawaicat.ru/image/?p=upload/products/4c41f48fca7e3a879d362f2ff0c76d76_b.jpg\";s:4:\"name\";s:12:\"Пальто\";s:5:\"price\";s:5:\"10000\";s:5:\"color\";s:12:\"Черное\";s:6:\"gender\";s:14:\"Мужское\";s:4:\"type\";s:10:\"Кофты\";s:11:\"description\";s:12:\"Крутое\";}i:5;a:7:{s:7:\"address\";s:86:\"http://www.kawaicat.ru/image/?p=upload/products/660260d88bd45b29ae67cfd906e3741c_b.jpg\";s:4:\"name\";s:8:\"Юбка\";s:5:\"price\";s:4:\"4000\";s:5:\"color\";s:10:\"Синее\";s:6:\"gender\";s:14:\"Женское\";s:4:\"type\";s:10:\"Штаны\";s:11:\"description\";s:10:\"Супер\";}i:6;a:7:{s:7:\"address\";s:100:\"https://static.kiabi.ru/images/pizhamnye-bryuki-krasnyj-zhenskoe-belje-razmery-s-xxl-wm300_3_zc1.jpg\";s:4:\"name\";s:27:\"Пижамные штаны\";s:5:\"price\";s:4:\"1000\";s:5:\"color\";s:14:\"Красное\";s:6:\"gender\";s:15:\"Для всех\";s:4:\"type\";s:10:\"Штаны\";s:11:\"description\";s:39:\"Унисекс штаны для сна\";}i:7;a:7:{s:7:\"address\";s:106:\"https://static.kiabi.ru/images/tolstovka-na-molnii-s-kapyushonom-krasnyj-muzhchiny-s-xxl-fa035_91_frf1.jpg\";s:4:\"name\";s:10:\"Кофты\";s:5:\"price\";s:4:\"5000\";s:5:\"color\";s:14:\"Красное\";s:6:\"gender\";s:15:\"Для всех\";s:4:\"type\";s:10:\"Кофты\";s:11:\"description\";s:34:\"Очень крутая кофта\";}}");

// добавить единой строкой что будет лежать для какого то количества вещей
//файл нам нужен только для самого первого запуска чтоб создать первичную базу товаров и админов
?>
