<?php session_start(); 
require 'connect.php';//เชื่อมฐานข้อมูล
$sess_id = $_SESSION['id_login'];
if ($sess_id=="")
{
header("location:index.php");
}

 if(isset($_POST['submit']))
	{  

		
	   
		$file1 = $_FILES['file']['name'];
		
		$arraypic = explode(".",$file1);//แบ่งชื่อไฟล์กับนามสกุลออกจากกัน  
$lastname = strtolower($arraypic);  
$filename = $arraypic[0];//ชื่อไฟล์  
$filetype = $arraypic[1];//นามสกุลไฟล์ 

	 $file = $_FILES['file']['tmp_name'];
	$handle = fopen($file,"r");
	    while(($fileop = fgetcsv($handle,10000,",")) !== false)
	    {
			
		    $date = $fileop[0];
			$no = $fileop[1];
			$title = $fileop[2];
			$name = $fileop[3];
			$id = $fileop[4];
			$bank_id = $fileop[5];
			$office = $fileop[6];
			$txtoffice = $fileop[7];
			$salary = $fileop[8];
			$tax = $fileop[9];
			$assur_dd = $fileop[10];
			$saving = $fileop[11];
			$kid = $fileop[12];
			$gpf = $fileop[13];
			$pfund = $fileop[14];
			$soc = $fileop[15];
			$total = $fileop[16];
			$type0 = $fileop[17];
			$type1 = $fileop[18];
			$type2 = $fileop[19];
			$type3 = $fileop[20];
			$type4 = $fileop[21];
			$type5 = $fileop[22];
			$type6 = $fileop[23];
			$type7 = $fileop[24];
			$type8 = $fileop[25];
			$type9 = $fileop[26];
			$type10 = $fileop[27];
			$type11 = $fileop[28];
			$type12 = $fileop[29];
			$type13 = $fileop[30];
			$type14 = $fileop[31];
			$type15 = $fileop[32];
			$type16 = $fileop[33];
			$type17 = $fileop[34];
			$type18 = $fileop[35];
			$type19 = $fileop[36];
			$type20 = $fileop[37];
			$type21 = $fileop[38];
			$type22 = $fileop[39];
			$type23 = $fileop[40];
			$type24 = $fileop[41];
			$type25 = $fileop[42];
			$type26 = $fileop[43];
			$type27 = $fileop[44];
			$type28 = $fileop[45];
			$type29 = $fileop[46];
			$type30 = $fileop[47];
			$type31 = $fileop[48];
			$type32 = $fileop[49];
			$type33 = $fileop[50];
			$type34 = $fileop[51];
			$type35 = $fileop[52];
			$type36 = $fileop[53];
			$type37 = $fileop[54];
			$type38 = $fileop[55];
			$type39 = $fileop[56];
			$type40 = $fileop[57];
			$type41 = $fileop[58];
			$type42 = $fileop[59];
			$type43 = $fileop[60];
			$type44 = $fileop[61];
			$type45 = $fileop[62];
			$type46 = $fileop[63];
			$type47 = $fileop[64];
			$type48 = $fileop[65];
			$type49 = $fileop[66];
			$type50 = $fileop[67];
			$type51 = $fileop[68];
			$type52 = $fileop[69];
			$type53 = $fileop[70];
			$type54 = $fileop[71];
			$type55 = $fileop[72];
			$type56 = $fileop[73];
			$type57 = $fileop[74];
			$type58 = $fileop[75];
			$type59 = $fileop[76];
			$type60 = $fileop[77];
			$type61 = $fileop[78];
			$type62 = $fileop[79];
			$type63 = $fileop[80];
			$type64 = $fileop[81];
			$type65 = $fileop[82];
			$type66 = $fileop[83];
			$type67 = $fileop[84];
			$type68 = $fileop[85];
			$type69 = $fileop[86];
			$type70 = $fileop[87];
			$type71 = $fileop[88];
			$type72 = $fileop[89];
			$type73 = $fileop[90];
			$type74 = $fileop[91];
			$type75 = $fileop[92];
			$type76 = $fileop[93];
			$type77 = $fileop[94];
			$type78 = $fileop[95];
			$type79 = $fileop[96];
			$type80 = $fileop[97];
			$type81 = $fileop[98];
			$type82 = $fileop[99];
			$type83 = $fileop[100];
			$type84 = $fileop[101];
			$type85 = $fileop[102];
			$type86 = $fileop[103];
			$type87 = $fileop[104];
			$type88 = $fileop[105];
			$tota89 = $fileop[106];
			$type90 = $fileop[107];
			$type91 = $fileop[108];
			$type92 = $fileop[109];
			$type93 = $fileop[110];
			$type94 = $fileop[111];
			$type95 = $fileop[112];
			$type96 = $fileop[113];
			$type97 = $fileop[114];
			$type98 = $fileop[115];
			$type99 = $fileop[116];
				
				
				$sql = mysql_query("INSERT INTO `payslip` (`date`, `no`, `title`, `name`, `id`, `bank_id`, `office`, `txtoffice`, `salary`, `tax`
, `assur_dd`, `saving`, `kid`, `gpf`, `pfund`, `soc`, `total`, `type0`, `type1`, `type2`, `type3`, `type4`
, `type5`, `type6`, `type7`, `type8`, `type9`, `type10`, `type11`, `type12`, `type13`, `type14`, `type15`
, `type16`, `type17`, `type18`, `type19`, `type20`, `type21`, `type22`, `type23`, `type24`, `type25`, `type26`
, `type27`, `type28`, `type29`, `type30`, `type31`, `type32`, `type33`, `type34`, `type35`, `type36`, `type37`
, `type38`, `type39`, `type40`, `type41`, `type42`, `type43`, `type44`, `type45`, `type46`, `type47`, `type48`
, `type49`, `type50`, `type51`, `type52`, `type53`, `type54`, `type55`, `type56`, `type57`, `type58`, `type59`
, `type60`, `type61`, `type62`, `type63`, `type64`, `type65`, `type66`, `type67`, `type68`, `type69`, `type70`
, `type71`, `type72`, `type73`, `type74`, `type75`, `type76`, `type77`, `type78`, `type79`, `type80`, `type81`
, `type82`, `type83`, `type84`, `type85`, `type86`, `type87`, `type88`, `type89`, `type90`, `type91`, `type92`
, `type93`, `type94`, `type95`, `type96`, `type97`, `type98`, `type99`) VALUES ('".$date."','".$no."','".$title."','".$name."','".$id."','".$bank_id."','".$office."','".$txtoffice."','".$salary."','".$tax."','".$assur_dd."','".$saving."','".$kid."','".$gpf."','".$pfund."','".$soc."','".$total."','".$type0."','".$type1."','".$type2."','".$type3."','".$type4."','".$type5."','".$type6."','".$type7."','".$type8."','".$type9."','".$type10."','".$type11."','".$type12."','".$type13."','".$type14."','".$type15."','".$type16."','".$type17."','".$type18."','".$type19."','".$type20."','".$type21."','".$type22."','".$type23."','".$type24."','".$type25."','".$type26."','".$type27."','".$type28."','".$type29."','".$type30."','".$type31."','".$type32."','".$type33."','".$type34."','".$type35."','".$type36."','".$type37."','".$type38."','".$type39."','".$type40."','".$type41."','".$type42."','".$type43."','".$type44."','".$type45."','".$type46."','".$type47."','".$type48."','".$type49."','".$type50."','".$type51."','".$type52."','".$type53."','".$type54."','".$type55."','".$type56."','".$type57."','".$type58."','".$type59."','".$type60."','".$type61."','".$type62."','".$type63."','".$type64."','".$type65."','".$type66."','".$type67."','".$type68."','".$type69."','".$type70."','".$type71."','".$type72."','".$type73."','".$type74."','".$type75."','".$type76."','".$type77."','".$type78."','".$type79."','".$type80."','".$type81."','".$type82."','".$type83."','".$type84."','".$type85."','".$type86."','".$type87."','".$type88."','".$type89."','".$type90."','".$type91."','".$type92."','".$type93."','".$type94."','".$type95."','".$type96."','".$type97."','".$type98."','".$type99."')");
		    $show_status = "เพิ่มข้อมูลเรียบร้อย !!";
				}
		
		}
		
		
