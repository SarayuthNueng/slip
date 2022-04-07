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

<?php include "./components/header_user.php" ?>

<div class="container mt-5">
  <h3 class="mb-3 text-center">
    <span class="text-center text-success"><strong>รายการแจ้งยอดเงิน รายเดือน</strong></span><!-- Main component for a primary marketing message or call to action --><br>
  </h3>

		<div class="text-center mt-4 content container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="datatable table table-stripped">
									<thead>
										<tr>
											<th>กรุณาเลือกเพื่อดูรายละเอียด</th>
											<th>รับรวม</th>
											<th>หักรวม</th>
											<th>คงเหลือ</th>
										</tr>
                                        <?php $strSQL = "SELECT * FROM  payslip WHERE id = '" . $_SESSION['id_login'] . "' ORDER BY date DESC ";
                $objQuery = mysqli_query($condb, $strSQL);

                ?>
                <?php while ($objResult = mysqli_fetch_assoc($objQuery)) { ?>
                    <tr>
                        <td>
                            <h4><a href="slip.php?id_date=<?= $objResult['date']; ?>" role="button"><?php


                                                                                                    $eng_date = strtotime($objResult['date']);
                                                                                                //    echo thai_date($eng_date); 
                                                                                                echo thaidate('j F พ.ศ. Y',$eng_date);?></a></h4>
                        </td>
                        <td><?php $rub = $objResult['salary'] + $objResult['type11'] + $objResult['type12'] + $objResult['type13']
                                                + $objResult['type14'] + $objResult['type15'] + $objResult['type16'] + $objResult['type17'] + $objResult['type18'] + $objResult['type19'] + $objResult['type20'] + $objResult['type21'] + $objResult['type22'] + $objResult['type23'] + $objResult['type24'] + $objResult['type25'] + $objResult['type26'] + $objResult['type27'] + $objResult['type28'] + $objResult['type29'] + $objResult['type30'] + $objResult['type31'] + $objResult['type32'] + $objResult['type33'] + $objResult['type34'] + $objResult['type35'] + $objResult['type36'] + $objResult['type37'];
                                            echo number_format($rub, 0); ?>
                        </td>
                        <td><?php $jray = $objResult['tax'] + $objResult['assur_dd'] + $objResult['saving'] + $objResult['kid']
                                                + $objResult['gpf'] + $objResult['pfund'] + $objResult['soc'] + $objResult['type51'] + $objResult['type52'] + $objResult['type53'] + $objResult['type54'] + $objResult['type55'] + $objResult['type56'] + $objResult['type57'] + $objResult['type58'] + $objResult['type59'] + $objResult['type60'] + $objResult['type61'] + $objResult['type62'] + $objResult['type63'] + $objResult['type64'] + $objResult['type65'] + $objResult['type66'] + $objResult['type67'] + $objResult['type68'] + $objResult['type69'] + $objResult['type70'] + $objResult['type71'] + $objResult['type72'];
                                            echo number_format($jray, 0); ?>
                        </td>
                        <td><?php echo number_format($rub - $jray, 0); ?>
                        </td>

                    </tr><?php } ?>
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
