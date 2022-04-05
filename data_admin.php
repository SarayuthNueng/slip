<?php
session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล

$sess_id = $_SESSION['id_admin'];
if ($sess_id == "") {
    header("location:index.php");
}

?>


<?php include "./components/header.php" ?>

<!-- Main  -->

<div class="container mt-5">

    <h3 class="text-center">
        <span class="text-center text-success"><strong>รายชื่อบุคลากร ที่สามารถใช้งานระบบ Slip ภายในโรงพยาบาล ได้</strong></span><!-- Main component for a primary marketing message or call to action --><br>
    </h3>

    <form class="mt-4 d-flex" name="form_search" method="get" action="">
        <input class="form-control me-2" type="text" name="keyword" id="keyword" placeholder="ค้นหา เลขบัตร 13 หลัก/ ชื่อ - สกุล/ หน่วยงาน" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="button" id="button">ค้นหา</button>
    </form>

    <div class="mt-4 content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">เลขบัตร 13 หลัก</th>
                                        <th scope="col">รหัสผ่าน</th>
                                        <th scope="col">คำนำหน้า</th>
                                        <th scope="col">ชื่อ - สกุล</th>
                                        <th scope="col">หน่วยงาน</th>
                                        <th scope="col">แก้ไขข้อมูลส่วนตัว</th>
                                        <th scope="col">แก้ไขข้อมูลเงินเดือน</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    $chk_page = (isset($chk_page)) ? $chk_page : null;
                                    $q = "SELECT * FROM login WHERE 1 ";
                                    // เงื่อนไขการค้นหา ถ้ามีการส่งค่า ตัวแปร $_GET['keyword'] 
                                    if (isset($_GET['keyword']) && $_GET['keyword'] != "") {
                                        // ต่อคำสั่ง sql 
                                        $q .= " AND id_login LIKE '%" . trim($_GET['keyword']) . "%' OR fname LIKE '%" . trim($_GET['keyword']) . "%' OR txtoffice LIKE '%" . trim($_GET['keyword']) . "%' ";
                                    }
                                    $qr = @mysqli_query($condb, $q);

                                    $total = @mysqli_num_rows($qr);
                                    $e_page = 10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
                                    if (!isset($_GET['pages'])) {
                                        $_GET['pages'] = 0;
                                    } else {
                                        $_GET['pages'] = $_GET['pages'] - 1;
                                        if ($_GET['pages'] < 0) {
                                            $_GET['pages'] = 0;
                                        }
                                        $chk_page = $_GET['pages'];
                                        $_GET['pages'] = $_GET['pages'] * $e_page;
                                    }
                                    $q .= "LIMIT " . $_GET['pages'] . ",$e_page";

                                    $qr = @mysqli_query($condb, $q);
                                    if (@mysqli_num_rows($qr) >= 1) {
                                        $plus_p = ($chk_page * $e_page) + @mysqli_num_rows($qr);
                                    } else {
                                        $plus_p = ($chk_page * $e_page);
                                    }
                                    $total_p = ceil($total / $e_page);
                                    $before_p = ($chk_page * $e_page) + 1;
                                    /// END PAGE NAVI ZONE			

                                    while ($rs = @mysqli_fetch_array($qr)) {
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><a class="table-bt" href="data_user.php?itemId=<?= $rs['id_login']; ?>" role="button"><?= $rs['id_login']; ?></a></td>
                                            <td><?= $rs['pass']; ?></td>
                                            <td><?= $rs['pname']; ?></td>
                                            <td><a class="table-bt" href="data_user.php?itemId=<?= $rs['id_login']; ?>" role="button"><?= $rs['fname']; ?></a></td>
                                            <td><?= $rs['txtoffice']; ?></td>
                                            <td>
                                                <a type="button" class="table-bt fas fa-edit ml-2" href="reset_pass.php?itemId=<?= $rs['id_login'];  ?>" role="button" style="color:steelblue;">
                                                </a>
                                            </td>
                                            <td>
                                                <a type="button" class="table-bt fa-solid fa-database ml-2" href="data_user.php?itemId=<?= $rs['id_login'];  ?>" role="button" style="color:steelblue;">
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>

                                </tbody>
                            </table>

                            <div style="margin:auto;width:100%;">
                                <?php if ($total > 10) { ?>
                                    <div class="browse_page">
                                        <?php
                                        if (count($_GET) <= 1) {
                                            $urlquery_str = "?";
                                        } else {
                                            $para_get = "";
                                            foreach ($_GET as $key => $value) {
                                                if ($key != "pages") {
                                                    $para_get .= $key . "=" . $value . "&";
                                                }
                                            }
                                            $urlquery_str = "?$para_get";
                                        }
                                        // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า      
                                        page_navi($before_p, $plus_p, $total, $total_p, $chk_page);
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include "./components/footer.php" ?>



<?php
mysqli_close($condb);
