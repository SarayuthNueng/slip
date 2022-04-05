<?php
session_start();
require 'connect.php';
       
		$Fname = mysqli_real_escape_string($condb,$_POST['Fname']);
		$Lname = mysqli_real_escape_string($condb,$_POST['Lname']);
		$Code_Student = mysqli_real_escape_string($condb,$_POST['Code_Student']);
		$Pass_Student = mysqli_real_escape_string($condb,$_POST['Pass_Student']);
		$Pass_Student2 = mysqli_real_escape_string($condb,$_POST['Pass_Student2']);
		
	if($Pass_Student == $Pass_Student2){
							

	
	$meSql = "UPDATE login SET id_login='".$Code_Student."',pass='".$Pass_Student."',pname='".$Fname."',fname='".$Lname."' where id_login = '".$Code_Student."' ";
		$meQeury = mysqli_query($condb,$meSql);
		$_SESSION['check'] ="ได้ทำการแก้ไขข้อมูลเรียบร้อยแล้ว !!";
		header("location:edit_pass.php");


mysqli_close($condb);
}else{
		$_SESSION['check'] ="password ไม่ตรงกัน";
		header("location:edit_pass.php");
}
?>