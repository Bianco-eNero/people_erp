<?php
# FileName="WADYN_MYSQLI_CONN.htm"
# Type="MYSQL"
# HTTP="true"

//$hostname_people_erp = "localhost";
//$database_people_erp = "people_002";
//$username_people_erp = "root";
//$password_people_erp = "root";
//@session_start();

$hostname_people_erp = "minigolfcitycom.ipagemysql.com";
$database_people_erp = "people";
$username_people_erp = "hanyadel";
$password_people_erp = "Hanyadel1977.";
@session_start();

$people_erp = mysqli_init();
if (defined("MYSQLI_OPT_INT_AND_FLOAT_NATIVE")) $people_erp->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, TRUE);
$people_erp->real_connect($hostname_people_erp, $username_people_erp, $password_people_erp, $database_people_erp) or die("Connect Error: " . mysqli_connect_error());



mysqli_query($people_erp , "SET NAMES utf8");
mysqli_query($people_erp , "SET SESSION SQL_BIG_SELECTS=1;");


?>