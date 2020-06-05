<?php 
	if (isset($_POST['del_sub'])) {
		$idToDelete = $_POST['idToDelete'];
		require('db.php');
		// sql to delete a record
		$sql = "DELETE FROM goods WHERE id='$idToDelete'";

		if (mysqli_query($db, $sql)) {
		  echo "Record deleted successfully<br>";
		} else {
		  echo "Error deleting record: " . mysqli_error($db)."<br>";
		}
		mysqli_close($db);
		echo "Delete OK<br>";
		echo "<a href='http://stringsworld.ru/katalog.php'>Continue</a><br>";
	}else{
		echo '<meta http-equiv="refresh" content="0; url=http://stringsworld.ru/auth.php?action=log" />';
	}
	
?>