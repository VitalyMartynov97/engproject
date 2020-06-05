<?php 
session_start();
	require("head.php");
?>
			<h3>Каталоги</h3>
			<span>Выберите тип вашей гитары</span>
			<div id="pick_catalogs">
				<?php
   	  			require('php/db.php');
 	   			$query = "SELECT * FROM types";
	    		if ($result = mysqli_query($db, $query)) {
    	  			while ($row = mysqli_fetch_assoc($result)) {
        				echo '
							<div class="katalog-i mb-3">
								<a href="katalog.php?type='.$row['id'].'"><img src="'.$row['img'].'" width="200px"></a><br>
								<a href="katalog.php?type='.$row['id'].'">'.$row['type'].'</a>
							</div>
       					';
    				}
    				mysqli_free_result($result);
				}
				mysqli_close($db);
				?>
			</div>
<?php 
	require("foo.php");
?>