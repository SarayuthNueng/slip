<?php
session_start();
require 'connect.php';


       
		$id_num = mysqli_real_escape_string($condb,$_POST['id_num']);
		$cid = mysqli_real_escape_string($condb,$_POST['cid']);
		$name = mysqli_real_escape_string($condb,$_POST['name']);
		$booking_id = mysqli_real_escape_string($condb,$_POST['booking_id']);
		$salary = mysqli_real_escape_string($condb,$_POST['salary']);
		$social = mysqli_real_escape_string($condb,$_POST['social']);
		$pks = mysqli_real_escape_string($condb,$_POST['pks']);
		$borrow = mysqli_real_escape_string($condb,$_POST['borrow']);
		$bin = mysqli_real_escape_string($condb,$_POST['bin']);
		$clean = mysqli_real_escape_string($condb,$_POST['clean']);
		$cooperative = mysqli_real_escape_string($condb,$_POST['cooperative']);
		$balance = mysqli_real_escape_string($condb,$_POST['balance']);
		$remark = mysqli_real_escape_string($condb,$_POST['remark']);
		
		
		
	
	$meSql = "UPDATE payslip SET booking_id='".$booking_id."',salary='".$salary."',social='".$social."',pks='".$pks."',borrow='".$borrow."',bin='".$bin."',clean='".$clean."',cooperative='".$cooperative."',balance='".$balance."',remark='".$remark."' where id_num = '".$id_num."' ";
		$meQeury = mysqli_query($condb,$meSql);
		
		header("location:data_admin.php");


mysqli_close($condb);
?>