<?php
session_start();
require 'connect.php';
   

	$txtdate = mysqli_real_escape_string($condb,$_POST['time_login']);		

    $meSql1 = "INSERT INTO save_time_login (time_login) VALUES ('{$time_login}')";
	$meQeury1 = mysqli_query($condb,$meSql1);
	
	header("location:index3.php");

	?>