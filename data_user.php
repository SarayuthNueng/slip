<?php
require 'connect.php';//เชื่อมฐานข้อมูล
session_start();
$itemId = isset($_GET['itemId']) ? $_GET['itemId'] : "";
$sess_id = $_SESSION['id_admin'];
if ($sess_id=="")
{
header("location:index.php");
}

	
	
?>
<?php
$chk_page=(isset($chk_page))?$chk_page:null;
// ฟังก์ชั่นสำหรับการแบ่งหน้า NEW MODIFY
function page_navi($before_p,$plus_p,$total,$total_p,$chk_page){      
    global $urlquery_str;   
    $pPrev=$chk_page-1;   
    $pPrev=($pPrev>=0)?$pPrev:0;   
    $pNext=$chk_page+1;   
    $pNext=($pNext>=$total_p)?$total_p-1:$pNext;        
    $lt_page=$total_p-4;   
    if($chk_page>0){     
        echo "<a  href='$urlquery_str"."pages=".intval($pPrev+1)."' class='naviPN'>Prev</a>";   
    }   
    if($total_p>=11){   
        if($chk_page>=4){   
            echo "<a $nClass href='$urlquery_str"."pages=1'>1</a><a class='SpaceC'>. . .</a>";      
        }   
        if($chk_page<4){   
            for($i=0;$i<$total_p;$i++){     
                $nClass=($chk_page==$i)?"class='selectPage'":"";   
                if($i<=4){   
                echo "<a $nClass href='$urlquery_str"."pages=".intval($i+1)."'>".intval($i+1)."</a> ";      
                }   
                if($i==$total_p-1 ){    
                echo "<a class='SpaceC'>. . .</a><a $nClass href='$urlquery_str"."pages=".intval($i+1)."'>".intval($i+1)."</a> ";      
                }          
            }   
        }   
        if($chk_page>=4 && $chk_page<$lt_page){   
            $st_page=$chk_page-3;   
            for($i=1;$i<=5;$i++){   
                $nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";   
                echo "<a $nClass href='$urlquery_str"."pages=".intval($st_page+$i+1)."'>".intval($st_page+$i+1)."</a> ";         
            }   
            for($i=0;$i<$total_p;$i++){     
                if($i==$total_p-1 ){    
                $nClass=($chk_page==$i)?"class='selectPage'":"";   
                echo "<a class='SpaceC'>. . .</a><a $nClass href='$urlquery_str"."pages=".intval($i+1)."'>".intval($i+1)."</a> ";      
                }          
            }                                      
        }      
        if($chk_page>=$lt_page){   
            for($i=0;$i<=4;$i++){   
                $nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";   
                echo "<a $nClass href='$urlquery_str"."pages=".intval($lt_page+$i)."'>".intval($lt_page+$i)."</a> ";      
            }   
        }           
    }else{   
        for($i=0;$i<$total_p;$i++){     
            $nClass=($chk_page==$i)?"class='selectPage'":"";   
            echo "<a href='$urlquery_str"."pages=".intval($i+1)."' $nClass  >".intval($i+1)."</a> ";      
        }          
    }      
    if($chk_page<$total_p-1){   
        echo "<a href='$urlquery_str"."pages=".intval($pNext+1)."'  class='naviPN'>Next</a>";   
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
}/* css แบ่งหน้า */
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
</style>
    </head>
    <body>
        <div class="container">

            <p>
              
          <!-- Static navbar -->      <img src="images/h.png" alt="" width="1140" height="150"></p>
            <table width="438" border="0">
              <tr>
                    <td width="115"><a href="data_admin.php"><img src="images/i_Home_icon.gif" alt="" width="25" height="25">หน้าหลัก</a>&nbsp;</td>
                    <td width="162"><a href="regis.php"><img src="images/group_edit.png" alt="" width="25" height="25">ลงทะเบียนบุคลากร</a>&nbsp;</td>
                <td width="147"><A HREF="logout.php" onclick="return confirm('ยืนยันการออกจากระบบใช่หรือไม่')"><img src="images/lock_go.png" alt="" width="25" height="25">ออกจากระบบ</A>&nbsp;</td>
                  </tr>
          </table>
          <!--/.container-fluid -->
           

            <!-- Main component for a primary marketing message or call to action -->

            ยินดีต้อนรับ Admin คุณ &nbsp;<strong><?php echo $_SESSION['name'] ?></strong>
<center>
    <h3><span class="text-success"><strong>รายการ Slip รายบุคคล</strong></span></h3></center>
    <form id="form_search" name="form_search" method="get" action="">
    </form>
    <table class="table table-striped">
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
$q= "SELECT * from payslip s  WHERE s.id = '".$id."' order by date DESC ";
 $qr=@mysqli_query($condb,$q);	
		
		$total=@mysqli_num_rows($qr);
?>   <?php 
$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
		if(!isset($_GET['pages'])){   
			$_GET['pages']=0;   
		}else{   
			$_GET['pages']=$_GET['pages']-1;
			if($_GET['pages']<0){
				$_GET['pages']=0;	
			}
			$chk_page=$_GET['pages'];     
			$_GET['pages']=$_GET['pages']*$e_page;   
		}   
		$q.="LIMIT ".$_GET['pages'].",$e_page";
			
		$qr=@mysqli_query($condb,$q);	
		if(@mysqli_num_rows($qr)>=1){   
			$plus_p=($chk_page*$e_page)+@mysqli_num_rows($qr);   
		}else{   
			$plus_p=($chk_page*$e_page);       
		}   
		$total_p=ceil($total/$e_page);   
		$before_p=($chk_page*$e_page)+1;  
		/// END PAGE NAVI ZONE	

 while($rs=@mysqli_fetch_array($qr)){ ?>
        <tr>
          <td><a  href="edit_price_user.php?itemId=<?=$rs['id_num']; ?>" role="button"><?php echo $rs['id_num'];?></a></td>
          <td><?php echo $rs['date'];?></td>
          <td><?php echo $rs['no'];?></td>
          <td><?php echo $rs['title'];?></td>
          <td><?php echo $rs['name'];?></td>
          <td><?php echo $rs['id'];?></td>
          <td><?php echo $rs['bank_id'];?></td>
          <td><?php echo $rs['txtoffice'];?></td>
          <td><?php echo $rs['salary'];?></td>
          <td><a  href="edit_price_user.php?itemId=<?=$rs['id_num']; ?>" role="button"><img src="images/data_edit.gif" width="25" height="25" title="แก้ไขข้อมูล"/></a></td>


        </tr><?php  } ?>  
      
      </tbody>
    </table>
  <div style="margin:auto;width:100%;">
  <?php if($total>10){ ?>                  
  <div class="browse_page">   
    <?php      
    if(count($_GET)<=1){
        $urlquery_str="?";
    }else{
		$para_get="";
		foreach($_GET as $key=>$value){
			if($key!="pages"){
				$para_get.=$key."=".$value."&";
			}
		}
        $urlquery_str="?$para_get";
    }
    // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า      
    page_navi($before_p,$plus_p,$total,$total_p,$chk_page);       
    ?>
    </div>   
    <?php } ?>  
</div>   
    <p>&nbsp;</p></center>

        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
mysqli_close($condb);
