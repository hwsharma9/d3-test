<?php 
$mysql = new mysqli("localhost","root","","bklawyer_lawyers");
$result = array();
if (isset($_GET['cpv']) && !empty($_GET['cpv'])) {
	$result = $mysql->query("select userFirstName,userID from user where userFirstName like '%".$_GET['cpv']."%'")->fetch_all(MYSQLI_ASSOC);
}
print_r(json_encode($result));die;
?>