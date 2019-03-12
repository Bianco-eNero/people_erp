<?php require_once('../../../../../Connections/localhost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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


//// include config script ////
include('../../../../../assets/config.php');
//// end of config script ////


$emp_med_records = "-1";
if (isset($_GET['emp_id'])) {
  $emp_med_records = $_GET['emp_id'];
}
mysql_select_db($database_localhost, $localhost);
$query_med_records = sprintf("SELECT * FROM med_records WHERE med_records.emp_id=%s ORDER BY med_records.med_records_date", GetSQLValueString($emp_med_records, "int"));
$med_records = mysql_query($query_med_records, $localhost) or die(mysql_error());
$row_med_records = mysql_fetch_assoc($med_records);
$totalRows_med_records = mysql_num_rows($med_records);



//// Include Language ////
include('../../../../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../../../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../../../../assets/languages/english.php');
}
//// End Language ////

$use_bootstrap='1';


///// Include news records ////
$search=$_GET['search'];
$id=$_GET['id'];


mysqli_select_db($website,$database_website );
$query_Recordset2 = "SELECT * FROM employee WHERE emp_id='$id'";
$Recordset2 = $website->query($query_Recordset2);
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);


mysqli_select_db($website,$database_website );
$query_Recordset3 = "SELECT * FROM med_records WHERE emp_id='$id' ORDER BY med_records_date";
$Recordset3 = $website->query($query_Recordset3);
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);




?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../../assets/header.php');
	//// end of header script ////
		?>

        <style type="text/css">

.style1 {font-size: 24px}
            
        </style>
</head>
	<body>
		<section class="employees">

			<main class="main">

				<section class="">
<section class="">
<div class="table-responsive">

	<div align="center" style="text-align:center;">
	  <p class="style1 arabic" style="text-align: center;">

<img src="../../../../../assets/images/logos/petrosafe.jpg" width="100" height="94" alt=""/>

<br>
<span style="font-size:12px">
الشئون الطبية</span>
<br>


السجل الطبى للمريض    </p>
	  </div>




<div <?php if($_SESSION['language']=='AR') { ?> style="rtl" <?php } ?>>

<table width="90%" align="center" dir="rtl" class=" table-responsive-sm" style="font-size:14px">
  
    <tr>
      <th width="8%" bgcolor="#FFFFFF" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><div align="right"><strong>الاسم</strong></div></th>
      <th width="29%" bgcolor="#f3f3f3" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>محمد حسين</th>
      <th width="9%" bgcolor="#FFFFFF" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><div align="right"><strong>الرقم</strong></div></th>
        	 
            <th width="23%" bgcolor="#f3f3f3" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>117</th>
             
            <th width="9%" bgcolor="#FFFFFF" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><div align="right"><strong>الوظيفة</strong></div></th>



            <th width="22%" bgcolor="#f3f3f3" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>مدير عام مساعد</th>
    </tr>
    <tr>
      <th class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><div align="right"><strong>تليفون المنزل</strong></div></th>
      <th bgcolor="#f3f3f3" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>02018917987</th>
      <th class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><div align="right"><strong>تاريخ الميلاد</strong></div></th>
      <th bgcolor="#f3f3f3" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>12/1/1977</th>
      <th class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><div align="right"><strong>العنوان</strong></div></th>
      <th bgcolor="#f3f3f3" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>الرحاب</th>
    </tr>
  

    <tbody class="ui-sortable">
      


         
    </tbody>
    </table>
<br>
<table border="1" align="center" cellpadding="3" cellspacing="2" class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm" style="font-size:14px; width: 90%; ">
  <thead>
    <tr>
      <th rowspan="2" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>التاريخ</th>
      <th rowspan="2" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>الشكوى / التشخيص</th>
      <th rowspan="2" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>الأبحاث</th>
      <th rowspan="2" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>التوصيات</th>
      <th rowspan="2" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>ملاحظات</th>
      <th colspan="4" class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>الأجازات</th>
      </tr>
    <tr>
      
            <th class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>مزمنة</th>
                <th class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>مرضية</th>
                  <th class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>إصابة</th>
                  
                    <th class="" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>مهنية</th>
            </tr>
  </thead>

    <tbody class="ui-sortable">
      <?php do { ?>
        <tr class="o_data_row">
          
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
          <td class="">&nbsp;</td>
        </tr>
        <?php } while ($row_med_records = mysql_fetch_assoc($med_records)); ?>


         
    </tbody>
    </table>
  </div>
  </div>

      </section>
    </main>
  
</body>

    </div>
    </div>

			  </section>
			</main>
		</section>
	</body>
</html>
<?php
mysql_free_result($med_records);
?>
