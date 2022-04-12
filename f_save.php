<?php
$conn = mysqli_connect("localhost","root","","slip_db");
require_once('./php-excel-reader/excel_reader2.php');
require_once('SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
                
                $id_num = "";//ฟิว 2
                if(isset($Row[0])) {
                    $id_num = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $cid = "";//ฟิว 3
                if(isset($Row[1])) {
                    $cid = mysqli_real_escape_string($conn,$Row[1]);
                }

                $name = "";//ฟิว 4
                if(isset($Row[2])) {
                    $name = mysqli_real_escape_string($conn,$Row[2]);
                }

                $salary = "";//ฟิว 5
                if(isset($Row[3])) {
                    $salary = mysqli_real_escape_string($conn,$Row[3]);
                }

                $social = "";//ฟิว 6
                if(isset($Row[4])) {
                    $social = mysqli_real_escape_string($conn,$Row[4]);
                }

                $pks = "";//ฟิว 7
                if(isset($Row[5])) {
                    $pks = mysqli_real_escape_string($conn,$Row[5]);
                }

                $borrow = "";//ฟิว 8
                if(isset($Row[6])) {
                    $borrow = mysqli_real_escape_string($conn,$Row[6]);
                }

                $bin = "";//ฟิว 9
                if(isset($Row[7])) {
                    $bin = mysqli_real_escape_string($conn,$Row[7]);
                }

                $clean = "";//ฟิว 10
                if(isset($Row[8])) {
                    $clean = mysqli_real_escape_string($conn,$Row[8]);
                }

                $cooperative = "";//ฟิว 11
                if(isset($Row[9])) {
                    $cooperative = mysqli_real_escape_string($conn,$Row[9]);
                }

                $balance = "";//ฟิว 12
                if(isset($Row[10])) {
                    $balance = mysqli_real_escape_string($conn,$Row[10]);
                }

                $remark = "";//ฟิว 13
                if(isset($Row[11])) {
                    $remark = mysqli_real_escape_string($conn,$Row[11]);
                }

                $date = "";//ฟิว 13
                if(isset($Row[12])) {
                    $date = mysqli_real_escape_string($conn,$Row[12]);
                }

                $booking_id = "";//ฟิว 13
                if(isset($Row[13])) {
                    $booking_id = mysqli_real_escape_string($conn,$Row[13]);
                }




                
                if (
                    !empty($id_num) || 
                    !empty($cid)
                    ){

                    $query = "insert into payslip
                              (id_num,cid,name,salary,social,pks,borrow,bin,clean,cooperative,balance,remark,date,booking_id) 
                              values(
                                     '".$id_num."',
                                     '".$name."',
                                     '".$salary."',
                                     '".$social."',
                                     '".$pks."',
                                     '".$borrow."',
                                     '".$bin."',
                                     '".$clean."',
                                     '".$cooperative."',
                                     '".$balance."',
                                     '".$remark."',
                                     '".$date."',
                                     '".$booking_id."'
                                     )";
                    $result = mysqli_query($conn, $query);
                

                
                    if (! empty($result)) {
                      $type = "success";
                      $message = "Excel Data Imported into the Database";
                      echo "<script>";
                      echo"alert('success Excel Data Imported into the Database');";
                      echo"window.location ='test-up-excel.php';";
                      echo "</script>";
                        

                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                        echo "<script>";
                        echo"alert('error Problem in Importing Excel Data');";
                        echo"window.location ='test-up-excel.php';";
                        echo "</script>";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
        echo "<script>";
        echo"alert('error Invalid File Type. Upload Excel File.');";
        echo"window.location ='test-up-excel.php';";
        echo "</script>";
  }
}
?>