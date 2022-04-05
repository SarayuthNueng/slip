<?php
include "connect.php";
 //$_POST['username'] = "is";
 //$_POST['password'] = "1234";
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "select * from userlogin where Namelogin like '$username' and Password like '$password'";
 
$res = mysqli_query($condb,$sql);
 
$check = mysqli_fetch_array($res);
 
if(mysqli_num_rows($res) > 0){
echo 'success';
}else{
echo 'failure';
}
 
mysqli_close($meConnect);
?>