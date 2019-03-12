<?php require_once('../../../../../Connections/people_erp.php'); ?>
<?php require_once('../../../../../Connections/localhost.php'); ?>
<?php require_once('../../../../../webassist/mysqli/rsobj.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "employee_add")) {
  $insertSQL = sprintf("INSERT INTO employee (organization, employee_id, name_arabic, birth_date, national_id_card_no, company_join_date, sector_join_date, cp_member_type_id, cp_number, cp_company_code, cp_basic_salary_total_last_july, total_excluded_increases_le, current_production_inc_le) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['organization'], "int"),
                       GetSQLValueString($_POST['payroll'], "text"),
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['dob'], "date"),
                       GetSQLValueString($_POST['id_card_number'], "int"),
                       GetSQLValueString($_POST['co_join_date'], "date"),
                       GetSQLValueString($_POST['sector_join_date'], "date"),
                       GetSQLValueString($_POST['member_type'], "int"),
                       GetSQLValueString($_POST['member_code'], "text"),
                       GetSQLValueString($_POST['company_code'], "text"),
                       GetSQLValueString($_POST['basic_salary'], "double"),
                       GetSQLValueString($_POST['exc_inc'], "double"),
                       GetSQLValueString($_POST['production_inc'], "double"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "../index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$Recordset1 = new WA_MySQLi_RS("Recordset1",$people_erp,1);
$Recordset1->setQuery("SELECT * FROM employee");
$Recordset1->execute();

mysql_select_db($database_localhost, $localhost);
$query_status = "SELECT * FROM cp_member_type ORDER BY cp_member_type.cp_member_type_a";
$status = mysql_query($query_status, $localhost) or die(mysql_error());
$row_status = mysql_fetch_assoc($status);
$totalRows_status = mysql_num_rows($status);
?>
<?php
//// include config script ////
include('../../../../../assets/config.php');
//// end of config script ////

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





?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../../assets/header.php');
	//// end of header script ////
		?>
		
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	</head>
	<body style="height:100%">
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/saving_insurance/" >
						<h1 style="height: 100%;"><?php echo $vSavingInsurance; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../../../../assets/menus/header/saving_insurance.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../../../../assets/menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><a href="../"><span class="root"><?php echo $vMembers; ?> </span></a> <span class="slash"> / </span> <span class=""><?php echo $vAdd; ?></span></h1>
						
				  </section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>
					
<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
						<fieldset class="search">
							<input class="arabic" type="text" id="search" placeholder="<?php echo $vSearch ; ?>..." />

						</fieldset>
						<fieldset class="refine" <?php if($_SESSION['language']=='AR') { ?>style="margin-left:0px <?php } ?> ">
							<span style="font-size: 14px"><?php echo  $row_crud_case['case_code']; ?> </span>  &nbsp
							
<button id="filters"><i class="fas fa-filter"></i>Filters<i class="fas fa-caret-down"></i></button>
							<button id="group-by"><i class="fas fa-bars"></i>Group By<i class="fas fa-caret-down"></i></button>
							<button id="favourites"><i class="fas fa-star"></i>Favourites<i class="fas fa-caret-down"></i></button>
						</fieldset>
						<fieldset class="view">
							 <span class="count">1-1 / 1</span>
							 <span class="directions">
								 <button id="right"><i class="fas fa-chevron-right"></i></button>
								 <button id="left"><i class="fas fa-chevron-left"></i></button>
							</span>
							 <span class="layout">
								 <button class="active" id="thumbnails-large"><i class="fas fa-th-large"></i></button><button id="list"><i class="fas fa-list-ul"></i></button><button id="thumbnails"><i class="fas fa-th"></i></button>
							 </span>
						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body" style="height:100%">
				<!-- Start of Content -->
											
					<form action="<?php echo $editFormAction; ?>" method="POST" target="_self" name="employee_add">		
							
						<input type="hidden" value="<?php echo $organization; ?>" name="organization">
						
					<section class="employee-create">
						<header style="display: none">
							<button id="active"><i class="fas fa-archive"></i><?php echo $vMember; ?></button>
							<div class="clear"></div>
						</header>
						<section class="title">
							<figure style="display: none">
								<img src="../../../../../assets/images/placeholder.png" />
							</figure>
							<fieldset>
								<label for="name"><?php echo $vName; ?></label><br />
								<input required name="name" type="text" id="name" placeholder="<?php echo $vName; ?>" /><br />
							  <input required name="payroll" type="text" id="part-time" placeholder="<?php echo $vPayroll ; ?>" />
							</fieldset>
							<div class="clear"></div>
						</section>
						
						<br>
						<div class="tabs">
  <div class="tab-button-outer">
    <ul id="tab-button">
		<li><a href="#tab01"><h4><?php echo $vPersonalData ; ?></h4></a></li>
		<li><a href="#tab02"><h4><?php echo $vComplementaryPensionData; ?></h4></a></li>
      
    </ul>
  </div>
  <div class="tab-select-outer">
    <select id="tab-select">
		<option value="#tab01"><h4><?php echo $vPersonalData ; ?></h4></option>
		<option value="#tab02"><h4><?php echo $vComplementaryPensionData; ?></h4></option>
     
    </select>
  </div>

  <div id="tab01" class="tab-contents">
    
    
	  <section class="">
	    <main style="padding: 0px; margin: 4px">
					<section class="">
									
									<fieldset>

										<table width="100%" border="0" cellspacing="4" cellpadding="4" style="font-size:12px">
  <tbody>
    <tr>
		
      <td width="20%"><?php echo $vDateOfBirth ; ?></td>
      <td width="30%"><input type="date" id="work-address" value="" name="dob" style="width: 90%" class="text_hany" /></td>
      
	  <td width="20%"><?php echo $vIdCardNumber ; ?></td>
      <td width="30%"><input style="width: 90%" type="text" name="id_card_number" class="text_hany"></td>
		
    </tr>
    <tr>
		
      <td><?php echo $vMemberNumber ; ?></td>
      <td><input type="text" id="work-address2" value="" name="member_code" style="width: 90%" class="text_hany" /></td>
		
      <td><?php echo $vCompanyCode ; ?></td>
      <td><input style="width: 90%" type="text" class="text_hany" name="company_code"></td>
		
    </tr>
    <tr>
      <td><?php echo $vSectorJoinDate ; ?></td>
      <td><input type="date" id="work-address3" value="" name="sector_join_date" style="width: 90%" class="text_hany" /></td>
      <td><?php echo $vDateOfJoinCompany ; ?></td>
      <td><input type="date" id="work-address4" value="" name="co_join_date" style="width: 90%" class="text_hany" /></td>
    </tr>
    <tr style="display: none">
      <td>Name</td>
      <td><input style="width: 90%" type="date" class="text_hany"></td>
      <td>DOB</td>
      <td><select style="width: 90%" name="id_card_number" id="select" class="text_hany">
        </select></td>
    </tr>
  
  </tbody>
</table>
										
										

									</fieldset>
				  </section>
					<section class="other">
						<fieldset>
					  </fieldset>
				  </section>
				</main>
			  </section>
	  
  </div>
  <div id="tab02" class="tab-contents">
   
	  <section class="">
	    <main style="padding: 0px; margin: 4px">
					<section class="">
									
									<fieldset>

										<table width="100%" border="0" cellspacing="4" cellpadding="4" style="font-size:12px">
  <tbody>
    <tr>
		
      <td width="20%"><?php echo $vBasicSalary ; ?></td>
      <td width="30%"><input type="text" id="work-address" value="" name="basic_salary" style="width: 90%" class="text_hany" /></td>
      
	  <td width="20%"><?php echo $vProductionIncentive ; ?></td>
      <td width="30%"><input style="width: 90%" type="text" name="production_inc" class="text_hany"></td>
		
    </tr>
    <tr>
		
      <td><?php echo $vExcludedSpInc ; ?></td>
      <td><input type="text" id="work-address2" value="" name="exc_inc" style="width: 90%" class="text_hany" /></td>
		
      <td><?php echo $vStatus ; ?></td>
      <td><select style="width: 90%" name="member_type" id="id_card_number" class="text_hany">
        <?php
do {  
?>
        <option value="<?php echo $row_status['cp_member_type_id']?>"><?php echo $row_status['cp_member_type_a']?></option>
        <?php
} while ($row_status = mysql_fetch_assoc($status));
  $rows = mysql_num_rows($status);
  if($rows > 0) {
      mysql_data_seek($status, 0);
	  $row_status = mysql_fetch_assoc($status);
  }
?>
      </select></td>
		
    </tr>
    <tr style="display: none">
      <td>&nbsp;</td>
      <td><input style="width: 90%" type="date" class="text_hany"></td>
      <td>DOB</td>
      <td>&nbsp;</td>
    </tr>
  
  </tbody>
</table>
										
										

									</fieldset>
				  </section>
					<section class="other">
						<fieldset>
					  </fieldset>
				  </section>
				</main>
			  </section>
	  
    
  </div>
  
 
</div>
						<button style="margin: 10px; font-size: 16px; background-color: #00a09d; color: white" type="submit" class="btn "><?php echo $vAdd; ?></button>

			
			
						
					</section>
					<input type="hidden" name="MM_insert" value="employee_add">

				
				
					</form>					

												
				<!-- End of content -->
				</section>
			</main>
		</section>
	</body>
</html>
<?php
mysql_free_result($status);
?>
