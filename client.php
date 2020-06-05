<?php 
	session_start();
	if (!isset($_SESSION['user_id'])) {
		echo '<meta http-equiv="refresh" content="0; url=http://stringsworld.ru/auth.php?action=log" />';
	}
  if (isset($_POST['newSub'])) {
    $idToUpdate   = $_SESSION['user_id'];
    $newName      = $_POST['newName'];
    $newSurname   = $_POST['newSurname'];
    $newPhone     = $_POST['newPhone'];
    $newCity      = $_POST['newCity'];
    $newStreet    = $_POST['newStreet'];
    $newHouse     = $_POST['newHouse'];
    $newPostIndex = $_POST['newPostIndex'];
    require('php/db.php');
    $sql = "UPDATE users SET name='$newName', surname='$newSurname', phone='$newPhone', city='$newCity', street='$newStreet', house='$newHouse', post_index='$newPostIndex' WHERE id='$idToUpdate'";
    if (mysqli_query($db, $sql)) {
      
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
  }

  

	require("head.php");
	require("php/functions.php");
	//echo '<meta http-equiv="refresh" content="0;auth.php?action=log">';
	require('php/db.php');
    $id     = $_SESSION['user_id'];
    $sql    = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1) {
      	//pushView($row['id'], $row['views']);
      	//if ($row['img_path'] == "") {
    	//	$row['img_path'] = 'itemhold.jpg';
    	//}
        echo '
			<h3>Личный кабинет</h3>
			<ul>
				<li>Здравствуйте, <b>'.$row['name'].' '.$row['surname'].'!</b></li>
				<li>'.$_SESSION['is_admin'].'</li>';
		if ($row['isAdmin'] == '1') {
			echo '<li><a href="admin.php">Панель администратора</a></li>';
		}
				echo '
				<li><a style="color:red;" href="php/exit.php">Выход</a></li>
        <li><div class="line"></div></li>
        <li>
          <h5>Личные данные</h5>
          <span class="mb-2">Редактирование</span>
        </li>
        <li>
        <form method="post" action="">
          <table>
            <tr>
              <td>Имя </td>
              <td><input type="text" name="newName" value="'.$row['name'].'"></td>
            </tr>
            <tr>
              <td>Фамилия </td>
              <td><input type="text" name="newSurname" value="'.$row['surname'].'"></td>
            </tr>
            <tr>
              <td>Телефон </td>
              <td><input type="text" name="newPhone" value="'.$row['phone'].'"></td>
            </tr>
            <tr>
              <td>Город </td>
              <td><input type="text" name="newCity" value="'.$row['city'].'"></td>
            </tr>
            <tr>
              <td>Улица </td>
              <td><input type="text" name="newStreet" value="'.$row['street'].'"></td>
            </tr>
            <tr>
              <td>Дом </td>
              <td><input type="text" name="newHouse" value="'.$row['house'].'"></td>
            </tr>
            <tr>
              <td>Почтовый индекс </td>
              <td><input type="text" name="newPostIndex" value="'.$row['post_index'].'"></td>
            </tr>
            
          </table>
          <input type="submit" name="newSub" value="Применить" class="btn btn-primary mt-2">
          </form>
        </li>
			</ul>
      <div class="line"></div>
			<h4>Мои заказы</h4>
			<table id="items_table" border="1">
  
   <tr>
    <th>Номер заказа</th>
    <th>Содержимое</th>
    <th>Дата</th>
    <th>Цена</th>
    <th>Статус</th>
   </tr>';
  $clientId = $_SESSION['user_id'];
  $sql = "SELECT * FROM orders WHERE client_id = '$clientId' ORDER BY id DESC";
      if($result = mysqli_query($db, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
            <tr>
              <td>'.$row['id'].'</td>
              <td>'.getGoodsTitlesByOrderId($row['id']).'</td>
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
       
        
        
  }else{
    	echo '<h3>Пользователь не найден</h3>';
    }
	require("foo.php");


  
?>	