<?php session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล
session_start();
$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";


$id = $itemId;
$sql_show = "SELECT * from payslip   WHERE cid = '" . $id . "'";
$result_show = mysqli_query($condb, $sql_show) or die(mysqli_error($condb));
$row_show = mysqli_fetch_array($result_show);

$sess_id = $itemId;
?>

<?php include "./components/header.php" ?>

<div class="container mt-5">

  <h3 class="text-center">
    <span class="text-center text-success"><strong>แก้ไขข้อมูลเงินเดือน</strong></span><!-- Main component for a primary marketing message or call to action --><br>
  </h3>


  <div class=" mt-4 col-md-12 ">
    <form class="mb-3" name="form1" method="post" action="check_edit_price_user.php">
      <div class="row">
        <div class="col-4 form-group mb-3">
          <label>เลขที่</label>
          <input class="form-control" type="text" class="form-control" value="<?= $row_show['id_num'] ?>" name="id_num" id="id_num" readonly placeholder="เลขที่">
        </div>
        <div class="col-4 form-group mb-3">
          <label>เลขที่บัตรประชาชน</label>
          <input class="form-control" type="text" class="form-control" value="<?= $row_show['cid'] ?>" name="cid" id="cid" readonly placeholder="เลขที่บัตรประชาชน">
        </div>
        <div class="col-4 form-group mb-3">
          <label>ชื่อ - สกุล</label>
          <input class="form-control" type="text" class="form-control" value="<?= $row_show['name'] ?>" name="name" id="name" readonly placeholder="ชื่อ - สกุล">
        </div>
      </div>
      <div class="row">
        <div class="col-4 form-group mb-3">
          <label>เงินเดือน</label>
          <input class="form-control" type="text" class="form-control" value="" name="sarary" id="sarary" required placeholder="เงินเดือน">
        </div>
        <div class="col-4 form-group mb-3">
          <label>ประกันสังคม 5%</label>
          <input class="form-control" value="" name="social" id="social" required placeholder="ประกันสังคม 5%">
        </div>
        <div class="col-4 form-group mb-3">
          <label>พกส.</label>
          <input class="form-control" value="" name="pks" id="pks" required placeholder="พกส.">
        </div>
        
      </div>
      <div class="row">
        <div class="col-4 form-group mb-3">
          <label>กรอ. , กยศ.</label>
          <input class="form-control" type="text" class="form-control" value="" name="borrow" id="borrow" required placeholder="กรอ. , กยศ.">
        </div>
        <div class="col-4 form-group mb-3">
          <label>ขยะ</label>
          <input class="form-control" value="" name="bin" id="bin" required placeholder="ขยะ">
        </div>
        <div class="col-4 form-group mb-3">
          <label>สะอาด</label>
          <input class="form-control" value="" name="clean" id="clean" required placeholder="สะอาด">
        </div>
        
      </div>
      <div class="row">
        <div class="col-4 form-group mb-3">
          <label>สหกรณ์ออมทรัพย์</label>
          <input class="form-control" type="text" class="form-control" value="" name="cooperative" id="cooperative" required placeholder="สหกรณ์ออมทรัพย์">
        </div>
        <div class="col-4 form-group mb-3">
          <label>คงเหลือ</label>
          <input class="form-control" value="" name="balance" id="balance" required placeholder="คงเหลือ">
        </div>
        <div class="col-4 form-group mb-3">
          <label>หมายเหตุ</label>
          <input class="form-control" value="" name="remark" id="remark" required placeholder="หมายเหตุ">
        </div>
        
      </div>

      <div class="mt-4 text-center form-group justify-content-between">
        <a href="data_user.php" type="button" name="Submit" value="Login" class="btn btn-danger btn-block" role="button">ย้อนกลับ</a>
        <button type="submit" name="btn2" id="btn2" class="btn btn-primary btn-block" role="button">ตกลง</button>
      </div>
    </form>
  </div>
</div>



<?php include "./components/footer.php" ?>

