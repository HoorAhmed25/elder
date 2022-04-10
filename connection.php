<?php 
$conn=mysqli_connect("localhost","root","");
if(!$conn){
	die('database connection failed'.mysqli_error());
}
$db_selected=mysqli_select_db($conn,"kidneys");
if(!$db_selected){
	die("can't use test_db:".mysqli_error());
}
?>