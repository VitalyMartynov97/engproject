<?php
	session_start();
	if(isset($_POST['to-korzina-but'])){
		$product_id = $_POST['product_id'];
		$from = $_POST['from'];
		if ($_SESSION['goodsArr']=='') {
			$_SESSION['goodsArr'] = array();
		}
		array_push($_SESSION['goodsArr'], $product_id);
	}
	echo '<META HTTP-EQUIV="REFRESH" CONTENT="1; URL=../katalog.php?type='.$from.'">';
?>