<?php
session_start();
require 'connect.php';
        $id_login = mysqli_real_escape_string($condb,$_POST['Code_Student']);
		$pass = mysqli_real_escape_string($condb,$_POST['Pass_Student']);
		$pname = mysqli_real_escape_string($condb,$_POST['Fname']);
		$fname = mysqli_real_escape_string($condb,$_POST['Lname']);
		$txtoffice = mysqli_real_escape_string($condb,$_POST['pos']);
		
							
$sql = "SELECT * FROM login WHERE id_login='$id_login' ";
$result = mysqli_query($condb,$sql);
$numrow = mysqli_num_rows($result);

if($numrow == 1) {
header("location:regis.php?c=exists");
}
else{
$meSql = "INSERT INTO login (id_login,pass,pname,fname,txtoffice) VALUES ('{$id_login}','{$pass}','{$pname}','{$fname}','{$txtoffice}')";
		$meQeury = mysqli_query($condb,$meSql);
		header("location:regis.php?c=add");
}

mysqli_close($condb);

?>