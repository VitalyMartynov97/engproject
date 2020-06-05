<?php 
	session_start();
	if (isset($_POST['reg_sub'])) {
   	$login      = $_POST['rg_login'];
      $name       = $_POST['rg_name'];
      $surname    = $_POST['rg_surname'];
      $phone      = $_POST['rg_phone'];
      $email      = $_POST['rg_email'];
      $city       = $_POST['rg_city'];
      $street     = $_POST['rg_street'];
      $house      = $_POST['rg_house'];
      $regdate    = date('d.m.yy');
      $pass       = $_POST['rg_password'];
      $post_index = '999999';
      $isAdmin    = 0;
      
         require('db.php');
         $sql = "INSERT INTO users (post_index, login, password, name, surname, phone, email, city, street, house, reg_date, isAdmin) VALUES ('$post_index', '$login', '$pass', '$name', '$surname', '$phone', '$email', '$city', '$street', '$house', '$regdate', '$isAdmin')";
         if (mysqli_query($db, $sql)) {
            
           echo "OK"; //get id of inserted order. it's amazing,,,
         } else {
            echo   "Error: " . $sql . "<br>" . mysqli_error($db);
         }
         
         mysqli_close($db);
         echo "good";
         echo '<meta http-equiv="refresh" content="0; url=http://stringsworld.ru/auth.php?action=log" />';
   }
   echo '<meta http-equiv="refresh" content="0; url=http://minishop.loc/auth.php?action=registration" />';
?>