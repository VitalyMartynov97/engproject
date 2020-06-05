<?php 
	session_start();
	if (isset($_POST['clear-btn'])) {
    	$_SESSION['goodsArr'] = '';
  	}
  	
  	//dont see another way to delete cart items everywhere
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<title>Мир струн | интернет магазин</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js">
	<script type="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
</head>
<body>
	<header>
		<div id="header-in">
			<div id="toplogo">
				<h1>Мир струн</h1>
			</div>
			<div id="nav">
				
				<ul>
					<li><a href="index.php">Главная</a></li>
					<li><a href="katalog.php">Каталог</a></li>
					<li><a href="about.php">Доставка</a></li>
					<li><a href="client.php">Личный кабинет</a></li>
					<?php
						
					?>
				</ul>
			
			</div>
		</div>
		</header>
		<main>
			<div class="line"></div>
			<div id="service-line">
				<form method="get" action="katalog.php" id="search-form">
					
            <div class="input-group">
            	<input class="form-control py-2 border-right-0 border" type="search" placeholder="Поиск..." id="example-search-input" name="search">
            	<?php 
            		if (isset($_GET['type'])) {
						echo '<input type="hidden" name="type" value="'.$_GET['type'].'">';
					}
            	?>
            <span class="input-group-append">
                <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
            </span>
        </div>
       
				</form>
				<span style="font-size: 16pt;">8 (916) 554-00-03</span>
				<span class="basket-link mt-1">
					<a href="basket.php">
						<?php
							if (($_SESSION['goodsArr']) != '') {
								echo "Корзина: ".sizeof($_SESSION['goodsArr']);
							}else{
								echo "Корзина: 0";
							}
						?>
					</a>
				</span>
			</div>
			<div class="line"></div>
			
