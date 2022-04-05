<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ระบบ Slip ออนไลน์</title>
  

  <!-- Bootstrap -->
  <link href="bootstrap_5/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap_5/css/style.css" rel="stylesheet">


</head>

<body>

<div class="mt-5 container text-center">
<?php include "./components/banner.php" ?>
    <h3 class="mt-4 text-danger">ระบบจัดการข้อมูล (สำหรับ Admin เท่านั้น)</h3>
    <div class="row">
      <div class="mt-4 col-md-6 offset-md-3">
      <img src="images/admin22.png" width="100" height="141">
      </div>

      <div class="mt-5 col-md-6 offset-md-3">
        <form class="mb-3" name="form1" method="post" action="check_login_admin.php">
          <div class="form-group mb-3">
            <input class="form-control" maxlength="13" name="txtUsername" type="text" id="txtUsername" required placeholder="ผู้ใช้งาน">
          </div>
          <div class="form-group mb-3">
            <input class="form-control" name="txtPassword" type="password" id="txtPassword" required placeholder="รหัสผ่าน">
          </div>
          <div class="form-group">
          <a href="index.php" type="button" name="Submit" value="Login" class="btn btn-danger btn-block" role="button">ย้อนกลับ</a>
            <button type="submit" name="Submit" value="Login" class="btn btn-primary btn-block" role="button">เข้าสู่ระบบ</button>
          </div>
        </form>
      </div>
    </div>
  </div>





  <?php include "./components/footer.php" ?>