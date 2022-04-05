<?php
session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล
include './thaidate/Rundiz/Thaidate/Thaidate.php';
include './thaidate/Rundiz/Thaidate/thaidate-functions.php';

$sess_id = $_SESSION['id_login'];
if ($sess_id == "") {
    header("location:index.php");
}


// $thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
// $thai_month_arr = array(
//     "0" => "",
//     "1" => "ม.ค.",
//     "2" => "ก.พ.",
//     "3" => "มี.ค.",
//     "4" => "เม.ย.",
//     "5" => "พ.ค.",
//     "6" => "มิ.ย.",
//     "7" => "ก.ค.",
//     "8" => "ส.ค.",
//     "9" => "ก.ย.",
//     "10" => "ต.ค.",
//     "11" => "พ.ย.",
//     "12" => "ธ.ค."
// );
// function thai_date($time)
// {
//     global $thai_day_arr, $thai_month_arr;
//     $thai_date_return = " " . date("j", $time);
//     $thai_date_return = " " . $thai_month_arr[date("n", $time)];
//     $thai_date_return = " " . (date("Yํ", $time) + 543);

//     return $thai_date_return;
// }

// function DateThai($strDate)
// {
// $strYear = date("Y",strtotime($strDate))+543;
// $strMonth= date("n",strtotime($strDate));
// $strDay= date("j",strtotime($strDate));
// $strHour= date("H",strtotime($strDate));
// $strMinute= date("i",strtotime($strDate));
// $strSeconds= date("s",strtotime($strDate));
// $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
// $strMonthThai=$strMonthCut[$strMonth];
// return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
// }
// $strDate = "2008-08-14 13:42:44";
// echo "ThaiCreate.Com Time now : ".DateThai($strDate);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบ Slip ออนไลน์</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/nava.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style type="text/css">
        .ห {
            color: #F00;
        }

        #cssmenu {
            border: none;
            border: 0px;
            margin: 0px;
            padding: 0px;
            /* <!--   font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; --> */
            font-size: 12px;
            color: #0000cc;
        }

        #cssmenu ul {
            background: #47b6f5;
            height: 42px;
            list-style: none;
            margin: 0;
            padding: 0;
            border-top: 2px solid #666666;
        }

        #cssmenu li {
            float: left;
            padding: 0px 9px 0px 9px;
        }

        #cssmenu li a {
            color: #666666;
            display: block;
            font-weight: bold;
            line-height: 42px;
            padding: 0px 10px;
            text-align: center;
            text-decoration: none;
        }

        #cssmenu li a:hover {
            color: #0000FF;
            text-decoration: none;
        }

        #cssmenu li ul {
            background: #C0C0C0;
            display: none;
            position: absolute;

        }

        #cssmenu li:hover ul {
            display: block;
        }

        #cssmenu li li {
            color: #000;
            display: block;
            float: none;
            padding: 0px;
            width: 200px;
        }

        #cssmenu li ul a {
            display: block;
            font-size: 12px;
            padding: 0px 10px 0px 15px;
            text-align: left;
        }

        #cssmenu li ul a:hover {
            background: #CCCCCC;
            color: #000000;
            opacity: 1.0;
            filter: alpha(opacity=100);
        }

        #cssmenu p {
            clear: left;
        }

        #cssmenu .active>a {
            background: #CCCCCC;
            color: #666666;
        }

        #cssmenu .active>a:hover {
            color: #0000cc;
        }

        body {
            background-color: #E6E6FA;
        }
    </style>
</head>

<body>
    <div class="container">

        <p>

            <!-- Static navbar --> <img src="images/h.png" alt="" width="100%" height="100%">
        </p>
        <table width="438" border="0">
            <tr>
                <td width="115"><a href="index3.php"><img src="images/i_Home_icon.gif" alt="" width="25" height="25">หน้าหลัก</a>&nbsp;</td>
                <td width="162"><a href="edit_pass.php"><img src="images/group_edit.png" alt="" width="25" height="25">แก้ไขข้อมูลส่วนตัว</a>&nbsp;</td>
                <td width="147"><A HREF="logout.php" onclick="return confirm('ยืนยันการออกจากระบบใช่หรือไม่')"><img src="images/lock_go.png" alt="" width="25" height="25">ออกจากระบบ</A>&nbsp;</td>
            </tr>
        </table>
        <!--/.container-fluid -->


        <!-- Main component for a primary marketing message or call to action -->

        ยินดีต้อนรับ คุณ &nbsp;<strong><?php echo $_SESSION['fname'] ?></strong>
        <center>
            <h3 class="text-success"><strong>รายการแจ้งยอดเงิน รายเดือน</strong></h3>
            <table width="85%" border="1">
                <tr bgcolor="#99CCCC">
                    <td align="center">
                        <h4>กรุณาเลือกเพื่อดูรายละเอียด</h4>
                    </td>
                    <td align="center">
                        <h4>รับรวม</h4>
                    </td>
                    <td align="center">
                        <h4>หักรวม</h4>
                    </td>
                    <td align="center">
                        <h4>คงเหลือ</h4>
                    </td>
                </tr>
                <?php $strSQL = "SELECT * FROM  payslip WHERE id = '" . $_SESSION['id_login'] . "' ORDER BY date DESC ";
                $objQuery = mysqli_query($condb, $strSQL);

                ?>
                <?php while ($objResult = mysqli_fetch_assoc($objQuery)) { ?>
                    <tr>
                        <td align="center">
                            <h4><a href="slip.php?id_date=<?= $objResult['date']; ?>" role="button"><?php


                                                                                                    $eng_date = strtotime($objResult['date']);
                                                                                                //    echo thai_date($eng_date); 
                                                                                                echo thaidate('j F พ.ศ. Y',$eng_date);?></a></h4>
                        </td>
                        <td align="center"><?php $rub = $objResult['salary'] + $objResult['type11'] + $objResult['type12'] + $objResult['type13']
                                                + $objResult['type14'] + $objResult['type15'] + $objResult['type16'] + $objResult['type17'] + $objResult['type18'] + $objResult['type19'] + $objResult['type20'] + $objResult['type21'] + $objResult['type22'] + $objResult['type23'] + $objResult['type24'] + $objResult['type25'] + $objResult['type26'] + $objResult['type27'] + $objResult['type28'] + $objResult['type29'] + $objResult['type30'] + $objResult['type31'] + $objResult['type32'] + $objResult['type33'] + $objResult['type34'] + $objResult['type35'] + $objResult['type36'] + $objResult['type37'];
                                            echo number_format($rub, 0); ?>
                        </td>
                        <td align="center"><?php $jray = $objResult['tax'] + $objResult['assur_dd'] + $objResult['saving'] + $objResult['kid']
                                                + $objResult['gpf'] + $objResult['pfund'] + $objResult['soc'] + $objResult['type51'] + $objResult['type52'] + $objResult['type53'] + $objResult['type54'] + $objResult['type55'] + $objResult['type56'] + $objResult['type57'] + $objResult['type58'] + $objResult['type59'] + $objResult['type60'] + $objResult['type61'] + $objResult['type62'] + $objResult['type63'] + $objResult['type64'] + $objResult['type65'] + $objResult['type66'] + $objResult['type67'] + $objResult['type68'] + $objResult['type69'] + $objResult['type70'] + $objResult['type71'] + $objResult['type72'];
                                            echo number_format($jray, 0); ?>
                        </td>
                        <td align="center"><?php echo number_format($rub - $jray, 0); ?>
                        </td>

                    </tr><?php } ?>
            </table>
            <p>&nbsp;</p>
        </center>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
mysqli_close($condb);
