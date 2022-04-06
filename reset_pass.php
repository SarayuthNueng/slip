<?php session_start(); 
require 'connect.php';//เชื่อมฐานข้อมูล
session_start();
$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";


$id = $itemId;
$sql_show = "SELECT * from login s  WHERE s.id_login = '".$id."'";
$result_show = mysqli_query($condb,$sql_show) or die(mysqli_error($condb));
$row_show = mysqli_fetch_array($result_show);

$sess_id = $itemId;
?>

<?php include "./components/header.php" ?>

<div class="container mt-5">
  <h3 class="mb-3 text-center">
    <span class="text-center text-success"><strong>แก้ไขข้อมูลส่วนตัว</strong></span><!-- Main component for a primary marketing message or call to action --><br>
  </h3>
  
  <div class=" mt-5 col-md-6 offset-md-3">
        <form class="mb-3" name="form1" method="post" action="check_edit_pass_admin.php">
          <div class="form-group mb-3">
            <label>คำนำหน้า</label>
            <input class="form-control" type="text" class="form-control" value="<?=$row_show['pname']?>" name="Fname" id="Fname" required placeholder="คำนำหน้า">
          </div>
          <div class="form-group mb-3">
          <label>ชื่อ - สกุล</label>
            <input class="form-control" type="text" class="form-control" value="<?=$row_show['fname']?>" name="Lname" id="Lname" required placeholder="ชื่อ - สกุล">
          </div>
          <div class="form-group mb-3">
          <label>เลขที่บัตรประชาชน</label>
            <input class="form-control" type="text" class="form-control" value="<?=$row_show['id_login']?>" name="Code_Student" id="Code_Student" readonly placeholder="เลขที่บัตรประชาชน">
          </div>
          <div class="form-group mb-3">
          <label>รหัสผ่านใหม่</label>
            <input class="form-control" value="<?=$row_show['pass']?>" name="Pass_Student" id="Pass_Student" required placeholder="รหัสผ่านใหม่">
          </div>
          <div class="text-center form-group justify-content-between">
          <a href="data_admin.php" type="button" name="Submit" value="Login" class="btn btn-danger btn-block" role="button">ย้อนกลับ</a>
            <button type="submit" name="btn" id="btn" class="btn btn-primary btn-block" role="button">ตกลง</button>
          </div>
        </form>
      </div>
</div>

<?php include "./components/footer.php" ?>

      