
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
        

            <!-- Static navbar -->
          
            <p>
              <!-- Main component for a primary marketing message or call to action --><center>
                <img src="images/h.png" alt="" width="95%" height="100%">
          </center></p>
          <form name="form1" method="post" action="check_login_admin.php">
            <p><span class="navbar-header"></span></p>
            <center><table width="1011" >
                <thead>
                    <tr>
                        <th colspan="4" ><center contenteditable="text-hide">
                          <h3 class="text-danger">ระบบจัดการข้อมูล (สำหรับ Admin เท่านั้น)</h3>
                        </center></th>
                    </tr>
                </thead>
                <tbody>
   
                        <tr>
                          <td width="23%">&nbsp;</td>
                          <td width="22%">&nbsp;</td>
                          <td width="17%">&nbsp;</td>
                          <td width="38%">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="59" align="right">&nbsp;</td>
                          <td align="right">Username :: &nbsp;</td>
                          <td><input class="form-control" maxlength="13" style="width: 150px;" name="txtUsername" type="text" id="txtUsername" required></td>
                          <td rowspan="2"><img src="images/admin22.png" width="100" height="141"></td>
                        </tr>
                        <tr>
                          <td height="50" align="right">&nbsp;</td>
                          <td align="right">Password :: &nbsp;</td>
                          <td><input class="form-control" style="width: 150px;" name="txtPassword" type="password" id="txtPassword" required></td>
                        </tr>
                        <tr>
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4"><center>
                             <a href="index3.php" type="button" class="btn btn-danger">ย้อนกลับ</a>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="Login" class="btn btn-primary"></center></td>
                        </tr>
                </tbody>
                     
    </table> </center>
          </form>
          <tfoot>
      <tr>
  <td height="30"><p><center>
<p>&nbsp;</p>
<p>&nbsp;</p>
  </center></p></td>
  </tr>
  </tfoot>
    
       

        
</body>
</html>

