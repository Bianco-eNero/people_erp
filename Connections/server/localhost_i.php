<?php
# FileName="WADYN_MYSQLI_CONN.htm"
# Type="MYSQL"
# HTTP="true"

//$hostname_localhost_i = "localhost";
//$database_localhost_i = "people_002";
//$username_localhost_i = "root";
//$password_localhost_i = "root";
//@session_start();

$hostname_localhost_i = "minigolfcitycom.ipagemysql.com";
$database_localhost_i = "people";
$username_localhost_i = "hanyadel";
$password_localhost_i = "Hanyadel1977.";
@session_start();

$localhost_i = mysqli_init();
if (defined("MYSQLI_OPT_INT_AND_FLOAT_NATIVE")) $localhost_i->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, TRUE);
$localhost_i->real_connect($hostname_localhost_i, $username_localhost_i, $password_localhost_i, $database_localhost_i) or die("Connect Error: " . mysqli_connect_error());

$localhost_i->set_charset('utf8');
?>