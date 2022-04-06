<?php
session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล

$sess_id = $_SESSION['id_admin'];
if ($sess_id == "") {
	header("location:index.php");
}



?>
<?php
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
<h3 class="mb-3 text-center">
		<span class="text-center text-success"><strong>อัพโหลดไฟล์เงินเดือน ภายในโรงพยาบาล</strong></span><!-- Main component for a primary marketing message or call to action --><br>
	</h3>
</div>


<!-- Main  -->
<?php
/*
			$result = mysql_query('select * from payslip limit 10;') ;

			while($record = mysql_fetch_array($result) )
			{
			echo "$record[name] is in $record[name]"."<br>";
			}*/
if (isset($_POST['submit'])) {

	if ($_POST['textdate'] != "") {




		if (isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
			$allowedExtensions = array("xls", "xlsx");
			$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);

			if (in_array($ext, $allowedExtensions)) {

				$file = "uploads/" . $_FILES['uploadFile']['name'];
				$isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);

				if ($isUploaded) {

					require_once __DIR__ . '/vendor/autoload.php';
					include(__DIR__ . '/vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php');


					try {

						$objPHPExcel = PHPExcel_IOFactory::load($file);
					} catch (Exception $e) {
						die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME) . '": ' . $e->getMessage());
					}


					$sheet = $objPHPExcel->getSheet(0);
					$total_rows = $sheet->getHighestRow();
					$highestColumn      = $sheet->getHighestColumn();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);


					for ($row = 2; $row <= $total_rows; ++$row) {
						for ($col = 0; $col < $highestColumnIndex; ++$col) {
							$cell = $sheet->getCellByColumnAndRow($col, $row);
							$val = $cell->getValue();
							$records[$row][$col] = $val;
						}
					}

					foreach ($records as $row) {

						$date_sub = explode("/", $_POST['textdate']);
						$date = ($date_sub[2] - 543) . "-" . $date_sub[1] . "-" . $date_sub[0];



						$no = isset($row[0]) ? $row[0] : '';
						$title = isset($row[1]) ? $row[1] : '';
						$name = isset($row[2]) ? $row[2] : '';
						$id = isset($row[3]) ? $row[3] : '';
						$bank_id = isset($row[4]) ? $row[4] : '';
						$office = isset($row[5]) ? $row[5] : '';
						$txtoffice = isset($row[6]) ? $row[6] : '';
						$salary = isset($row[7]) ? $row[7] : '';
						$tax = isset($row[8]) ? $row[8] : '';
						$assur_dd = isset($row[9]) ? $row[9] : '';
						$saving = isset($row[10]) ? $row[10] : '';
						$kid = isset($row[11]) ? $row[11] : '';
						$gpf = isset($row[12]) ? $row[12] : '';
						$pfund = isset($row[13]) ? $row[13] : '';
						$soc = isset($row[14]) ? $row[14] : '';
						$total = isset($row[15]) ? $row[15] : '';
						$type0 = isset($row[16]) ? $row[16] : '';
						$type1 = isset($row[17]) ? $row[17] : '';
						$type2 = isset($row[18]) ? $row[18] : '';
						$type3 = isset($row[19]) ? $row[19] : '';
						$type4 = isset($row[20]) ? $row[20] : '';
						$type5 = isset($row[21]) ? $row[21] : '';
						$type6 = isset($row[22]) ? $row[22] : '';
						$type7 = isset($row[23]) ? $row[23] : '';
						$type8 = isset($row[24]) ? $row[24] : '';
						$type9 = isset($row[25]) ? $row[25] : '';
						$type10 = isset($row[26]) ? $row[26] : '';
						$type11 = isset($row[27]) ? $row[27] : '';
						$type12 = isset($row[28]) ? $row[28] : '';
						$type13 = isset($row[29]) ? $row[29] : '';
						$type14 = isset($row[30]) ? $row[30] : '';
						$type15 = isset($row[31]) ? $row[31] : '';
						$type16 = isset($row[32]) ? $row[32] : '';
						$type17 = isset($row[33]) ? $row[33] : '';
						$type18 = isset($row[34]) ? $row[34] : '';
						$type19 = isset($row[35]) ? $row[35] : '';
						$type20 = isset($row[36]) ? $row[36] : '';
						$type21 = isset($row[37]) ? $row[37] : '';
						$type22 = isset($row[38]) ? $row[38] : '';
						$type23 = isset($row[39]) ? $row[39] : '';
						$type24 = isset($row[40]) ? $row[40] : '';
						$type25 = isset($row[41]) ? $row[41] : '';
						$type26 = isset($row[42]) ? $row[42] : '';
						$type27 = isset($row[43]) ? $row[43] : '';
						$type28 = isset($row[44]) ? $row[44] : '';
						$type29 = isset($row[45]) ? $row[45] : '';
						$type30 = isset($row[46]) ? $row[46] : '';
						$type31 = isset($row[47]) ? $row[47] : '';
						$type32 = isset($row[48]) ? $row[48] : '';
						$type33 = isset($row[49]) ? $row[49] : '';
						$type34 = isset($row[50]) ? $row[50] : '';
						$type35 = isset($row[51]) ? $row[51] : '';
						$type36 = isset($row[52]) ? $row[52] : '';
						$type37 = isset($row[53]) ? $row[53] : '';
						$type38 = isset($row[54]) ? $row[54] : '';
						$type39 = isset($row[55]) ? $row[55] : '';
						$type40 = isset($row[56]) ? $row[56] : '';
						$type41 = isset($row[57]) ? $row[57] : '';
						$type42 = isset($row[58]) ? $row[58] : '';
						$type43 = isset($row[59]) ? $row[59] : '';
						$type44 = isset($row[60]) ? $row[60] : '';
						$type45 = isset($row[61]) ? $row[61] : '';
						$type46 = isset($row[62]) ? $row[62] : '';
						$type47 = isset($row[63]) ? $row[63] : '';
						$type48 = isset($row[64]) ? $row[64] : '';
						$type49 = isset($row[65]) ? $row[65] : '';
						$type50 = isset($row[66]) ? $row[66] : '';
						$type51 = isset($row[67]) ? $row[67] : '';
						$type52 = isset($row[68]) ? $row[68] : '';
						$type53 = isset($row[69]) ? $row[69] : '';
						$type54 = isset($row[70]) ? $row[70] : '';
						$type55 = isset($row[71]) ? $row[71] : '';
						$type56 = isset($row[72]) ? $row[72] : '';
						$type57 = isset($row[73]) ? $row[73] : '';
						$type58 = isset($row[74]) ? $row[74] : '';
						$type59 = isset($row[75]) ? $row[75] : '';
						$type60 = isset($row[76]) ? $row[76] : '';
						$type61 = isset($row[77]) ? $row[77] : '';
						$type62 = isset($row[78]) ? $row[78] : '';
						$type63 = isset($row[79]) ? $row[79] : '';
						$type64 = isset($row[80]) ? $row[80] : '';
						$type65 = isset($row[81]) ? $row[81] : '';
						$type66 = isset($row[82]) ? $row[82] : '';
						$type67 = isset($row[83]) ? $row[83] : '';
						$type68 = isset($row[84]) ? $row[84] : '';
						$type69 = isset($row[85]) ? $row[85] : '';
						$type70 = isset($row[86]) ? $row[86] : '';
						$type71 = isset($row[87]) ? $row[87] : '';
						$type72 = isset($row[88]) ? $row[88] : '';
						$type73 = isset($row[89]) ? $row[89] : '';
						$type74 = isset($row[90]) ? $row[90] : '';
						$type75 = isset($row[91]) ? $row[91] : '';
						$type76 = isset($row[92]) ? $row[92] : '';
						$type77 = isset($row[93]) ? $row[93] : '';
						$type78 = isset($row[94]) ? $row[94] : '';
						$type79 = isset($row[95]) ? $row[95] : '';
						$type80 = isset($row[96]) ? $row[96] : '';
						$type81 = isset($row[97]) ? $row[97] : '';
						$type82 = isset($row[98]) ? $row[98] : '';
						$type83 = isset($row[99]) ? $row[99] : '';
						$type84 = isset($row[100]) ? $row[100] : '';
						$type85 = isset($row[101]) ? $row[101] : '';
						$type86 = isset($row[102]) ? $row[102] : '';
						$type87 = isset($row[103]) ? $row[103] : '';
						$type88 = isset($row[104]) ? $row[104] : '';
						$type89 = isset($row[105]) ? $row[105] : '';
						$type90 = isset($row[106]) ? $row[106] : '';
						$type91 = isset($row[107]) ? $row[107] : '';
						$type92 = isset($row[108]) ? $row[108] : '';
						$type93 = isset($row[109]) ? $row[109] : '';
						$type94 = isset($row[110]) ? $row[110] : '';
						$type95 = isset($row[111]) ? $row[111] : '';
						$type96 = isset($row[112]) ? $row[112] : '';
						$type97 = isset($row[113]) ? $row[113] : '';
						$type98 = isset($row[114]) ? $row[114] : '';
						$type99 = isset($row[115]) ? $row[115] : '';




						$query = "INSERT INTO payslip (date,no,title,name,id,bank_id,office,txtoffice,salary,tax,assur_dd,saving,kid,gpf,pfund,soc,total,type0
						,type1
						,type2
						,type3
						,type4
						,type5
						,type6
						,type7
						,type8
						,type9
						,type10
						,type11
						,type12
						,type13
						,type14
						,type15
						,type16
						,type17
						,type18
						,type19
						,type20
						,type21
						,type22
						,type23
						,type24
						,type25
						,type26
						,type27
						,type28
						,type29
						,type30
						,type31
						,type32
						,type33
						,type34
						,type35
						,type36
						,type37
						,type38
						,type39
						,type40
						,type41
						,type42
						,type43
						,type44
						,type45
						,type46
						,type47
						,type48
						,type49
						,type50
						,type51
						,type52
						,type53
						,type54
						,type55
						,type56
						,type57
						,type58
						,type59
						,type60
						,type61
						,type62
						,type63
						,type64
						,type65
						,type66
						,type67
						,type68
						,type69
						,type70
						,type71
						,type72
						,type73
						,type74
						,type75
						,type76
						,type77
						,type78
						,type79
						,type80
						,type81
						,type82
						,type83
						,type84
						,type85
						,type86
						,type87
						,type88
						,type89
						,type90
						,type91
						,type92
						,type93
						,type94
						,type95
						,type96
						,type97
						,type98
						,type99) 
								values('" . $date . "','" . $no . "','" . $title . "','" . $name . "','" . $id . "','" . $bank_id . "','" . $office . "','" . $txtoffice . "','" . $salary . "','"
							. $tax . "','" . $assur_dd . "','" . $saving . "','" . $kid . "','" . $gpf . "','" . $pfund . "','" . $soc . "','" . $total . "','" . $type0 . "','"
							. $type1 . "','"
							. $type2 . "','"
							. $type3 . "','"
							. $type4 . "','"
							. $type5 . "','"
							. $type6 . "','"
							. $type7 . "','"
							. $type8 . "','"
							. $type9 . "','"
							. $type10 . "','"
							. $type11 . "','"
							. $type12 . "','"
							. $type13 . "','"
							. $type14 . "','"
							. $type15 . "','"
							. $type16 . "','"
							. $type17 . "','"
							. $type18 . "','"
							. $type19 . "','"
							. $type20 . "','"
							. $type21 . "','"
							. $type22 . "','"
							. $type23 . "','"
							. $type24 . "','"
							. $type25 . "','"
							. $type26 . "','"
							. $type27 . "','"
							. $type28 . "','"
							. $type29 . "','"
							. $type30 . "','"
							. $type31 . "','"
							. $type32 . "','"
							. $type33 . "','"
							. $type34 . "','"
							. $type35 . "','"
							. $type36 . "','"
							. $type37 . "','"
							. $type38 . "','"
							. $type39 . "','"
							. $type40 . "','"
							. $type41 . "','"
							. $type42 . "','"
							. $type43 . "','"
							. $type44 . "','"
							. $type45 . "','"
							. $type46 . "','"
							. $type47 . "','"
							. $type48 . "','"
							. $type49 . "','"
							. $type50 . "','"
							. $type51 . "','"
							. $type52 . "','"
							. $type53 . "','"
							. $type54 . "','"
							. $type55 . "','"
							. $type56 . "','"
							. $type57 . "','"
							. $type58 . "','"
							. $type59 . "','"
							. $type60 . "','"
							. $type61 . "','"
							. $type62 . "','"
							. $type63 . "','"
							. $type64 . "','"
							. $type65 . "','"
							. $type66 . "','"
							. $type67 . "','"
							. $type68 . "','"
							. $type69 . "','"
							. $type70 . "','"
							. $type71 . "','"
							. $type72 . "','"
							. $type73 . "','"
							. $type74 . "','"
							. $type75 . "','"
							. $type76 . "','"
							. $type77 . "','"
							. $type78 . "','"
							. $type79 . "','"
							. $type80 . "','"
							. $type81 . "','"
							. $type82 . "','"
							. $type83 . "','"
							. $type84 . "','"
							. $type85 . "','"
							. $type86 . "','"
							. $type87 . "','"
							. $type88 . "','"
							. $type89 . "','"
							. $type90 . "','"
							. $type91 . "','"
							. $type92 . "','"
							. $type93 . "','"
							. $type94 . "','"
							. $type95 . "','"
							. $type96 . "','"
							. $type97 . "','"
							. $type98 . "','"
							. $type99 . "')";


						//$mysqli->query($query);
						mysqli_query($condb, $query);
					}



					echo '<div class="col-md-12 container ">
				<div class=" alert alert-success alert-dismissible fade show" role="alert">
					<strong>ข้อมูลแทรกในฐานข้อมูลสำเร็จ!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  			</div>
			</div>';
					

					unlink($file);
				} else {
					echo '<div class="col-md-12 container ">
				<div class=" alert alert-danger alert-dismissible fade show" role="alert">
					<strong>ไม่ได้อัปโหลดไฟล์!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  			</div>
			</div>';

					
				}
			} else {
				echo '<div class="col-md-12 container ">
				<div class=" alert alert-danger alert-dismissible fade show" role="alert">
					<strong>โปรดอัปโหลดแผ่นงาน excel</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  			</div>
			</div>';

				
			}
		} else {
			echo '<div class="col-md-12 container ">
				<div class=" alert alert-danger alert-dismissible fade show" role="alert">
					<strong>โปรดอัปโหลดไฟล์ excel </strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  			</div>
			</div>';

			
		}
	} else {

		echo '<div class="col-md-12 container ">
				<div class=" alert alert-danger alert-dismissible fade show" role="alert">
					<strong>โปรดกรอกวันที่ </strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	  			</div>
			</div>';
	}
}
?>

