<?php
$host ="localhost";
$user ="root";
$pass ="";
$db = "inventory-management-system";
$connect=mysqli_connect($host,$user,$pass,$db);
if(mysqli_connect_error())
{
	echo"gagal";
}
?>
