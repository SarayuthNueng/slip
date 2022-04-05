<?php
if (preg_match("config.inc.php",$_SERVER['PHP_SELF'])) {
    header("Location: ./");
    exit();
}

define("DB_HOST","localhost");
define("DB_NAME","slip_db");
define("DB_USERNAME","root");
define("DB_PASSWORD","sd11087");

define("_HEAD","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์ ");
define("_HEAD2","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์");
define("_COPYRIGHT"," สงวนลิขสิทธิ์ © 2015 โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์ <br>
193 หมู่ 13 ตำบลบัวขาว อำเภอกุฉินารายณ์ จังหวัดกาฬสินธุ์ 46110 โทรศัพท์ 043-851290 โทรสาร 043-8517281 Email:admin@kcph.go.th  <br>
Copyright © 2015 All rights Reserved. Powered by Kuchinarai Crown Prince , Information Department Organizer Design ");
define("_TITLE","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์ 
<br>193 หมู่ 13 ตำบลบัวขาว อำเภอกุฉินารายณ์ จังหวัดกาฬสินธุ์  โทรศัพท์ 043-851290-2  โทรสาร 043-851728");
define("_FOOTER","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์  
<br>193 หมู่ 13 ตำบลบัวขาว อำเภอกุฉินารายณ์ จังหวัดกาฬสินธุ์  โทรศัพท์ 043-851290-2  โทรสาร 043-851728");

define("_EMAIL","kanassanan.ph@gmail.com");
define("_LANGUAGE","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์");
define("_DESCRIPTION","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์");
define("_KEYWORDS","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์");
define("_URL","http://www.kuchihospital.com");
define("_COPYRIGHT2","โรงพยาบาลสมเด็จพระยุพราชกุฉินารายณ์");

define("_ADMIN","จัดการผู้ใช้งานระบบ");
define("_PERSON","จัดการข้อมูลบุคลากร");
define("_ALUMNI","จัดการข้อมูลศิษย์เก่า");
define("_SUBJECT","จัดการข้อมูลสาขาวิชา");
define("_WORK","จัดการข้อมูลผลงานคณะ");
define("_LAYOUT","จัดการรูปแบบเว็บไซต์");
define("_NEWS","จัดการประกาศข่าวสาร");
define("_CALENDAR","จัดการปฏิทินกิจกรรม");
define("_DOWNLOAD","จัดการไฟล์ดาวน์โหลด");
define("_LOGOUT","ออกจากระบบ");

define("_ERROR","!!! ไฟล์มีขนาดใหญ่เกิน 2 Mb ");
define("_DATEERROR","!!! มีข้อมูล ปฏิทินกิจกรรม ในวันที่ $sess_calendar_date แล้วครับ  ");
define("_SUCCESS","บันทึกข้อมูลเข้าสู่ระบบเรียบร้อยแล้ว ");
define("_DELETE","ลบข้อมูลออกจากระบบเรียบร้อยแล้ว ");
define("_DELETEALERT","!!! โปรดยืนยันการลบข้อมูล ออกจากระบบ ");
define("_MAXFILE","หมายเหตุ : ไฟล์ที่ใช้อัพโหลด ต้องเป็นนามสกุล jpg, jpeg, gif, png, swf ขนาด 650x300 pixel และห้ามเกิน 2 Mb ครับ");
define("_MAXFOOTER","หมายเหตุ : ไฟล์ที่ใช้อัพโหลด ต้องเป็นนามสกุล jpg, jpeg, gif, png, swf ขนาด 650x95 pixel และห้ามเกิน 2 Mb ครับ");
define("_MAXBANNER","หมายเหตุ : ไฟล์ที่ใช้อัพโหลด ต้องเป็นนามสกุล jpg, jpeg, gif, png, swf และห้ามเกิน 2 Mb ครับ<br>- ด้านบน : ขนาดประมาณ 650x300 pixel<br>- ด้านล่าง : ขนาดประมาณ 200x95 pixel");
define("_MAXBG","หมายเหตุ : ไฟล์ที่ใช้อัพโหลด ต้องเป็นนามสกุล jpg, jpeg, gif, png และห้ามเกิน 2 Mb ครับ");
define("_MAXMENU","หมายเหตุ : กรุณาเลือกรูปแบบภาพพื้นหลังเมนูหลักที่ท่านต้องการ ");
define("_MAXPOPUP","หมายเหตุ : นามสกุลที่รองรับไฟล์  คือ  jpg,  jpeg,  gif,  png,  swf  และขนาดห้ามเกิน 2 Mb ครับ ");
define("_MAXPOPUP2","หมายเหตุ : นามสกุลที่รองรับไฟล์  คือ  jpg,  jpeg,  gif,  png  และขนาดห้ามเกิน 2 Mb ครับ ");
define("_MAXALERT","!!! ระบบไม่อนุญาตให้อัพโหลดรูปภาพได้  ต้องเป็นไฟล์ประเภท  jpg,  jpeg,  gif,  png,  swf  ครับ ");
define("_MAXALERT2","!!! ระบบไม่อนุญาตให้อัพโหลดรูปภาพได้  ต้องเป็นไฟล์ประเภท  jpg,  jpeg,  gif,  png  ครับ ");
define("_NAME","!!! กรุณากรอกชื่อด้วยครับ ");
?>
