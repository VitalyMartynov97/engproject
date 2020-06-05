<?php 
session_start();
require('head.php');
require('php/functions.php');
?>
   	<h3>Каталог</h3>
 	  <table id="items_table" border="1">
  
    <tr>
      <th>Артикул</th>
      <th>Наименование</th>
      <th>Производитель</th>
      <th>Тип гитары</th>
      <th>Цена</th>
      
      <th>Добавить</th>
    </tr>
   	<?php
   	  require('php/db.php');
   	  if (isset($_GET['search'])) {
   	  	$p = $_GET['search'];
   	  	$prequery = "SELECT * FROM goods WHERE id LIKE '%$p%' OR title LIKE '%$p%' ";
   	  }else{
   	  	$prequery = "SELECT * FROM goods ";
   	  }
      if (isset($_GET['type'])) {
        $t = $_GET['type'];
        if (isset($_GET['search'])){
          $prequery = $prequery." AND type = '$t' ";
        }else{
          $prequery = $prequery." WHERE type = '$t' ";
        }
        
      }
      if (isset($_GET['manufacturer'])) {
        $m = $_GET['manufacturer'];
        if (isset($_GET['search'])) {
          $prequery = $prequery." AND manufacturer = '$m' ";
        }
        if (isset($_GET['type'])) {
          $prequery = $prequery." AND manufacturer = '$m' ";
        }else{
          $prequery = $prequery." WHERE manufacturer = '$m' ";
        }
      }
 	    $query = $prequery;
      echo $query;
	    if ($result = mysqli_query($db, $query)) {
    	  while ($row = mysqli_fetch_assoc($result)) {
   			/*if ($row['img_path'] == "") {
   				$row['img_path'] = 'itemhold.jpg';
    		}*/
        	echo '
			<tr>
   				<td>'.$row['id'].'</td>
   				<td><a href="item.php?id='.$row['id'].'">'.$row['title'].'</a></td>
   				<td><a href="katalog.php?manufacturer='.$row['manufacturer'].'">'.getManufacturerById($row['manufacturer']).'</a></td>
   				<td><a href="katalog.php?type='.$row['type'].'">'.getTypeById($row['type']).'</a></td>
   				<td>'.$row['price'].' руб</td>
   				
   				<td>
            <form method="post" action="php/addtobasket.php">
              <input type="hidden" value="'.$row['id'].'" name="product_id">
              <input type="hidden" value="'.$row['type'].'" name="from">
              <input type="submit" class="btn btn-primary" value="В корзину" name="to-korzina-but">
            </form>
          </td>
   			</tr>
       		';
    	}
    				mysqli_free_result($result);
	}

				mysqli_close($db);
			?>

    
   	
  </table>
<?php 
	require("foo.php");
?>