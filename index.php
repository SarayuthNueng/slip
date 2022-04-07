<?php
session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล

?>
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
    <div class="container">
      <h3 class="mt-3 text-danger">
        <marquee direction="left">เข้าสู่ระบบครั้งแรก กรุณาเปลี่ยนรหัสผ่าน.ด้วยความปรารถณาดี โรงพยาบาลสมเด็จ</marquee>
      </h3>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <a href="admin.php"><img src="images/key-2-2.png" width="90" height="90"></a>
      </div>

      <div class="mt-5 col-md-6 offset-md-3">
        <form class="mb-3" name="form1" method="post" action="check_login.php">
          <div class="form-group mb-3">
            <input class="form-control" maxlength="13" name="txtUsername" type="text" id="txtUsername" required placeholder="เลขที่บัตรประชาชน 13 หลัก">
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

  <div class="text-center mb-5 mt-5 col-12">

    <h5>ติดปัญหาการเข้าใช้งาน</h5>
    <h6>ติดต่อ กลุ่มงานการเงิน นางสาวปลื้มกมล ภารพัฒน์ (ปลื้ม) การเงินและบัญชี 311 หรือ </h6>
    <h6 class="mt-3">
      จำนวนผู้เข้าใช้งาน <font size='3' color="red">
        <?php
        $sql = "SELECT COUNT(id_save_time_login) as ttt from save_time_login";
        $result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        extract($row);
        ?>
        <?php echo number_format($row['ttt']); ?> </font> คน
    </h6>
    </font>
  </div>





  <?php include "./components/footer.php" ?>