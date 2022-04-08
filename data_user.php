<?php
require 'connect.php'; //เชื่อมฐานข้อมูล
session_start();
$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
$sess_id = $_SESSION['id_admin'];
if ($sess_id == "") {
    header("location:index.php");
}



?>
<?php
$chk_page = (isset($chk_page)) ? $chk_page : null;
// ฟังก์ชั่นสำหรับการแบ่งหน้า NEW MODIFY
function page_navi($before_p, $plus_p, $total, $total_p, $chk_page)
{
    global $urlquery_str;
    $pPrev = $chk_page - 1;
    $pPrev = ($pPrev >= 0) ? $pPrev : 0;
    $pNext = $chk_page + 1;
    $pNext = ($pNext >= $total_p) ? $total_p - 1 : $pNext;
    $lt_page = $total_p - 4;
    if ($chk_page > 0) {
        echo "<a  href='$urlquery_str" . "pages=" . intval($pPrev + 1) . "' class='naviPN'>Prev</a>";
    }
    if ($total_p >= 11) {
        if ($chk_page >= 4) {
            echo "<a $nClass href='$urlquery_str" . "pages=1'>1</a><a class='SpaceC'>. . .</a>";
        }
        if ($chk_page < 4) {
            for ($i = 0; $i < $total_p; $i++) {
                $nClass = ($chk_page == $i) ? "class='selectPage'" : "";
                if ($i <= 4) {
                    echo "<a $nClass href='$urlquery_str" . "pages=" . intval($i + 1) . "'>" . intval($i + 1) . "</a> ";
                }
                if ($i == $total_p - 1) {
                    echo "<a class='SpaceC'>. . .</a><a $nClass href='$urlquery_str" . "pages=" . intval($i + 1) . "'>" . intval($i + 1) . "</a> ";
                }
            }
        }
        if ($chk_page >= 4 && $chk_page < $lt_page) {
            $st_page = $chk_page - 3;
            for ($i = 1; $i <= 5; $i++) {
                $nClass = ($chk_page == ($st_page + $i)) ? "class='selectPage'" : "";
                echo "<a $nClass href='$urlquery_str" . "pages=" . intval($st_page + $i + 1) . "'>" . intval($st_page + $i + 1) . "</a> ";
            }
            for ($i = 0; $i < $total_p; $i++) {
                if ($i == $total_p - 1) {
                    $nClass = ($chk_page == $i) ? "class='selectPage'" : "";
                    echo "<a class='SpaceC'>. . .</a><a $nClass href='$urlquery_str" . "pages=" . intval($i + 1) . "'>" . intval($i + 1) . "</a> ";
                }
            }
        }
        if ($chk_page >= $lt_page) {
            for ($i = 0; $i <= 4; $i++) {
                $nClass = ($chk_page == ($lt_page + $i - 1)) ? "class='selectPage'" : "";
                echo "<a $nClass href='$urlquery_str" . "pages=" . intval($lt_page + $i) . "'>" . intval($lt_page + $i) . "</a> ";
            }
        }
    } else {
        for ($i = 0; $i < $total_p; $i++) {
            $nClass = ($chk_page == $i) ? "class='selectPage'" : "";
            echo "<a href='$urlquery_str" . "pages=" . intval($i + 1) . "' $nClass  >" . intval($i + 1) . "</a> ";
        }
    }
    if ($chk_page < $total_p - 1) {
        echo "<a href='$urlquery_str" . "pages=" . intval($pNext + 1) . "'  class='naviPN'>Next</a>";
    }
}
?><?php
    $perpage = 5;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $start = ($page - 1) * $perpage;

    ?>

<?php include "./components/header.php" ?>

<div class="container mt-5">

    <h3 class="text-center">
        <span class="text-center text-success"><strong>รายการ Slip รายบุคคล</strong></span><!-- Main component for a primary marketing message or call to action --><br>
    </h3>

    <div class="mt-4 content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped text-center">
                                <thead>
                                    <tr>
                                        <th>เลขที่</th>
                                        <th>วันที่จ่าย</th>
                                        <th>เลขที่รหัส</th>
                                        <th>คำนำหน้า</th>
                                        <th>ชื่อ - สกุล</th>
                                        <th>เลขที่บัตร</th>
                                        <th>เลขที่บัญชี</th>
                                        <th>หน่วยงาน</th>
                                        <th>เงินเดือน</th>
                                        <th>เลือก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $id = $itemId;
                                    $q = "SELECT * from payslip   WHERE cid = '" . $id . "' order by date DESC ";
                                    // $q = "SELECT * from payslip";
                                    $qr = @mysqli_query($condb, $q);

                                    $total = @mysqli_num_rows($qr);
                                    ?> <?php
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

                                        while ($rs = @mysqli_fetch_array($qr)) { ?>

                                    
                                        
                                        <tr>
                                            <td><a class="table-bt" href="edit_price_user.php?itemId=<?= $rs['cid']; ?>" role="button"><?php echo $rs['id']; ?></a></td>
                                            <td><?php echo $rs['date']; ?></td>
                                            <td><?php echo $rs['id_num']; ?></td>
                                            <td><?php echo $rs['title']; ?></td>
                                            <td><?php echo $rs['name']; ?></td>
                                            <td><?php echo $rs['cid']; ?></td>
                                            <td><?php echo $rs['bank_id']; ?></td>
                                            <td><?php echo $rs['txtoffice']; ?></td>
                                            <td><?php echo $rs['salary']; ?></td>
                                            <td>
                                                <a type="button" class="table-bt fa-solid fa-pen ml-2" href="edit_price_user.php?itemId=<?= $rs['id_num']; ?>" role="button" style="color:gold;">
                                                </a>
                                            </td>


                                        </tr><?php  } ?>

                                </tbody>
                            </table>

                            

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
