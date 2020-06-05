<?php
	
	if (isset($_POST['new_order_status'])) {
		$orderId     = $_POST['orderId'];
		$newStatusId = $_POST['new_order_status'];
		require('db.php');
    	$sql = "UPDATE orders SET status_id='$newStatusId' WHERE id='$orderId'";
    	if (mysqli_query($db, $sql)) {
      		echo "OK "."orderId = ".$orderId .", newStatusId = ".$newStatusId;

    	} else {
      		echo "Error updating record: " . mysqli_error($conn);
    	}
    	
    	echo '<meta http-equiv="refresh" content="10; url=http://stringsworld.ru/ordercontrol.php" />';
	}else{
		echo "Error";
	}
?>