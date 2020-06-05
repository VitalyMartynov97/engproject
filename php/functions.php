<?
function checkAdminRights($id){
    require('php/db.php');
    $sql    = "SELECT isAdmin FROM users WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1){
        return  $row['isAdmin']; 
    }
}
///-   ^_^
function getGoodTitleByGoodId($id){
    require('php/db.php');
    $sql    = "SELECT title FROM goods WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1){
        return  $row['title']; 
    }
}
function getGoodsTitlesByOrderId($id){
    require('php/db.php');
    $sql    = "SELECT good_id FROM ordered_goods WHERE order_id = '$id'";
    $result = mysqli_query($db,$sql);
    $count  = mysqli_num_rows($result);
    $links = '';
    //$goods = array();
    while ($row = mysqli_fetch_assoc($result)) {
        //array_push($goods, $row['title']);
        $links = $links . '
        <a href="item.php?id='.$row['good_id'].'">'.getGoodTitleByGoodId($row['good_id']).'</a><br>';
    }
    return $links;
}









function getOrderStatusById($id){
    require('php/db.php');
    $sql    = "SELECT status FROM order_status WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1){
        if ($id == 1) {
            return  "<span style='color: #333'>".$row['status']."</span>"; 
        }
        if ($id == 2) {
            return  "<span style='color: #8A2BE2'>".$row['status']."</span>"; 
        }
        if ($id == 3) {
            return  "<span style='color: #2A52BE'>".$row['status']."</span>"; 
        }
        if ($id == 4) {
            return  "<span style='color: #4CBB17'>".$row['status']."</span>"; 
        }
    }
}
function getManufacturerById($id){
	require('php/db.php');
    $sql    = "SELECT title FROM manufactures WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1){
    	return  $row['title']; 
    }
}
function getTypeById($id){
	require('php/db.php');
    $sql    = "SELECT type FROM types WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1){
    	return  $row['type']; 
    }
}
function getItemsNum(){
	require('php/db.php');
    $sql    = "SELECT id FROM items";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    return  $count; 
}
function getUserNameById($id){
    require('php/db.php');
    $sql    = "SELECT name, surname FROM users WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1){
        return  $row['name']." ".$row['surname']; 
    }
}

function getUserPhoneById($id){
    require('php/db.php');
    $sql    = "SELECT phone FROM users WHERE id = '$id'";
    $result = mysqli_query($db,$sql);
    $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count  = mysqli_num_rows($result);
    if($count == 1){
        return  $row['phone']; 
    }
}

function pushView($id, $curentViews){
    $newViews = $curentViews + 1;
    require('php/db.php');
    $sql = "UPDATE items SET views='$newViews' WHERE id='$id'";
    mysqli_query($db, $sql);
    mysqli_close($db);
}



function changeOrderStatus($id, $newStatusId){
    require('php/db.php');
    $sql = "UPDATE orders SET status_id='$newStatusId' WHERE id='$id'";
    mysqli_query($db, $sql);
    mysqli_close($db);
}

?>