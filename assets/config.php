<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//// start session //////
if (!isset($_SESSION)) {
  session_start();

  ini_set('session.gc_maxlifetime',87000);

}




//// application name ////
$application_name='People ERP';
//// end application name ////



//// defining the server ////
// $server='http://localhost/people_erp/';
 $server='http://people.benegypt.com/';
//// end define the server ////

 $hostname_website = "localhost";
 $database_website = "people";
 $username_website = "root";
 $password_website = "";
// $website = mysqli_connect($hostname_website, $username_website, $password_website) or trigger_error(mysqli_error($website),E_USER_ERROR);


// $hostname_website = "minigolfcitycom.ipagemysql.com";
// $database_website = "people";
// $username_website = "ashrafadel";
// $password_website = "Hanyadel1977.";
 $website = mysqli_connect($hostname_website, $username_website, $password_website) or trigger_error(mysqli_error($website),E_USER_ERROR);


mysqli_query($website , "SET NAMES utf8");
mysqli_query($website , "SET SESSION SQL_BIG_SELECTS=1;");


//// temporary organization ////
$organization=$_SESSION['current_company'];


if(isset($_SESSION['emp_id']))
{
	$g=$_SESSION['emp_id'];
//// Include Connection ////

	
mysqli_select_db($website,$database_website );
$query_current_user = "SELECT *,(employee.organization) AS organization1  FROM employee, organization WHERE organization.organization=employee.organization AND  emp_id='$g'";
$current_user = $website->query($query_current_user);
$row_current_user = mysqli_fetch_assoc($current_user);
	
	
		
mysqli_select_db($website,$database_website );
$query_orgs = "SELECT *  FROM employee_organization, organization WHERE organization.organization=employee_organization.organization AND employee_organization.emp_id='$g'";
$orgs = $website->query($query_orgs);
$row_orgs = mysqli_fetch_assoc($orgs);
	
	
	
  if(isset($_GET['company']))
  {
	  
	  $_SESSION['current_company']=$_GET['company'];
    $page='index.php';
	 ?>
<meta http-equiv="refresh" content="0; url=<?php echo $page; ?>" />
<?php
	  
  }
	



		 $current_company=$_SESSION['current_company'];
	 
	  mysqli_select_db($website,$database_website );
$query_current_company = "SELECT * FROM organization WHERE organization.organization='$current_company'";
$current_company = $website->query($query_current_company);
$row_current_company = mysqli_fetch_assoc($current_company);
	
			?>



<?php
	
	
}

// mysql_free_result($current_employee);
?>
