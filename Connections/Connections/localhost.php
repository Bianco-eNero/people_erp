<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

//$hostname_localhost = "localhost";
//$database_localhost = "people_002";
//$username_localhost = "root";
//$password_localhost = "root";
//$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR); 


$hostname_localhost = "minigolfcitycom.ipagemysql.com";
$database_localhost = "people";
$username_localhost = "hanyadel";
$password_localhost = "Hanyadel1977.";
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_query("set names 'utf8'");

?>