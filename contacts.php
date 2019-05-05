<html id="back">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "styles.css">
	<title>Каталог</title>
	</head>
	<body>
	<div class="op" style="text-align: center">
		<h1>Контакты:</h1>
		<h1>XXXXXXXXXXXXX</h1>
		<h1>XXXXXXXXXXXXX</h1>
		<h1>E-Mail:</h1>
		<h1>turboshmot@nesitedenezki.com</h1>
		<h1>Пунк самовывоза:</h1>
		<h1>город Герой улица Летия дом 0 (подъезд со стороны кратера)</h1>
	</div>
	<div class="text" id="formain">
	<?php 
		if ($_SERVER[REQUEST_URI] !== "/index.php")
			echo '<a href="index.php"> На главную </a><br>';
	?>
	</div>
</body></html>