<div class="container mt-5">

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<div class="row ">
			<div class="col-md-6">
				<div class="text-center row mb-3">
					<label for="inputPassword" class="col-sm-2 col-form-label">กรอกวันที่ :</label>
					<div class="col-sm-10">
						<input type="date" name="textdate" id="testdate5" value="" class="form-control" require>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="">
					<div class="text-center mb-3">
						<div class="row">
							<div class="col-md-5">
								<label for="formFile" class="form-label">เลือกอัพไฟล์เงินเดือน .xls, .xlsx :</label>
							</div>
							<div class="col-md-7">
								<input class="form-control" type="file" name="uploadFile" id="formFile">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center mt-4 mb-4 col-md-12 form-group">
			<button type="submit" name="submit" class="btn btn-success">อัพไฟล์เงินเดือน</button>
		</div>
	</form>
</div>

<!-- <center>
	<form method="POST" action="<//?php // echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label>วันที่</label>
			<input type="text" name="textdate" id="testdate5" value="" style="width:100px;" require>
		</div>
		<div class="form-group">
			<label>เลือกอัพไฟล์เงินเดือน .xls, .xlsx</label>
			<input type="file" name="uploadFile" class="form-control" />
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-success">อัพไฟล์เงินเดือน</button>
		</div>
	</form>
</center> -->




<?php include "./components/footer.php"?>
<?php
mysqli_close($condb);
