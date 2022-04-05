<?php
session_start();
$error="Username หรือ Password ไม่ถูกต้อง!!</h1>";
require 'connect.php';
   
// $u = mysqli_real_escape_string($condb,$_POST['txtUsername']);
// $pass = mysqli_real_escape_string($condb,$_POST['txtPassword']);
//  $sql="SELECT * FROM login  WHERE id_login = $u and pass = $pass";
//  $strSQL = $sql;
// $_txtuser = mysqli_real_escape_string($condb,$_POST['txtUsername']);
// $_txtpass = mysqli_real_escape_string($condb,$_POST['txtPassword']);
	$strSQL = "SELECT * FROM login  WHERE id_login = '".mysqli_real_escape_string($condb,$_POST['txtUsername'])."' and pass = '".mysqli_real_escape_string($condb,$_POST['txtPassword'])."' ";
  // $strSQL = "SELECT * FROM login  WHERE id_login = $_txtuser and pass = $_txtpass ";
	$objQuery = mysqli_query($condb,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	$_SESSION['fname'] = $objResult['fname'];
	$_SESSION['id_login'] = $objResult['id_login'];
	// $_SESSION['fname'];
	// $_SESSION['id_login'];
  // echo($objResult);

// $len = isset($objResult['id_login']) ? count($objResult['id_login']) : 0;
// isset($_POST['id_login']);
// echo '<pre>';
//   echo print_r($objResult['id_login']);
//   echo '</pre>';
	// if(!mysqli_query($condb,$strSQL))
	if(!$objResult)
  


	{?>
    
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
        <link href="bootstrap/css/nava.css" rel="stylesheet">
        <style type="text/css">
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

            <!-- Static navbar -->
          
          <p>
              <!-- Main component for a primary marketing message or call to action --><center>
              <img src="images/h.png" alt="" width="95%" height="100%">
          </center></p>
          <form name="form1" method="post" action="check_login.php">
            <p><span class="navbar-header"></span></p>
            <table width="979" >
              <thead>
                <tr>
                  <th colspan="3" ><center contenteditable="text-hide">
                    <h3 class="text-danger">เลขที่บัตรประชาชน 13 หลัก หรือ รหัสผ่าน ไม่ถูกต้อง</h3>
                  </center></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td width="25%">&nbsp;</td>
                  <td width="19%">&nbsp;</td>
                  <td width="56%"></td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">เลขที่บัตรประชาชน 13 หลัก ::</td>
                  <td><input class="form-control" maxlength="13" style="width: 150px;" name="txtUsername" type="text" id="txtUsername" required></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="right">&nbsp;</td>
                  <td align="right">รหัสผ่าน ::</td>
                  <td><input class="form-control" style="width: 150px;" name="txtPassword" type="password" id="txtPassword" required></td>
                </tr>
                <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3"><center>
                    <input type="submit" name="Submit" value="Login" class="btn btn-primary">
                  </center></td>
                </tr>
              </tbody>
            </table>
          </form>
          <tfoot>
      <tr>
  <td height="30"><p>&nbsp;</p>
    <p><center>
    </center></p>
    <p>&nbsp;</p></td>
  </tr>
          </tfoot>
          <center>
          </center></p>
        </div> <!-- /container -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>


			
	<?php
	}
	else
	{
		

				header("location:save_time_login.php");
			
			
	
	
	}
	mysqli_close($condb);
?>

