<?php session_start(); 
include 'connect.php';//เชื่อมฐานข้อมูล
$sess_id = $_SESSION['id_login'];
if ($sess_id=="")
{
header("location:index.php");
}

if($_SESSION['id_login'] != "")
{
$id = $_SESSION['id_login'] ;
$sql_show = "SELECT s.* from login s WHERE s.id_login = '".$id."'";
$result_show = mysqli_query($condb,$sql_show) or die(mysqli_error($condb));
$row_show = mysqli_fetch_array($result_show);
}
$sess_id = $_SESSION['id_login'];
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
       <style type="text/css">
        .ห {	color: #F00;
}
#cssmenu{
    border:none;
    border:0px;
    margin:0px;
    padding:0px;
 /* <!--   font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; --> */
    font-size:12px;
    color:#0000cc;
    }
#cssmenu ul{
    background:#47b6f5;
    height:42px;
    list-style:none;
    margin:0;
    padding:0;
    border-top:2px solid #666666;
    }
    #cssmenu li{
        float:left;
        padding:0px 9px 0px 9px;
        }
    #cssmenu li a{
        color:#666666;
        display:block;
        font-weight:bold;
        line-height:42px;
        padding:0px 10px;
        text-align:center;
        text-decoration:none;
        }
        #cssmenu li a:hover{
            color:#0000FF;
            text-decoration:none;
            }
    #cssmenu li ul{
        background:#C0C0C0;
        display:none;
        position:absolute;
    
        } 
    #cssmenu li:hover ul{
        display:block;
        }
    #cssmenu li li {
        color:#000;
        display:block;
        float:none;
        padding:0px;
        width:200px;
        }  
    #cssmenu li ul a{
        display:block;
        font-size:12px;
        padding:0px 10px 0px 15px;
        text-align:left;
        }
        #cssmenu li ul a:hover{
            background:#CCCCCC;
            color:#000000;
            opacity:1.0;
            filter:alpha(opacity=100);
            }
    #cssmenu p{
        clear:left;
        }  
    #cssmenu .active > a{
        background: #CCCCCC;
        color:#666666;
        }
    #cssmenu .active > a:hover {
        color:#0000cc;
        }

        body {
	background-color: #E6E6FA;
}
       </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
    <body>
    <div class="container">

            <p>
              
            <!-- Static navbar -->      <img src="images/h.png" alt="" width="100%" height="100%">
          </p>
          <table width="438" border="0">
              <tr>
                <td width="115"><a href="index3.php"><img src="images/i_Home_icon.gif" alt="" width="25" height="25">หน้าหลัก</a>&nbsp;</td>
                <td width="162"><a href="edit_pass.php"><img src="images/group_edit.png" alt="" width="25" height="25">แก้ไขข้อมูลส่วนตัว</a>&nbsp;</td>
                <td width="147"><A HREF="logout.php" onclick="return confirm('ยืนยันการออกจากระบบใช่หรือไม่')"><img src="images/lock_go.png" alt="" width="25" height="25">ออกจากระบบ</A>&nbsp;</td>
              </tr>
            </table>
      <form name="form1" method="post" action="check_edit_pass.php">
        <table width="1047" border="0">
              <tr>
                <td width="58" align="left"></td>
                <td width="979" align="center"><h3>แก้ไขข้อมูลส่วนตัว</h3></td>
              </tr>
            </table>
            <table width="972" >
           
              <tbody>
                <tr>
                  <td width="10%" align="right">&nbsp;</td>
                  <td width="4%" align="right">&nbsp;</td>
                  <td width="9%" align="right">&nbsp;</td>
                  <td width="11%" align="right"></td>
                  <td width="7%" align="right">คำนำหน้า ::</td>
                  <td width="9%" align="left"><input type="text" class="form-control" style="width: 70px;" value="<?=$row_show['pname']?>" name="Fname" id="Fname" size="15" required></td>
                  <td width="8%" align="left">ชื่อ - สกุล ::</td>
                  <td width="34%"><input type="text" class="form-control" style="width: 200px;" value="<?=$row_show['fname']?>" name="Lname" id="Lname" size="15" required></td>
                  <td width="8%"></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td colspan="3" align="right">เลขที่บัตรประชาชน ::</td>
                  <td colspan="3"><input type="text" class="form-control" style="width: 150px;" value="<?=$row_show['id_login']?>" name="Code_Student" id="Code_Student" readonly></td>
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
                  <td align="right">&nbsp;</td>
                  <td colspan="2" align="right">รหัสผ่านใหม่ ::</td>
                  <td colspan="3"><input type="password" class="form-control" style="width: 150px;" value="<?=$row_show['pass']?>" name="Pass_Student" id="Pass_Student" size="10" required></td>
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
                  <td colspan="3" align="right">ยืนยันรหัสผ่านใหม่ ::</td>
                  <td colspan="3"><input type="password" class="form-control" style="width: 150px;" value="<?=$row_show['pass']?>" name="Pass_Student2" id="Pass_Student2" size="10" required></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;&nbsp;</td>
                  <td colspan="3"><input type="submit" name="btn" id="btn" value="&gt;&gt;&gt; ตกลง &lt;&lt;&lt;" class="btn btn-primary">&nbsp;&nbsp;
                    <a href="index3.php" type="button" class="btn btn-danger">ย้อนกลับ</a></td>
                </tr>
              </tbody>
            </table></form>
            <p>
            <br>
            <p>            
      <center><h4><span><?php echo $_SESSION['check']; ?></span></h4></center></p>

        <!-- Main component for a primary marketing message or call to action -->
            
           
      </div> 
        <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
