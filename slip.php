<?php
session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล
include './thaidate/Rundiz/Thaidate/Thaidate.php';
include './thaidate/Rundiz/Thaidate/thaidate-functions.php';

$sess_id = $_SESSION['id_login'];

$id_date = $_REQUEST['id_date'];
if ($sess_id == "") {
	header("location:index.php");
}

$strSQL = "SELECT * FROM  payslip p LEFT JOIN login l on l.id_login = p.id  WHERE p.id = '" . $_SESSION['id_login'] . "' and p.date = '" . $id_date . "' ";
$objQuery = mysqli_query($condb, $strSQL);
$objResult = mysqli_fetch_array($objQuery);
?>

<?php include "./components/header_user.php" ?>

<div class="mt-4 container">
	<div class="mt-4 col-md-12">
		<a type="button" class="table-bt fa-solid fa-print ml-2 fa-2x" onclick="printDiv('divprint')" role="button" style="color:black;"></a>
		<!-- Main component for a primary marketing message or call to action -->
		<div id="divprint">

			<center>
				<table class="mt-4">
					<thead>
						<tr>
							<td colspan="3" rowspan="2" align="right"><img src="images/tra.png" alt="" width="99" height="99"></td>
							<td height="58" colspan="2" align="center">
								<h3><strong><U>ใบแจ้งยอดเงินเดือนและเงินอื่น</U></strong></h3>
							</td>
							<td width="196">&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td height="29" colspan="2" align="center">
								<h4>โรงพยาบาลสมเด็จ</h4>
							</td>
							<td height="29" align="center">&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="6" align="center">
								<p class="a">389 หมู่ 2 ต.สมเด็จ อ.สมเด็จ จ.กาฬสินธุ์ 46150 โทร 043861140 งานการเงินต่อ 311 </p>
							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td width="80">&nbsp;</td>
							<td width="306">&nbsp;</td>
							<td width="79">&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td width="102">&nbsp;</td>
							<td width="4">&nbsp;</td>
							<td colspan="2"><strong>ชื่อ - สกุล :</strong> <?php echo $objResult['pname'];
																			echo $objResult['fname'] ?></td>
							<td colspan="2"><strong>เลขที่ :</strong> <?php echo $objResult['no']; ?></td>
							<td width="14">&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td colspan="3"><strong>ประจำเดือน :</strong><?php


																			$eng_date = strtotime($objResult['date']);
																			echo thaidate('F พ.ศ. Y', $eng_date); ?></td>
							<td colspan="2"><strong>หน่วยงาน :</strong> <?php echo $objResult['txtoffice']; ?></td>
							<td>&nbsp;</td>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</center>


			<div class="mt-4 text-center content container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="datatable table table-stripped">
										<thead>
											<tr>
												<th>
													<h4>
														<center>รายการรับ</center>
													</h4>
												</th>
												<th>
													<h4>
														<center>
															รายการหัก</center>
													</h4>
												</th>

											</tr>
											<tr>
												<th>
													<table>
														<tr>

															<td width="16"><?php
																			$nnull = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
																			$salary = "เงินเดือน";
																			$type11 = "ตอบแทนเงินบำรุง (OT)";
																			$type12 = "ตอบแทนคลีนิคเบาหวาน";
																			$type13 = "ค่าตอบแทน ฉ.11";
																			$type14 = "ไม่ทำเวช";
																			$type15 = "เงินประจำตำแหน่ง";
																			$type16 = "เงินเพิ่มค่าครองชีพ";
																			$type17 = "ค่าตอบแทนเต็มขั้น ครม.";
																			$type18 = "ค่าตอบแทนพิเศษ 2% 4%";
																			$type19 = "เงินตกเบิกผู้เชี่ยวชาญ";
																			$type20 = "ตกเบิกเงินเดือน";
																			$type21 = "เงินตอบแทน วช(ครม)";
																			$type22 = "เงินโบนัสปี 47";
																			$type23 = "พ.ต.ส.";
																			$type24 = "OT ค่าตอบแทนโครงการอื่น";
																			$type25 = "ค่าตอบแทนเท่าเงินประจำตำแหน่ง";
																			$type26 = "ค่าเบี้ยเลี้ยเหมาจ่าย (งปม.)";
																			$type27 = "ค่าตอบแทน ฉ.11";
																			$type28 = "ตอบแทนแพทย์สาขาส่งเสริมพิเศษ";
																			$type29 = "เงินรางวัลประจำปี 2550";
																			$type30 = "ตกเบิกเงินประจำตำแหน่ง";
																			$type31 = "ตกเบิกค่าตอบแทนแพทย์สาขาส่งเสริมพิเศษ";
																			$type32 = "ค่าตอบแทน ฉ.11";
																			$type33 = "ตกเบิกเงิน พ.ต.ส.";
																			$type34 = "รายรับอื่นๆ";
																			$type35 = "ตกเบิกค่าครองชีพ";
																			$type36 = "ค่าการศึกษาบุตร";
																			$type37 = "ค่ารักษาพยาบาล";
																			$type38 = "ค่าตอบแทนชันสูตรพริกศพ";						?></td>
															<td width="316" align="right">
																<h5>
																	<?php if ($objResult['salary'] > 0) {
																		echo $salary;
																		echo $nnull;
																		echo number_format($objResult['salary'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type11'] > 0) {
																		echo $type11;
																		echo $nnull;
																		echo number_format($objResult['type11'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type12'] > 0) {
																		echo $type12;
																		echo $nnull;
																		echo number_format($objResult['type12'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type13'] > 0) {
																		echo $type13;
																		echo $nnull;
																		echo number_format($objResult['type13'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type14'] > 0) {
																		echo $type14;
																		echo $nnull;
																		echo number_format($objResult['type14'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type15'] > 0) {
																		echo $type15;
																		echo $nnull;
																		echo number_format($objResult['type15'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type16'] > 0) {
																		echo $type16;
																		echo $nnull;
																		echo number_format($objResult['type16'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type17'] > 0) {
																		echo $type17;
																		echo $nnull;
																		echo number_format($objResult['type17'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type18'] > 0) {
																		echo $type18;
																		echo $nnull;
																		echo number_format($objResult['type18'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type19'] > 0) {
																		echo $type19;
																		echo $nnull;
																		echo number_format($objResult['type19'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type20'] > 0) {
																		echo $type20;
																		echo $nnull;
																		echo number_format($objResult['type20'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type21'] > 0) {
																		echo $type21;
																		echo $nnull;
																		echo number_format($objResult['type21'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type22'] > 0) {
																		echo $type22;
																		echo $nnull;
																		echo number_format($objResult['type22'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type23'] > 0) {
																		echo $type23;
																		echo $nnull;
																		echo number_format($objResult['type23'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type24'] > 0) {
																		echo $type24;
																		echo $nnull;
																		echo number_format($objResult['type24'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type25'] > 0) {
																		echo $type25;
																		echo $nnull;
																		echo number_format($objResult['type25'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type26'] > 0) {
																		echo $type26;
																		echo $nnull;
																		echo number_format($objResult['type26'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type27'] > 0) {
																		echo $type27;
																		echo $nnull;
																		echo number_format($objResult['type27'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type28'] > 0) {
																		echo $type28;
																		echo $nnull;
																		echo number_format($objResult['type28'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type29'] > 0) {
																		echo $type29;
																		echo $nnull;
																		echo number_format($objResult['type29'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type30'] > 0) {
																		echo $type30;
																		echo $nnull;
																		echo number_format($objResult['type30'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type31'] > 0) {
																		echo $type31;
																		echo $nnull;
																		echo number_format($objResult['type31'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type32'] > 0) {
																		echo $type32;
																		echo $nnull;
																		echo number_format($objResult['type32'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type33'] > 0) {
																		echo $type33;
																		echo $nnull;
																		echo number_format($objResult['type33'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type34'] > 0) {
																		echo $type34;
																		echo $nnull;
																		echo number_format($objResult['type34'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type35'] > 0) {
																		echo $type35;
																		echo $nnull;
																		echo number_format($objResult['type35'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type36'] > 0) {
																		echo $type36;
																		echo $nnull;
																		echo number_format($objResult['type36'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type37'] > 0) {
																		echo $type37;
																		echo $nnull;
																		echo number_format($objResult['type37'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type38'] > 0) {
																		echo $type38;
																		echo $nnull;
																		echo number_format($objResult['type38'], 2);
																	}  ?>
																</h5>
															</td>
															<td width="12" align="right">
																<h5>&nbsp;</h5>
															</td>
														</tr>
													</table>
												</th>
												<th>

													<table>
														<tr>
															<td width="22"><?php
																			$saving = "สหกรณ์";
																			$kid = "kid";
																			$gpf = "กบข.";
																			$pfund = "กสจ";
																			$soc = "ประกันสังคม";
																			$type51 = "ค่าภาษี(เงินงบประมาณ)";
																			$type52 = "ประกันสังคม";
																			$type53 = "สหกรณ์";
																			$type54 = "ค่าเงินกู้ ธ.อาคารสงเคราะห์";
																			$type55 = "ค่าเงินประกัน AIA";
																			$type56 = "หักเงินเดือนตกเบิกประกันสังคม";
																			$type57 = "ค่าไทยประกัน";
																			$type58 = "หักวันลากิจ";
																			$type59 = "ค่าไฟฟ้า";
																			$type60 = "ค่า ธ.ออมสิน";
																			$type61 = "ชดใช้เงินยืม";
																			$type62 = "ค่าอาหาร";
																			$type63 = "ค่ากองทุน รพร.";
																			$type64 = "หักตกเบิก กบข";
																			$type65 = "หักตกเบิก กสจ";
																			$type66 = "ค่าภาษีส่งอำเภอ(OT)";
																			$type67 = "ค่า ฌกส";
																			$type68 = "อื่นๆ";
																			$type69 = "เงินกู้ ธกส.";
																			$type70 = "เงินกู้ กยศ. / กรอ.";
																			$type71 = "หักทำงานไม่ครบ";
																			$type72 = "เงินกู้ กรุงไทย";  ?></td>
															<td width="301" align="right">
																<h5>
																	<?php if ($objResult['saving'] > 0) {
																		echo $saving;
																		echo $nnull;
																		echo number_format($objResult['saving'], 2);
																		echo "<br>";
																	}
																	if ($objResult['kid'] > 0) {
																		echo $kid;
																		echo $nnull;
																		echo number_format($objResult['kid'], 2);
																		echo "<br>";
																	}
																	if ($objResult['gpf'] > 0) {
																		echo $gpf;
																		echo $nnull;
																		echo number_format($objResult['gpf'], 2);
																		echo "<br>";
																	}
																	if ($objResult['pfund'] > 0) {
																		echo $pfund;
																		echo $nnull;
																		echo number_format($objResult['pfund'], 2);
																		echo "<br>";
																	}
																	if ($objResult['soc'] > 0) {
																		echo $soc;
																		echo $nnull;
																		echo number_format($objResult['soc'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type51'] > 0) {
																		echo $type51;
																		echo $nnull;
																		echo number_format($objResult['type51'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type52'] > 0) {
																		echo $type52;
																		echo $nnull;
																		echo number_format($objResult['type52'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type53'] > 0) {
																		echo $type53;
																		echo $nnull;
																		echo number_format($objResult['type53'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type54'] > 0) {
																		echo $type54;
																		echo $nnull;
																		echo number_format($objResult['type54'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type55'] > 0) {
																		echo $type55;
																		echo $nnull;
																		echo number_format($objResult['type55'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type56'] > 0) {
																		echo $type56;
																		echo $nnull;
																		echo number_format($objResult['type56'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type57'] > 0) {
																		echo $type57;
																		echo $nnull;
																		echo number_format($objResult['type57'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type58'] > 0) {
																		echo $type58;
																		echo $nnull;
																		echo number_format($objResult['type58'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type59'] > 0) {
																		echo $type59;
																		echo $nnull;
																		echo number_format($objResult['type59'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type60'] > 0) {
																		echo $type60;
																		echo $nnull;
																		echo number_format($objResult['type60'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type61'] > 0) {
																		echo $type61;
																		echo $nnull;
																		echo number_format($objResult['type61'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type62'] > 0) {
																		echo $type62;
																		echo $nnull;
																		echo number_format($objResult['type62'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type63'] > 0) {
																		echo $type63;
																		echo $nnull;
																		echo number_format($objResult['type63'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type64'] > 0) {
																		echo $type64;
																		echo $nnull;
																		echo number_format($objResult['type64'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type65'] > 0) {
																		echo $type65;
																		echo $nnull;
																		echo number_format($objResult['type65'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type66'] > 0) {
																		echo $type66;
																		echo $nnull;
																		echo number_format($objResult['type66'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type67'] > 0) {
																		echo $type67;
																		echo $nnull;
																		echo number_format($objResult['type67'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type68'] > 0) {
																		echo $type68;
																		echo $nnull;
																		echo number_format($objResult['type68'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type69'] > 0) {
																		echo $type69;
																		echo $nnull;
																		echo number_format($objResult['type69'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type70'] > 0) {
																		echo $type70;
																		echo $nnull;
																		echo number_format($objResult['type70'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type71'] > 0) {
																		echo $type71;
																		echo $nnull;
																		echo number_format($objResult['type71'], 2);
																		echo "<br>";
																	}
																	if ($objResult['type72'] > 0) {
																		echo $type72;
																		echo $nnull;
																		echo number_format($objResult['type72'], 2);
																	}  ?>
																</h5>
															</td>
															<td width="11" align="right">
																<h5>&nbsp;</h5>
															</td>
															<?php
															$rub = $objResult['salary'] + $objResult['type11'] + $objResult['type12'] + $objResult['type13']
																+ $objResult['type14'] + $objResult['type15'] + $objResult['type16'] + $objResult['type17'] + $objResult['type18'] + $objResult['type19'] + $objResult['type20'] + $objResult['type21'] + $objResult['type22'] + $objResult['type23'] + $objResult['type24'] + $objResult['type25'] + $objResult['type26'] + $objResult['type27'] + $objResult['type28'] + $objResult['type29'] + $objResult['type30'] + $objResult['type31'] + $objResult['type32'] + $objResult['type33'] + $objResult['type34'] + $objResult['type35'] + $objResult['type36'] + $objResult['type37'];

															$jray = $objResult['tax'] + $objResult['assur_dd'] + $objResult['saving'] + $objResult['kid']
																+ $objResult['gpf'] + $objResult['pfund'] + $objResult['soc'] + $objResult['type51'] + $objResult['type52'] + $objResult['type53'] + $objResult['type54'] + $objResult['type55'] + $objResult['type56'] + $objResult['type57'] + $objResult['type58'] + $objResult['type59'] + $objResult['type60'] + $objResult['type61'] + $objResult['type62'] + $objResult['type63'] + $objResult['type64'] + $objResult['type65'] + $objResult['type66'] + $objResult['type67'] + $objResult['type68'] + $objResult['type69'] + $objResult['type70'] + $objResult['type71'] + $objResult['type72'];
															$sumd = $rub - $jray

															?>
														</tr>
													</table>
												</th>
											</tr>
											<tr>
												<th>
													<table>
														<tr>
															<td align="right">
																<h5>รวมรับทั้งหมด</h5>
															</td>
															<td align="right">
																<h5>
																	<?php

																	echo number_format($rub, 2); ?>
																</h5>
															</td>
															<td align="right">
																<h5>&nbsp;</h5>
															</td>
														</tr>
														<tr>
															<td width="209" align="right">
																<h5>รับสุทธิ</h5>
															</td>
															<td width="124" align="right">
																<h5><?php echo number_format($sumd, 2); ?></h5>
															</td>
															<td width="12" align="right">
																<h5>&nbsp;</h5>
															</td>
														</tr>
													</table>
												</th>
												<th>
													<table>
														<tr>
															<td width="198" align="right">
																<h5>รวมหักทั้งหมด</h5>
															</td>
															<td width="126" align="right">
																<h5>
																	<?php

																	echo number_format($jray, 2); ?>
																</h5>
															</td>
															<td width="12" align="right">
																<h5>&nbsp;</h5>
															</td>
														</tr>
													</table>
												</th>
											</tr>
										</thead>


									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<center>
				<table>
					<tr>
						<td height="22">&nbsp;</td>
						<td align="center">&nbsp;</td>
						<td width="305" rowspan="4">
							<table width="305" border="0">
								<tr>
									<td align="center"><img src="images/123.png" width="100" height="100"></td>
								</tr>
								<tr>
									<td align="center">นางลำดวน &nbsp;วงศ์พิพัฒน์</td>
								</tr>
								<tr>
									<td align="center">เจ้าพนักงานการเงินและบัญชี ชำนาญงาน</td>
								</tr>
								<tr>
									<td height="22" align="center">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td width="305">&nbsp;</td>
						<td width="100" align="center">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="100" align="center">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td width="100" align="center">&nbsp;</td>
					</tr>
				</table>
			</center>
		</div>
	</div>
	<br>

	<script type="text/javascript">
		function printDiv(divName) {
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;
			window.print();

			document.body.innerHTML = originalContents;


		}
	</script>



	<?php
	mysqli_close($condb);
