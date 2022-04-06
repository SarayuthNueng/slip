<?php session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล
session_start();


?>

<?php include "./components/header.php" ?>

<div class="container mt-5">
  <h3 class="mb-3 text-center">
    <span class="text-center text-success"><strong>เพิ่มข้อมูลบุคลากร ภายในโรงพยาบาล</strong></span><!-- Main component for a primary marketing message or call to action --><br>
  </h3>
  <?php
            $action = (isset($action)) ? $action : null;
            if ($action == 'exists1') {
              echo "<div class=\"alert alert-warning\">บันทึกไม่สำเร็จ Password ไม่ตรงกัน</div>";
            }
            if ($action == 'exists') {
              echo "<div class=\"alert alert-warning\">บันทึกไม่สำเร็จ มีชื่อ Login นี้แล้ว</div>";
            }
            if ($action == 'add') {
              echo "<div class=\"alert alert-success\">บันทึกเรียบร้อยแล้ว</div>";
            }

            ?>
  <div class="text-center mt-5 col-md-6 offset-md-3">
        <form class="mb-3" name="form1" method="post" action="check_regis.php">
          <div class="form-group mb-3">
            <input class="form-control" type="text" class="form-control" value="" name="Fname" id="Fname" required placeholder="คำนำหน้า">
          </div>
          <div class="form-group mb-3">
            <input class="form-control" type="text" class="form-control" value="" name="Lname" id="Lname" required placeholder="ชื่อ - สกุล">
          </div>
          <div class="form-group mb-3">
            <input class="form-control" type="text" class="form-control" value="" name="Code_Student" id="Code_Student" required placeholder="เลขที่บัตรประชาชน">
          </div>
          <div class="form-group mb-3">
            <input class="form-control" value="" name="Pass_Student" id="Pass_Student" required placeholder="รหัสผ่าน">
          </div>
          <div class="form-group mb-3">
            <input class="form-control" value="" name="pos" id="pos" required placeholder="หน่วยงาน">
          </div>
          <div class="form-group justify-content-between">
          <a href="data_admin.php" type="button" name="Submit" value="Login" class="btn btn-danger btn-block" role="button">ย้อนกลับ</a>
            <button type="submit" name="btn" id="btn" class="btn btn-primary btn-block" role="button">ตกลง</button>
          </div>
        </form>
      </div>
</div>

<?php include "./components/footer.php" ?>