<!-- <form name="form1" method="post" action="check_edit_price_user.php">
  <table width="805" border="0">
    <tr>
      <td width="198" align="left"></td>
      <td width="659" align="center">
        <h3>แก้ไขข้อมูลเงินเดือน</h3>
      </td>
    </tr>
  </table>
  <table width="972">
    <tr>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;&nbsp;</td>
      <td colspan="3"><input type="submit" name="btn2" id="btn2" value="&gt;&gt;&gt; ตกลง &lt;&lt;&lt;" class="btn btn-primary">
        &nbsp;&nbsp; <a href="data_user.php" type="button" class="btn btn-danger">ย้อนกลับ</a></td>
    </tr>

    <tbody>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="left">&nbsp;</td>
        <td align="left">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="10%" align="right">&nbsp;</td>
        <td width="4%" align="right">&nbsp;</td>
        <td width="9%" align="right">เลขที่ :: </td>
        <td colspan="3" align="left"><input type="text" class="form-control" style="width: 150px;" value="<?= $id ?>" name="id_num" id="id_num" readonly></td>
        <td width="8%" align="left">ชื่อ - สกุล :: </td>
        <td width="34%"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['name'] ?>" name="name" id="name" readonly></td>

      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td width="11%" align="right">&nbsp;</td>
        <td width="7%" align="right">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">เงินเดือน::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['salary'] ?>" name="salary" id="salary"></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">tax::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['tax'] ?>" name="tax" id="tax"></td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">assur_dd::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['assur_dd'] ?>" name="assur_dd" id="assur_dd"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">saving::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['saving'] ?>" name="saving" id="saving"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">kid::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['kid'] ?>" name="kid" id="kid"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">gpf::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['gpf'] ?>" name="gpf" id="gpf"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">pfund::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['pfund'] ?>" name="pfund" id="pfund"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td colspan="3" align="right">soc::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['soc'] ?>" name="soc" id="soc"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">total::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['total'] ?>" name="total" id="total"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type0::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type0'] ?>" name="type0" id="type0"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type1::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type1'] ?>" name="type1" id="type1"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type2::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type2'] ?>" name="type2" id="type2"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type3::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type3'] ?>" name="type3" id="type3"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type4::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type4'] ?>" name="type4" id="type4"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type5::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type5'] ?>" name="type5" id="type5"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type6::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type6'] ?>" name="type6" id="type6"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type7::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type7'] ?>" name="type7" id="type7"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type8::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type8'] ?>" name="type8" id="type8"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type9::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type9'] ?>" name="type9" id="type9"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type10::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type10'] ?>" name="type10" id="type10"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type11::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type11'] ?>" name="type11" id="type11"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type12::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type12'] ?>" name="type12" id="type12"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="9%">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type13::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type13'] ?>" name="type13" id="type13"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type14::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type14'] ?>" name="type14" id="type14"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type15::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type15'] ?>" name="type15" id="type15"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type16::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type16'] ?>" name="type16" id="type16"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type17::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type17'] ?>" name="type17" id="type17"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type18::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type18'] ?>" name="type18" id="type18"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type19::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type19'] ?>" name="type19" id="type19"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type20::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type20'] ?>" name="type20" id="type20"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type21::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type21'] ?>" name="type21" id="type21"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type22::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type22'] ?>" name="type22" id="type22"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type23::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type23'] ?>" name="type23" id="type23"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type24::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type24'] ?>" name="type24" id="type24"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type25::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type25'] ?>" name="type25" id="type25"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type26::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type26'] ?>" name="type26" id="type26"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type27::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type27'] ?>" name="type27" id="type27"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type28::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type28'] ?>" name="type28" id="type28"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type29::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type29'] ?>" name="type29" id="type29"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type30::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type30'] ?>" name="type30" id="type30"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type31::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type31'] ?>" name="type31" id="type31"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type32::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type32'] ?>" name="type32" id="type32"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type33::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type33'] ?>" name="type33" id="type33"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type34::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type34'] ?>" name="type34" id="type34"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type35::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type35'] ?>" name="type35" id="type35"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type36::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type36'] ?>" name="type36" id="type36"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type37::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type37'] ?>" name="type37" id="type37"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type38::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type38'] ?>" name="type38" id="type38"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type39::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type39'] ?>" name="type39" id="type39"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type40::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type40'] ?>" name="type40" id="type40"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type41::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type41'] ?>" name="type41" id="type41"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type42::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type42'] ?>" name="type42" id="type42"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type43::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type43'] ?>" name="type43" id="type43"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type44::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type44'] ?>" name="type44" id="type44"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type45::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type45'] ?>" name="type45" id="type45"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type46::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type46'] ?>" name="type46" id="type46"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type47::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type47'] ?>" name="type47" id="type47"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type48::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type48'] ?>" name="type48" id="type48"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type49::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type49'] ?>" name="type49" id="type49"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type50::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type50'] ?>" name="type50" id="type50"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type51::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type51'] ?>" name="type51" id="type51"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type52::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type52'] ?>" name="type52" id="type52"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type53::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type53'] ?>" name="type53" id="type53"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type54::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type54'] ?>" name="type54" id="type54"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type55::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type55'] ?>" name="type55" id="type55"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type56::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type56'] ?>" name="type56" id="type56"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type57::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type57'] ?>" name="type57" id="type57"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type58::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type58'] ?>" name="type58" id="type58"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type59::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type59'] ?>" name="type59" id="type59"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type60::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type60'] ?>" name="type60" id="type60"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type61::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type61'] ?>" name="type61" id="type61"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type62::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type62'] ?>" name="type62" id="type62"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type63::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type63'] ?>" name="type63" id="type63"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type64::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type64'] ?>" name="type64" id="type64"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type65::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type65'] ?>" name="type65" id="type65"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type66::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type66'] ?>" name="type66" id="type66"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type67::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type67'] ?>" name="type67" id="type67"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type68::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type68'] ?>" name="type68" id="type68"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type69::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type69'] ?>" name="type69" id="type69"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type70::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type70'] ?>" name="type70" id="type70"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type71::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type71'] ?>" name="type71" id="type71"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type72::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type72'] ?>" name="type72" id="type72"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type73::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type73'] ?>" name="type73" id="type73"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type74::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type74'] ?>" name="type74" id="type74"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type75::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type75'] ?>" name="type75" id="type75"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type76::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type76'] ?>" name="type76" id="type76"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type77::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type77'] ?>" name="type77" id="type77"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type78::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type78'] ?>" name="type78" id="type78"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type79::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type79'] ?>" name="type79" id="type79"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type80::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type80'] ?>" name="type80" id="type80"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type81::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type81'] ?>" name="type81" id="type81"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type82::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type82'] ?>" name="type82" id="type82"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type83::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type83'] ?>" name="type83" id="type83"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type84::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type84'] ?>" name="type84" id="type84"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type85::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type85'] ?>" name="type85" id="type85"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type86::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type86'] ?>" name="type86" id="type86"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type87::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type87'] ?>" name="type87" id="type87"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type88::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type88'] ?>" name="type88" id="type88"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type89::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type89'] ?>" name="type89" id="type89"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type90::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type90'] ?>" name="type90" id="type90"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type91::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type91'] ?>" name="type91" id="type91"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type92::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type92'] ?>" name="type92" id="type92"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type93::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type93'] ?>" name="type93" id="type93"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type94::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type94'] ?>" name="type94" id="type94"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type95::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type95'] ?>" name="type95" id="type95"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type96::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type96'] ?>" name="type96" id="type96"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type97::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type97'] ?>" name="type97" id="type97"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type98::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type98'] ?>" name="type98" id="type98"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="right">type99::</td>
        <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?= $row_show['type99'] ?>" name="type99" id="type99"></td>
      </tr>
      <tr>
        <td colspan="8">&nbsp;</td>
      </tr>
    </tbody>
  </table>
</form>
<p>
  <br>
<p>
  <center>
    <h4>&nbsp;</h4>
  </center>
</p> -->

<!-- Main component for a primary marketing message or call to action -->


