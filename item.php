<?php 
	session_start();
	require('head.php');
	require('php/functions.php');
	require('php/db.php');
	if (!isset($_GET['id']) || $_GET['id'] == "") {
		echo '<meta http-equiv="refresh" content="0; url=http://minishop.loc/search.php" />';
	}
    $id     = $_GET['id'];
    $sql    = "SELECT * FROM goods WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1) {
      	//pushView($row['id'], $row['views']);
      	//if ($row['img_path'] == "") {
    	//	$row['img_path'] = 'itemhold.jpg';
    	//}
        echo '
			<h3>'.$row['title'].'</h3>
			<ul>
				<li><span>Артикул: '.$row['id'].'</span></li>
				<li><span>Тип: <a href="katalog.php?type='.$row['type'].'">'.getTypeById($row['type']).'</a></span></li>
				<li><span>Производитель: <a href="katalog.php?manufacturer='.$row['manufacturer'].'">'.getManufacturerById($row['manufacturer']).'</a></span></li>
				<li><span>Цена: '.$row['price'].' руб</span></li>
				<li>
					<form method="post" action="php/addtobasket.php">
              			<input type="hidden" value="'.$row['id'].'" name="product_id">
              			<input type="hidden" value="'.$row['type'].'" name="from">
              			<input type="submit" class="btn btn-primary" value="В корзину" name="to-korzina-but">
            		</form>
				</li>
				<li>
					<span>Описание: </span>
					<p>'.$row['description'].'</p>
				</li>
			</ul>
        ';
        if (checkAdminRights($_SESSION['user_id'])) {
    		echo '
				<form method="POST" action="php/deleteItem.php">
					<input type="hidden" name="idToDelete" value="'.$row['id'].'">
					<input type="submit" class="btn btn-danger" name="del_sub" value="Удалить товар">
				</form>
    		';
  		} 
        
        
    }else{
    	echo '<h3>Товар не найден</h3>';
    }
	require("foo.php");
?>	