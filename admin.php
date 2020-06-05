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
    <h3>Панель администратора</h3>
    <div class="line"></div>
      <ul>
        <li><a href="admin.php">Панель администратора</a></li>
        <li><a href="ordercontrol.php">Управление заказами</a></li>
      </ul>
    <div class="line"></div>
    
    
  ';
  ?>

  <h4>Добавить товар<h4>
  <form method="POST" action="" class="a_form">
    <input type="text" name="title" placeholder="Наименование" required class="form-control mb-2">
    <input type="number" name="price" placeholder="Цена" name="price" required class="form-control mb-2">
    <textarea placeholder="Описание" name="description" class="form-control mb-2"></textarea>
    <label style="font-size: 12pt">Производитель</label>
    <select  name="manufacturer" class="form-control mb-2"> 
      <option selected disabled></option>
      <?php
      $query = "SELECT * FROM manufactures";
      if ($result = mysqli_query($db, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <option value="'.$row['id'].'">'.$row['title'].'</option>
          ';
        }
        mysqli_free_result($result);
      }
      ?>
    </select>
    <label style="font-size: 12pt">Тип гитары</label>
    <select  name="type" class="form-control mb-2"> 
      <option selected disabled>Тип гитары</option>
      <?php
      $query = "SELECT * FROM types";
      if ($result = mysqli_query($db, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <option value="'.$row['id'].'">'.$row['type'].'</option>
          ';
        }
        mysqli_free_result($result);
      }
      ?>
    </select>
    <input type="submit" name="new_good_sub" class="btn btn-primary" value="Добавить товар">
  </form>

  <div class="line"></div>
  <h4>Добавить производителя<h4>
  <form method="POST">
    <input type="text" name="newTitle" placeholder="Производитель..." required class="form-control">
    <input type="submit" name="new_man_sub"  class="btn btn-success mt-2" value="Добавить производителя">
  </form>
  <div class="line"></div>
  <h4>Добавить новый тип гитары<h4>
  <form method="POST">
    <input type="text" name="newType" placeholder="Тип гитары..." required class="form-control">
    <input type="submit" name="new_type_sub"  class="btn btn-success mt-2" value="Добавить тип гитары">
  </form>
  <div class="line"></div>

  <?php
  require("foo.php");
?>  
  
