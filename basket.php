<?php 
	require("head.php");
  require('php/functions.php');
  if (isset($_POST['clear-btn'])) {
    $_SESSION['goodsArr'] = '';
  }
  if (isset($_POST['delete'])) {
      if (sizeof($_SESSION['goodsArr'])==1) {
          $_SESSION['goodsArr'] = '';
      }else{
          unset($_SESSION['goodsArr'][$_POST['id']]);
      }
    
    
    } 
  $fullPrice = 0;
?>
<h3>Корзина</h3>
<?php 
  if(($_SESSION['goodsArr']) != ''){
    echo '
      <table id="items_table" border="1">  
        <tr>
          <th>Артикул</th>
          <th>Наименование</th>
          <th>Производитель</th>
          <th>Тип гитары</th>
          <th>Цена</th>
          <th>Удалить</th>
        </tr>
    ';
    /*foreach($_SESSION['goodsArr'] as $myarr)
    {
      echo $myarr."<br />";
    } */
    require('php/db.php');
    for ($i=0; $i < (sizeof($_SESSION['goodsArr'])); $i++) { 
      $article = $_SESSION['goodsArr'][$i];
      $result = mysqli_query($db, "SELECT * FROM goods WHERE id = '$article'");
      $row = mysqli_fetch_array($result);
      $fullPrice = $fullPrice + $row['price'];
      
      echo '
        <tr>
          <td>'.$row['id'].'</td>
          <td><a href="item.php?id='.$row['id'].'">'.$row['title'].'</a></td>
          <td><a href="katalog.php?manufacturer='.$row['manufacturer'].'">'.getManufacturerById($row['manufacturer']).'</a></td>
          <td><a href="katalog.php?type='.$row['type'].'">'.getTypeById($row['type']).'</a></td>
          <td>'.$row['price'].' руб</td>
          <td>
            <form method="POST">
              <input type="hidden" name="id" value="'.$i.'">
              <input type="submit" value="Удалить" class="btn btn-warning" name="delete">
            </form>
          </td>
        </tr>
      ';
    }
    echo '
      </table>
      <hr>
      <div id="basket-actions">
        <form method="POST">
          <input type="submit" name="clear-btn" class="btn btn-danger" value="Очистить корзину">
        </form>
        <span id="all-price">Всего к оплате: '.$fullPrice.' руб</span>    
      </div>
      <form action="conf.php" method="POST" style="text-align: right;">
        <input type="hidden" name="fullPrice" value="'.$fullPrice.'">
        <input type="submit" name="toConf" class="btn btn-success" value="Перейти к оформлению">
      </form>
    ';
  }else
  {
    echo "Ваша корзина пуста :(";
  }

	require("foo.php");
?>	