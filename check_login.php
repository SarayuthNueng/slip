<?php
session_start();
$error="Username หรือ Password ไม่ถูกต้อง!!</h1>";
require 'connect.php';
   
// $u = mysqli_real_escape_string($condb,$_POST['txtUsername']);
// $pass = mysqli_real_escape_string($condb,$_POST['txtPassword']);
//  $sql="SELECT * FROM login  WHERE id_login = $u and pass = $pass";
//  $strSQL = $sql;
// $_txtuser = mysqli_real_escape_string($condb,$_POST['txtUsername']);
// $_txtpass = mysqli_real_escape_string($condb,$_POST['txtPassword']);
	$strSQL = "SELECT * FROM login  WHERE id_login = '".mysqli_real_escape_string($condb,$_POST['txtUsername'])."' and pass = '".mysqli_real_escape_string($condb,$_POST['txtPassword'])."' ";
  // $strSQL = "SELECT * FROM login  WHERE id_login = $_txtuser and pass = $_txtpass ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	$_SESSION['fname'] = $objResult['fname'];
	$_SESSION['id_login'] = $objResult['id_login'];
	// $_SESSION['fname'];
	// $_SESSION['id_login'];
  // echo($objResult);

// $len = isset($objResult['id_login']) ? count($objResult['id_login']) : 0;
// isset($_POST['id_login']);
// echo '<pre>';
//   echo print_r($objResult['id_login']);
//   echo '</pre>';
	// if(!mysqli_query($condb,$strSQL))
	if(!$objResult)
  


	{?>
    
    <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบ Slip ออนไลน์</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo-sd.png"/>


    <!-- Bootstrap -->
    <link href="bootstrap_5/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap_5/css/style.css" rel="stylesheet">

  </head>

  <body>

  <div class="mt-5 container text-center">
      <?php include "./components/banner.php" ?>
      <h3 class="mt-4 text-danger">เลขที่บัตรประชาชน 13 หลัก หรือ รหัสผ่าน ไม่ถูกต้อง</h3>
      <div class="row">

        <div class="mt-5 col-md-6 offset-md-3">
          <form class="mb-3" name="form1" method="post" action="check_login.php">
            <div class="form-group mb-3">
              <input class="form-control" maxlength="13" name="txtUsername" type="text" id="txtUsername" required placeholder="ผู้ใช้งาน">
            </div>
            <div class="form-group mb-3">
              <input class="form-control" name="txtPassword" type="password" id="txtPassword" required placeholder="รหัสผ่าน">
            </div>
            <div class="form-group">
              <button type="submit" name="Submit" value="Login" class="btn btn-primary btn-block" role="button">เข้าสู่ระบบ</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <?php include "./components/footer.php" ?>

			
	<?php
	}
	else
	{
		

				header("location:save_time_login.php");
			
			
	
	
	}
	mysqli_close($condb);
?>

