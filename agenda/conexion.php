<?php
$server_name   =   "localhost";
$mysql_username =   "root";
$mysql_password =   "PASSWORD";
$db_name     =   "agenda";

$conn	=	mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);

if ($conn) {//echo "connection success";
}else{echo "connection not success";}

?>
