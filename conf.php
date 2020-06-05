<?php 
session_start();
	require("head.php");
  require('php/functions.php');
  if (!isset($_POST['toConf'])) {
     echo '<meta http-equiv="refresh" content="0; url=http://stringsworld.ru/basket.php" />';
  }
  $isAuthClient = false;
    if (isset($_SESSION['user_id'])) {
      $isAuthClient = true;
      require('php/db.php');
      $client_id = $_SESSION['user_id'];
      $result = mysqli_query($db, "SELECT * FROM users WHERE id = '$client_id'");
      $row = mysqli_fetch_array($result);
      
     
    }
    //require('php/db.php');
    //$article = $_SESSION['goodsArr'][$i];
    //$result = mysqli_query($db, "SELECT * FROM goods WHERE id = '$article'");
    //$row = mysqli_fetch_array($result);
    //$fullPrice = $fullPrice + $row['price'];
    echo '<h3>Оформление заказа</h3>
          <span>Заполните контактные данные</span>
          <form action="php/neworder.php" method="POST">
  <table class="mt-2">
    <tr>
      <td><label>Имя<span>*</span></label></td>
      <td><input type="text" name="name" class="form-control" value="'.$row['name'].'" required placeholder="Имя..."></td>
    </tr>
    <tr>
      <td><label>Фамилия</label></td>
      <td><input type="text" name="surname" class="form-control" value="'.$row['surname'].'" placeholder="Фамилия..."></td>
    </tr>
    <tr>
      <td><label>Телефон<span>*</span></label></td>
      <td><input type="text" name="phone" class="form-control" value="'.$row['phone'].'" required placeholder="Номер телефона..."></td>
    </tr>
    <tr>
      <td><label>Город<span>*</span></label></td>
      <td><input type="text" name="city" class="form-control" value="'.$row['city'].'" required placeholder="Город..."></td>
    </tr>
    <tr>
      <td><label>Улица<span>*</span></label></td>
      <td><input type="text" name="street" class="form-control" value="'.$row['street'].'" required placeholder="Улица..."></td>
    </tr>
    <tr>
      <td><label>Дом<span>*</span></label></td>
      <td><input type="text" name="house" class="form-control" value="'.$row['house'].'" required placeholder="Номер дома..."></td>
    </tr>
    <tr>
      <td><label>Почтовый индекс</label></td>
      <td><input type="text" name="post_index" class="form-control" value="'.$row['post_index'].'" placeholder="Почтновый индекс..."></td>
    </tr>
    <tr>
      <td>Комментарий<br>к заказу</td>
      <td><textarea class="form-control" name="description"></textarea></td>
    </tr>
    <tr>
      <td>Товаров:</td>
      <td><a href="basket.php"><b>'.sizeof($_SESSION['goodsArr']).'</b></a></td>
    </tr>
    <tr>
      <td>
      К оплате:
      </td>
      <td>
      <b>'.$_POST['fullPrice'].' руб</b>
      </td>
    </tr>
  </table>
  <!--hidens-->
  <input type="hidden" name="orderPrice" value="'.$_POST['fullPrice'].'">
  <div class="mt-2">
    <span></span>
  </div>
  <input type="submit" name="confirmed_btn" class="btn btn-success mt-2" value="Совершить заказ">
  <div class="line"></div>
  <div>
    <span>Нажимая кнопку "Совершить заказ", вы даете согласие на обработку ваших персональных данных</span><br>
    <span>Поля обозначеные * обязательны к заполнению</span>
  </div>
</form>
    ';  
    
	require("foo.php");
?>	