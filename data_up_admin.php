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



						$id_num = isset($row[0]) ? $row[0] : '';
						$pname = isset($row[1]) ? $row[1] : '';
						$name = isset($row[2]) ? $row[2] : '';
						$cid = isset($row[3]) ? $row[3] : '';
						$booking_id = isset($row[4]) ? $row[4] : '';
						$txtoffice = isset($row[5]) ? $row[5] : '';
						$salary = isset($row[6]) ? $row[6] : '';
						$social = isset($row[7]) ? $row[7] : '';
						$pks = isset($row[8]) ? $row[8] : '';
						$borrow = isset($row[9]) ? $row[9] : '';
						$bin = isset($row[10]) ? $row[10] : '';
						$clean = isset($row[11]) ? $row[11] : '';
						$cooperative = isset($row[12]) ? $row[12] : '';
						$balance = isset($row[13]) ? $row[13] : '';
						$remark = isset($row[14]) ? $row[14] : '';
						




						$query = "INSERT INTO payslip (date,id_num,pname,name,cid,booking_id,txtoffice,salary,social,pks,borrow,bin,clean,cooperative,balance,remark) 
								values('" . $date . "','" . $id_num . "','" . $pname . "','" . $name . "','" . $cid . "','" . $booking_id . "','" . $txtoffice . "','" . $salary . "','"
							. $social . "','" . $pks . "','" . $borrow . "','" . $bin . "','" . $clean . "','" . $cooperative . "','" . $balance . "','" . $remark . "')";


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
	<form method="POST" action="<//?php  echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
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
</center>  -->




<?php include "./components/footer.php"?>
<?php
mysqli_close($condb);
