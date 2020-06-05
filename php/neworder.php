<?php
	session_start();
	require('functions.php');
	if (isset($_POST['confirmed_btn'])) {
		//----------------------------------
		if (isset($_SESSION['user_id'])) {
			$owner_id    = $_SESSION['user_id'];
		}else{
			$owner_id    = 0;
		}
		$name        = $_POST['name'];
		$surname     = $_POST['surname'];
		$phone       = $_POST['phone'];
		$city        = $_POST['city'];
		$street      = $_POST['street'];
		$house       = $_POST['house'];
		$description = $_POST['description'];
		$price       = $_POST['orderPrice'];
		
		$post_index  = $_POST['post_index'];
		$order_date  = date("d.m.yy");
		$status      = 1;
		$isCreated   = false;
		$createdErr  = '';
		//----------------------------------
		//echo $owner_id."<br>";
		//echo $name."<br>";
		//echo $surname."<br>";
		//echo $phone ."<br>";
		//echo $city."<br>";
		//echo $street."<br>";
		//echo $house ."<br>";
		//echo $description."<br>";
		//echo $price ."<br>";
		//echo $post_index."<br>";
		//echo $order_date."<br>";
		//----------------------------------
		require('db.php'); // database connect
		//creating new order----------------
		$sql = "INSERT INTO orders (client_id, name, surname, phone, city, street, house, post_index, description, order_date, price, status_id) VALUES ('$owner_id', '$name', '$surname', '$phone', '$city', '$street', '$house', '$post_index', '$description', '$order_date', '$price', '$status')";
		if (mysqli_query($db, $sql)) {
 			$isCreated = true;
 			$orderId = mysqli_insert_id($db); //get id of inserted order. it's amazing,,,
		} else {
  			$createdErr =  "Error: " . $sql . "<br>" . mysqli_error($db);
		}
		//------------------------------
		//created relationship between order and goods
		for ($i=0; $i < sizeof($_SESSION['goodsArr']); $i++) { 
			$goodId = $_SESSION['goodsArr'][$i];
			$sql = "INSERT INTO ordered_goods (good_id, order_id) VALUES ('$goodId', '$orderId')";
			mysqli_query($db, $sql);
		}
		//-------------------------------------------
      	if ($isCreated) {
      		$_SESSION['goodsArr'] = ''; //clear order card
      		//echo "OK";
      	}else{
      		echo $createdErr; // show problem
      	}
      	
      	echo '
		<div style="width:100%; text-align: center; padding-top: 20px;">
      		<h3>Заказ успешно оформлен!</h3>
			<p>Благодарим вас за совершение заказа!<br>
				Номер вашего заказа: <b>№'.$orderId.'</b><br>
				В ближайщее время менеджер свяжется с вами для уточнения деталей заказа!
			</p>
			<a href="../index.php">На главную</a>
		</div>
      	';
      	


	}else{
		 echo '<meta http-equiv="refresh" content="0; url=http://stringsworld.ru/katalog.php" />';
	}
?>