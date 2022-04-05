<?php
session_start();
require 'connect.php';
       
		$Fname = mysqli_real_escape_string($condb,$_POST['Fname']);
		$Lname = mysqli_real_escape_string($condb,$_POST['Lname']);
		$Code_Student = mysqli_real_escape_string($condb,$_POST['Code_Student']);
		$Pass_Student = mysqli_real_escape_string($condb,$_POST['Pass_Student']);
		
	
							

	
	$meSql = "UPDATE login SET id_login='".$Code_Student."',pass='".$Pass_Student."',pname='".$Fname."',fname='".$Lname."' where id_login = '".$Code_Student."' ";
		$meQeury = mysqli_query($condb,$meSql);
		
		header("location:data_admin.php");


mysqli_close($condb);
?>