$sess_id = $_SESSION['$id_login'];
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
 <!--   font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; -->
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
              
            <!-- Static navbar -->      <img src="images/h1h.png" alt="" width="1140" height="150">
          </p>
      <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                         <a class="navbar-brand" href="#">ระบบ Slip ออนไลน์</a></div>
                    <div class="navbar-collapse collapse" >
                        <ul class="nav navbar-nav" id="cssmenu">
                            <li><a href="index3.php"><img src="images/i_Home_icon.gif" alt="" width="25" height="25">หน้าหลัก</a></li>
                            <li><a href="edit_pass.php"><img src="images/group_edit.png" alt="" width="25" height="25">แก้ไขข้อมูลส่วนตัว</a></li>
                            <li class="active"><a href="add_slip.php"><img src="images/document_add.png" alt="" width="25" height="25">อัพโหลดไฟล์ฐานข้อมูล</a></li>
                           <li><A HREF="logout.php" onclick="return confirm('ยืนยันการออกจากระบบใช่หรือไม่')"><img src="images/lock_go.png" alt="" width="25" height="25">ออกจากระบบ</A></li>
                      </ul>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid --></div>
      <form method="post" action="add_slip.php" enctype="multipart/form-data">
      <table width="1047" border="0">
              <tr>
                <td width="58" align="left"></td>
                <td width="979" align="center"><h3>อัพโหลดไฟล์ข้อมูล</h3></td>
              </tr>
            </table>
            <table width="972" >
           
              <tbody>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td colspan="3" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td colspan="3" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td colspan="3" align="left"><input type="file" name="file" /></td>
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
                  <td width="10%" align="right">&nbsp;</td>
                  <td width="4%" align="right">&nbsp;</td>
                  <td width="9%" align="right">&nbsp;</td>
                  <td width="11%" align="right">&nbsp;</td>
                  <td width="7%" align="right">&nbsp;</td>
                  <td width="9%">&nbsp;</td>
                  <td width="8%">&nbsp;</td>
                  <td width="34%">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td align="right">&nbsp;&nbsp;</td>
                  <td colspan="3"><input type="submit" name="submit"  value="&gt;&gt;&gt; ตกลง &lt;&lt;&lt;" class="btn btn-primary" onclick="return confirm('คุณต้องการบันทึก ใช่หรือไม่ ?')">&nbsp;&nbsp;
                    <a href="index3.php" type="button" class="btn btn-danger">ย้อนกลับ</a></td>
                </tr>
              </tbody>
            </table></form>
            <p>
            <br>
            <p>            
      <center><h4><span class="ห"><?php echo $_SESSION['check']; ?></span></h4></center></p>

        <!-- Main component for a primary marketing message or call to action -->
            
           
      </div> 
        <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
