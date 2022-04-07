<?php
session_start();
$error = "Username หรือ Password ไม่ถูกต้อง!!</h1>";
require 'connect.php';

$strSQL = "SELECT * FROM admin_login  WHERE username = '" . mysqli_real_escape_string($condb, $_POST['txtUsername']) . "' and password = '" . mysqli_real_escape_string($condb, $_POST['txtPassword']) . "'";
$objQuery = mysqli_query($condb, $strSQL);
$objResult = mysqli_fetch_array($objQuery);
$_SESSION['name'] = $objResult['name'];
$_SESSION['id_admin'] = $objResult['id_admin'];

if (!$objResult) { ?>
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
      <h3 class="mt-4 text-danger">Username หรือ Password ไม่ถูกต้อง</h3>
      <div class="row">

        <div class="mt-5 col-md-6 offset-md-3">
          <form class="mb-3" name="form1" method="post" action="check_login_admin.php">
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
} else {


  header("location:data_admin.php");
}
mysqli_close($condb);
  ?>