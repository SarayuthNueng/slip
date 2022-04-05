<?php
session_start();
require 'connect.php'; //เชื่อมฐานข้อมูล

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ระบบ Slip ออนไลน์</title><style type="text/css">
/* css แบ่งหน้า */
.browse_page{   
    clear:both;   
    margin-left:12px;   
    height:25px;   
    margin-top:5px;   
    display:block;   
}   
.browse_page a,.browse_page a:hover{   
    display:block;   
	width: 2%;
    font-size:14px;   
    float:left;   
    margin:0px 5px;
    border:1px solid #CCCCCC;   
    background-color:#F4F4F4;   
    color:#333333;   
    text-align:center;   
    line-height:22px;   
    font-weight:bold;   
    text-decoration:none;   
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;	
}   
.browse_page a:hover{   
	border:1px solid #CCCCCC;
	background-color:#999999;
    color:#FFFFFF;   
}   
.browse_page a.selectPage{   
    display:block;   
    width:45px;   
    font-size:14px;   
    float:left;   
    margin-right:2px;   
	border:1px solid #CCCCCC;
	background-color:#999999;

    color:#FFFFFF;   
    text-align:center;   
    line-height:22px;    
    font-weight:bold;   
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;	
}   
.browse_page a.SpaceC{   
    display:block;   
    width:45px;   
    font-size:14px;   
    float:left;   
    margin-right:2px;   
    border:0px dotted #0A85CB;   
    background-color:#FFFFFF;   
    color:#333333;   
    text-align:center;   
    line-height:22px;   
    font-weight:bold;   
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;	
}   
.browse_page a.naviPN{   
    width:50px;   
    font-size:12px;   
    display:block;   
/*    width:25px;   */
    float:left;   
	border:1px solid #CCCCCC;
	background-color:#999999;
    color:#FFFFFF;   
    text-align:center;   
    line-height:22px;   
    font-weight:bold;      
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;	
}  
/* จบ css แบ่งหน้า */
.container form table tbody tr td a center {
	color: #0000FF;
}
        </style>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
       
        <style type="text/css">
        body {
	background-color: #E6E6FA;
}
        </style>

        

    </head>
    <body>
        

            <p>
              
            <!-- Static navbar -->      <img src="images/h.png" alt="" width="100%" height="100%">
          </p>
          <form name="form1" method="post" action="check_login.php">
            <p><span class="navbar-header"></span></p>
            <center><table width="100%" >
                <thead>
                    <tr>
                        <th colspan="4" ><center contenteditable="text-hide">
                          <h3 class="text-danger"><marquee direction="left">เข้าสู่ระบบครั้งแรก กรุณาเปลี่ยนรหัสผ่าน.ด้วยความปรารถณาดี โรงพยาบาลสมเด็จ</marquee></h3>
                        </center></th>
                    </tr>
                </thead>
                <tbody>
   
                        <tr>
                          <td width="23%">&nbsp;</td>
                          <td width="22%">&nbsp;</td>
                          <td width="17%"></td>
                          <td width="38%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td  width="17%" align="right">&nbsp;</td>
                          <td  width="17%" align="right">เลขที่บัตรประชาชน 13 หลัก :: &nbsp;</td>
                          <td><input class="form-control" maxlength="13" style="width: 150px;" name="txtUsername" type="text" id="txtUsername" required></td>
                          <td rowspan="3"><a href="admin.php"><img src="images/key-2-2.png" width="90" height="90"></a></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td  width="17%" align="right">&nbsp;</td>
                          <td  width="17%" align="right">รหัสผ่าน :: &nbsp;</td>
                          <td><input class="form-control" style="width: 150px;" name="txtPassword" type="password" id="txtPassword" required></td>
                        </tr>
                        <tr>
                          <td colspan="4"><p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td colspan="4" align="center"><input type="submit" name="Submit" value="Login" class="btn btn-primary"></td>
                        </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                         <td align="center" ></td>
                        </tr>
                </tbody>
                     
    </table> </center>
          </form>
          <tfoot>
      <tr>
  <td height="30"><p>
    <p>
    <p>        
    <center>
    
<h3>ติดปัญหาการเข้าใช้งาน</h3>
<h4>ติดต่อ กลุ่มงานการเงิน นางสาวปลื้มกมล  ภารพัฒน์ (ปลื้ม) การเงินและบัญชี 311 หรือ </h4>
<h4>ติดต่อ นายนรากร ศิริกุล (ต้น) นักวิชาคอมพิวเตอร์ ผู้ดูแลระบบ เบอร์โทรภายใน 155 หรือ 156</h4>
<p>&nbsp;</p>
<h4><center>จำนวนผู้เข้าใช้งาน <font size='3' color="red">
<?php  
$sql = "SELECT COUNT(id_save_time_login) as ttt from save_time_login";
$result = mysqli_query($condb,$sql) or die ("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
extract($row);
?>
    <?php echo number_format($row['ttt']); ?>   </font> คน</h4>
    </font></center></p></td>
  </tr>
  </tfoot>
    
       

        
</body>
</html>

