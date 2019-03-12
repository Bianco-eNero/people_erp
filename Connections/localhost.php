<?php
# FileName="WADYN_MYSQLI_CONN.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost = "localhost";
$database_localhost = "people";
$username_localhost = "root";
$password_localhost = "";
@session_start();

$localhost = mysqli_init();
if (defined("MYSQLI_OPT_INT_AND_FLOAT_NATIVE")) $localhost->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, TRUE);
$localhost->real_connect($hostname_localhost, $username_localhost, $password_localhost, $database_localhost) or die("Connect Error: " . mysqli_connect_error());

?>