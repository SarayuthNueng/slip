<?php
/*
 * set var
 */
$cfHost = "localhost";
$cfUser = "slip";
$cfPassword = "pepute8an";
$cfDatabase = "zadmin_drug";
$title="ระบบรายงานเงินเดือน : Slip Online";/*
 * connection mysql
 */
$meConnect = mysql_connect($cfHost, $cfUser, $cfPassword) or die("Error conncetion mysql...");
$meDatabase = mysql_select_db($cfDatabase);
mysql_query("SET NAMES UTF8");
