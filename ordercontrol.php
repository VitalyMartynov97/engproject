<?php 
  session_start();
  require('head.php');
  require('php/db.php');
  require('php/functions.php');
  if (!checkAdminRights($_SESSION['user_id'])) {
    echo '<meta http-equiv="refresh" content="0; url=http://stringsworld.ru/auth.php?action=log" />';
  } 
  if (isset($_POST['new_good_sub'])) {
    $newTitle       = $_POST['title'];
    $newPrice       = $_POST['price'];
    $newDescription = $_POST['description'];
    $newMan         = $_POST['manufacturer'];
    $newType        = $_POST['type'];
    $sql = "INSERT INTO goods (title, price, description, manufacturer, type) VALUES ('$newTitle', '$newPrice', '$newDescription', '$newMan', '$newType')";
    if (mysqli_query($db, $sql)) {     
      echo "Вставка завершена. Новый товар создан"; //get id of inserted order. it's amazing,,,
    } else {
      echo   "Error: " . $sql . "<br>" . mysqli_error($db);
    }
  }



  if (isset($_POST['new_man_sub'])) {
    $newTitle = $_POST['newTitle'];
    $sql = "INSERT INTO manufactures (title) VALUES ('$newTitle')";
    if (mysqli_query($db, $sql)) {     
      echo "Вставка завершена. Новый производитель создан создан"; //get id of inserted order. it's amazing,,,
    } else {
      echo   "Error: " . $sql . "<br>" . mysqli_error($db);
    }
  }
  if (isset($_POST['new_type_sub'])) {
    $newType = $_POST['newType'];
    $sql = "INSERT INTO types (type) VALUES ('$newType ')";
    if (mysqli_query($db, $sql)) {     
      echo "Вставка завершена. Новый тип создан (без изображения)"; //get id of inserted order. it's amazing,,,
    } else {
      echo   "Error: " . $sql . "<br>" . mysqli_error($db);
    }
  }


  echo '
    <h3>Управление заказами</h3>
    <div class="line"></div>
      <ul>
        <li><a href="admin.php">Панель администратора</a></li>
        <li><a href="ordercontrol.php">Управление заказами</a></li>
      </ul>
    <div class="line"></div>
    
    
  ';
  ?>

  <h4>Необработаные заказы</h4>
  <?php
    echo '
    <table id="items_table" border="1">
  
   <tr>
    <th>Номер заказа</th>
    <th>Содержимое</th>
    <th>Адрес</th>
    <th>Дата</th>
    <th>Цена</th>
    <th>Статус</th>
   </tr>';
  
  $sql = "SELECT * FROM orders WHERE status_id = 1 ORDER BY id DESC";
      if($result = mysqli_query($db, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <tr>
              <td>'.$row['id'].'</td>
              <td>'.getGoodsTitlesByOrderId($row['id']).'</td>
              <td>'.$row['city'].'<br>'.$row['street'].' '.$row['house'].'<br>Почта: '.$row['post_index'].'</td>
              <td>'.$row['order_date'].'</td>
              <td>'.$row['price'].' руб.</td>
              <td>
                <form action="php/changeOrderStatus.php" method="POST">
                  <input type="hidden" name="orderId" value="'.$row['id'].'">
                  <select name="new_order_status" onchange="this.form.submit()">
                    
                    ';
                      $query = "SELECT * FROM order_status";
                      if ($results = mysqli_query($db, $query)) {
                        while ($rows = mysqli_fetch_assoc($results)) {
                          echo '
                            <option ';
                            if ($rows['id'] == 1) {
                              echo " selected ";
                            }
                            echo ' value="'.$rows['id'].'">'.$rows['status'].'</option>
                          ';
                        }
                        
                      }
                  echo '
                  </select>
                <form>
                
              </td>
            </tr>
          ';
        }
        mysqli_free_result($result);
      }
      

  echo '</table>';
  ?>
  <div class="line"></div>
  <h4>Ожидают доставки</h4>
  <?php
    echo '
    <table id="items_table" border="1">
  
   <tr>
    <th>Номер заказа</th>
    <th>Содержимое</th>
    <th>Адрес</th>
    <th>Дата</th>
    <th>Цена</th>
    <th>Статус</th>
   </tr>';
  
  $sql = "SELECT * FROM orders WHERE status_id = 2 ORDER BY id DESC";
      if($result = mysqli_query($db, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <tr>
              <td>'.$row['id'].'</td>
              <td>'.getGoodsTitlesByOrderId($row['id']).'</td>
              <td>'.$row['city'].'<br>'.$row['street'].' '.$row['house'].'<br>Почта: '.$row['post_index'].'</td>
              <td>'.$row['order_date'].'</td>
              <td>'.$row['price'].' руб.</td>
              <td>'.getOrderStatusById($row['status_id']).'</td>
            </tr>
          ';
        }
        mysqli_free_result($result);
      }
      

  echo '</table>';
  ?>
  <div class="line"></div>
  <h4>Переданы в доставку</h4>
  <?php
    echo '
    <table id="items_table" border="1">
  
   <tr>
    <th>Номер заказа</th>
    <th>Содержимое</th>
    <th>Адрес</th>
    <th>Дата</th>
    <th>Цена</th>
    <th>Статус</th>
   </tr>';
  
  $sql = "SELECT * FROM orders WHERE status_id = 3 ORDER BY id DESC";
      if($result = mysqli_query($db, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <tr>
              <td>'.$row['id'].'</td>
              <td>'.getGoodsTitlesByOrderId($row['id']).'</td>
              <td>'.$row['city'].'<br>'.$row['street'].' '.$row['house'].'<br>Почта: '.$row['post_index'].'</td>
              <td>'.$row['order_date'].'</td>
              <td>'.$row['price'].' руб.</td>
              <td>'.getOrderStatusById($row['status_id']).'</td>
            </tr>
          ';
        }
        mysqli_free_result($result);
      }
      

  echo '</table>';
  ?>
  <div class="line"></div>
  <h4>Завершены</h4>
  <span>Последние</span><br>
  <a href="">Архив заказов</a>
  <?php
    echo '
    <table id="items_table" border="1">
  -
   <tr>
    <th>Номер заказа</th>
    <th>Содержимое</th>
    <th>Адрес</th>
    <th>Дата</th>
    <th>Цена</th>
    <th>Статус</th>
   </tr>';
  
  $sql = "SELECT * FROM orders WHERE status_id = 4 ORDER BY id DESC";
      if($result = mysqli_query($db, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <tr>
              <td>'.$row['id'].'</td>
              <td>'.getGoodsTitlesByOrderId($row['id']).'</td>
              <td>'.$row['city'].'<br>'.$row['street'].' '.$row['house'].'<br>Почта: '.$row['post_index'].'</td>
              <td>'.$row['order_date'].'</td>
              <td>'.$row['price'].' руб.</td>
              <td>'.getOrderStatusById($row['status_id']).'</td>
            </tr>
          ';
        }
        mysqli_free_result($result);
      }
      mysqli_close($db);

  echo '</table>';
  ?>
  <div class="line"></div>
  <?php
  require("foo.php");
?>  