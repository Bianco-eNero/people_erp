<?php require_once('../../../../../Connections/people_erp.php'); ?>
<?php require_once('../../../../../Connections/localhost_i.php'); ?>
<?php require_once('../../../../../webassist/mysqli/rsobj.php'); ?>
<?php require_once('../../../../../webassist/mysqli/queryobj.php'); ?>
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
$id=$_GET['id'];
$Recordset1 = new WA_MySQLi_RS("Recordset1",$people_erp,1);
$Recordset1->setQuery("SELECT * FROM employee WHERE employee_id='$id'");
$Recordset1->execute();


mysqli_select_db($localhost_i,$database_localhost );
$query_status_1all= "SELECT COUNT(employee_id) AS TOTAL_EMP FROM employee";
$status_1all = mysqli_query($localhost_i,$query_status_1all) or die(mysqli_error());
$row_status_1all = mysqli_fetch_assoc($status_1all);

mysqli_select_db($localhost_i,$database_localhost );
$query_status_1 = "SELECT employee_id FROM employee WHERE employee_id>'$id' ORDER BY employee_id";
$status_1 = mysqli_query($localhost_i,$query_status_1) or die(mysqli_error());
$row_status_1 = mysqli_fetch_assoc($status_1);

mysqli_select_db($localhost_i,$database_localhost );
$query_status_2 = "SELECT employee_id FROM employee WHERE employee_id<'$id' ORDER BY employee_id DESC";
$status_2 = mysqli_query($localhost_i,$query_status_2) or die(mysqli_error());
$row_status_2 = mysqli_fetch_assoc($status_2);


mysqli_select_db($localhost_i,$database_localhost );
$query_status = "SELECT * FROM cp_member_type ORDER BY cp_member_type.cp_member_type_a";
$status = mysqli_query($localhost_i,$query_status) or die(mysqli_error());
$row_status = mysqli_fetch_assoc($status);
$totalRows_status = mysqli_num_rows($status);
?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $UpdateQuery = new WA_MySQLi_Query($people_erp);
  $UpdateQuery->Action = "update";
  $UpdateQuery->Table = "employee";
  $UpdateQuery->bindColumn("employee_id", "s", "".((isset($_POST["payroll"]))?$_POST["payroll"]:"")  ."", "WA_DEFAULT");
  if ($_SESSION['language']=='AR')
  {
  $UpdateQuery->bindColumn("name_arabic", "s", "".((isset($_POST["name"]))?$_POST["name"]:"")  ."", "WA_DEFAULT");
  }
  if ($_SESSION['language']=='EN')
  {
  $UpdateQuery->bindColumn("name_english", "s", "".((isset($_POST["name"]))?$_POST["name"]:"")  ."", "WA_DEFAULT");
  }
  $UpdateQuery->bindColumn("birth_date", "t", "".((isset($_POST["dob"]))?$_POST["dob"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("national_id_card_no", "i", "".((isset($_POST["id_card_number"]))?$_POST["id_card_number"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("company_join_date", "t", "".((isset($_POST["co_join_date"]))?$_POST["co_join_date"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("sector_join_date", "t", "".((isset($_POST["sector_join_date"]))?$_POST["sector_join_date"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("cp_member_type_id", "i", "".((isset($_POST["member_type"]))?$_POST["member_type"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("cp_number", "s", "".((isset($_POST["member_code"]))?$_POST["member_code"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("cp_company_code", "s", "".((isset($_POST["company_code"]))?$_POST["company_code"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("cp_basic_salary_total_last_july", "s", "".((isset($_POST["basic_salary"]))?$_POST["basic_salary"]:"")  ."", "WA_DEFAULT");


      $UpdateQuery->bindColumn("cp_transferred_balance_emp_portion_le", "s", "".((isset($_POST["vTransferredPersonalPortion"]))?$_POST["vTransferredPersonalPortion"]:"")  ."", "WA_DEFAULT");
    
  $UpdateQuery->bindColumn("cp_transferred_balance_emp_portion_inv_le", "s", "".((isset($_POST["vTransferredPersonalPortionInv"]))?$_POST["vTransferredPersonalPortionInv"]:"")  ."", "WA_DEFAULT");
    
  $UpdateQuery->bindColumn("cp_transferred_balance_co_portion_le", "s", "".((isset($_POST["vTransferredCompanyPortion"]))?$_POST["vTransferredCompanyPortion"]:"")  ."", "WA_DEFAULT");
    
  $UpdateQuery->bindColumn("cp_transferred_balance_co_portion_inv_le", "s", "".((isset($_POST["vTransferredCompanyPortionInv"]))?$_POST["vTransferredCompanyPortionInv"]:"")  ."", "WA_DEFAULT");
    
    $UpdateQuery->bindColumn("cp_transferred_from", "s", "".((isset($_POST["vTransferredFrom"]))?$_POST["vTransferredFrom"]:"")  ."", "WA_DEFAULT");

    
    
$UpdateQuery->bindColumn("cp_total_monthly_salary_actual_le", "s", "".((isset($_POST["cp_total_monthly_salary_actual_le"]))?$_POST["cp_total_monthly_salary_actual_le"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("cp_mandatoryPeriodLeReciept", "s", "".((isset($_POST["cp_mandatoryPeriodLeReciept"]))?$_POST["cp_mandatoryPeriodLeReciept"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("cp_mandatoryPeriodLeDate", "s", "".((isset($_POST["cp_mandatoryPeriodLeDate"]))?$_POST["cp_mandatoryPeriodLeDate"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("total_excluded_increases_le", "s", "".((isset($_POST["exc_inc"]))?$_POST["exc_inc"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->bindColumn("current_production_inc_le", "s", "".((isset($_POST["production_inc"]))?$_POST["production_inc"]:"")  ."", "WA_DEFAULT");
  $UpdateQuery->addFilter("employee_id", "=", "s", "".($_GET['id'])  ."");
  $UpdateQuery->execute();
  $UpdateGoTo = "../index.php";
  if (function_exists("rel2abs")) $UpdateGoTo = $UpdateGoTo?rel2abs($UpdateGoTo,dirname(__FILE__)):"";
  $UpdateQuery->redirect($UpdateGoTo);
}
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
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" >
						<h1 style="height: 100%;"><?php echo $vComplementaryPension; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../../../../assets/menus/header/compl_pension.php')
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
						<h1>
							<a href="../../members">
								<span class="root"><?php echo $vMembers; ?>

								</span>
							</a>

							<span class="slash"> / </span>

							<span class=""><?php echo $vEdit; ?></span>

						</h1>

				  </section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>

<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
						<fieldset class="search">
							 <form target="_self" method="get">
							<input value="<?php if(isset($_GET['id'])) { echo $_GET['id']; }?>" class="arabic" name="id" type="text" id="search" placeholder="<?php echo $vSearchByPayroll ; ?>" />
							</form>
						</fieldset>
						<fieldset class="refine" <?php if($_SESSION['language']=='AR') { ?>style="margin-left:0px <?php } ?> ">
							<span style="font-size: 14px"><?php echo  $row_crud_case['case_code']; ?> </span>  &nbsp

<button id="filters"><i class="fas fa-filter"></i>Filters<i class="fas fa-caret-down"></i></button>
							<button id="group-by"><i class="fas fa-bars"></i>Group By<i class="fas fa-caret-down"></i></button>
							<button id="favourites"><i class="fas fa-star"></i>Favourites<i class="fas fa-caret-down"></i></button>
						</fieldset>
						<fieldset class="view">
							 <span class="count"><?php echo $row_status_1all['TOTAL_EMP']; ?> / 1</span>
							 <span class="directions">
								 <a href="index.php?id=<?php echo $row_status_1['employee_id'];?>"><button id="right"><i class="fas fa-chevron-right"></i></button></a>
								 <a href="index.php?id=<?php echo $row_status_2['employee_id'];?>"><button id="left"><i class="fas fa-chevron-left"></i></button></a>
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

					<form method="POST" target="_self" name="employee_add">

						<input type="hidden" value="<?php echo $organization; ?>" name="organization">

					<section class="employee-create">
						<header style="display: none">
							<button id="active"><i class="fas fa-archive"></i><?php echo $vMember; ?></button>
							<div class="clear"></div>
						</header>
						<section class="title">
							<figure style="border: gray; margin: 2px; border-style: solid;border-color: lightgray; height: 130px; width: 130px" >

								<img src="../../../../../assets/images/emp_pics/<?php echo($Recordset1->getColumnVal("employee_id")); ?><?php echo '.bmp'; ?>" />
							</figure>
							<fieldset>
								<label for="name"><?php echo $vName; ?></label><br />
								<input name="name" type="text" id="name" placeholder="<?php echo $vName; ?>" value="<?php
                if($_SESSION['language']=='AR') {
                echo($Recordset1->getColumnVal("name_arabic"));
                }
                if($_SESSION['language']=='EN') {
                echo($Recordset1->getColumnVal("name_english"));
                }
                ?>" /><br />
							  <input name="payroll" type="text" id="part-time" placeholder="<?php echo $vPayroll ; ?>" value="<?php echo($Recordset1->getColumnVal("employee_id")); ?>" />
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
      <td width="30%"><input type="date" id="work-address"  name="dob" value="<?php echo($Recordset1->getColumnVal("birth_date")); ?>" style="width: 90%" class="text_hany" /></td>

	  <td width="20%"><?php echo $vIdCardNumber ; ?></td>
      <td width="30%"><input name="id_card_number" type="text" class="text_hany" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("national_id_card_no")); ?>"></td>

    </tr>
    <tr>

      <td><?php echo $vMemberNumber ; ?></td>
      <td><input type="text" id="work-address2" value="<?php echo($Recordset1->getColumnVal("cp_number")); ?>" name="member_code" style="width: 90%" class="text_hany" /></td>

      <td><?php echo $vCompanyCode ; ?></td>
      <td><input name="company_code" type="text" class="text_hany" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_company_code")); ?>"></td>

    </tr>
    <tr>
      <td><?php echo $vSectorJoinDate ; ?></td>
      <td><input type="date" id="work-address3" value="<?php echo($Recordset1->getColumnVal("sector_join_date")); ?>" name="sector_join_date" style="width: 90%" class="text_hany" /></td>
      <td><?php echo $vDateOfJoinCompany ; ?></td>
      <td><input type="date" id="work-address4" value="<?php echo($Recordset1->getColumnVal("company_join_date")); ?>" name="co_join_date" style="width: 90%" class="text_hany" /></td>
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
      <td width="30%"><input name="basic_salary" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_basic_salary_total_last_july")); ?>" /></td>

	  <td width="20%"><?php echo $vProductionIncentive ; ?></td>
      <td width="30%"><input style="width: 90%" type="text" name="production_inc" value="<?php echo($Recordset1->getColumnVal("current_production_inc_le")); ?>" class="text_hany"></td>

    </tr>
    <tr>

      <td><?php echo $vExcludedSpInc ; ?></td>
      <td><input type="text" id="work-address2" value="<?php echo($Recordset1->getColumnVal("total_excluded_increases_le")); ?>" name="exc_inc" style="width: 90%" class="text_hany" /></td>

      <td><?php echo $vStatus ; ?></td>
      <td><select style="width: 90%" name="member_type" id="id_card_number" class="text_hany">
        <?php
do {
?>
        <option value="<?php echo $row_status['cp_member_type_id']?>"<?php if (!(strcmp($row_status['cp_member_type_id'], ($Recordset1->getColumnVal("cp_member_type_id"))))) {echo "selected=\"selected\"";} ?>><?php echo $row_status['cp_member_type_a']?></option>
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

    <tr>

      <td width="20%"><?php echo $vcp_total_monthly_salary_actual_le ; ?></td>
      <td width="30%"><input name="cp_total_monthly_salary_actual_le" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_total_monthly_salary_actual_le")); ?>" /></td>

	  <td width="20%"><?php echo $vcp_mandatoryPeriodLeReciept; ?></td>
    <td width="30%"><input name="cp_mandatoryPeriodLeReciept" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_mandatoryPeriodLeReciept")); ?>" /></td>

    </tr>


    <tr>

      <td width="20%"><?php echo $vcp_mandatoryPeriodLeDate ; ?></td>
      <td width="30%"><input name="cp_mandatoryPeriodLeDate" type="date" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_mandatoryPeriodLeDate")); ?>" /></td>

	  <td width="20%"><?php  ?></td>
      <td width="30%"></td>

    </tr>
      
      <tr>

      <td width="20%"><?php echo $vTransferredFromCompany ; ?></td>
      <td width="30%"><input name="vTransferredFrom" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("vTransferredFrom")); ?>" /></td>

	  <td width="20%"></td>
      <td width="30%"></td>

    </tr>
      
      
      <tr>

      <td width="20%"><?php echo $vTransferredPersonalPortion ; ?></td>
      <td width="30%"><input name="vTransferredPersonalPortion" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_transferred_balance_emp_portion_le")); ?>" /></td>

	  <td width="20%"><?php echo $vTransferredPersonalPortionInv ; ?></td>
      <td width="30%"><input name="vTransferredPersonalPortionInv" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_transferred_balance_emp_portion_inv_le")); ?>" /></td>

    </tr>
      
      <tr>

      <td width="20%"><?php echo $vTransferredCompanyPortion ; ?></td>
      <td width="30%"><input name="vTransferredCompanyPortion" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_transferred_balance_co_portion_le")); ?>" /></td>

	  <td width="20%"><?php echo $vTransferredCompanyPortionInv ; ?></td>
      <td width="30%"><input name="vTransferredCompanyPortionInv" type="text" class="text_hany" id="" style="width: 90%" value="<?php echo($Recordset1->getColumnVal("cp_transferred_balance_co_portion_inv_le")); ?>" /></td>

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
						<button style="margin: 10px; font-size: 16px; background-color: #00a09d; color: white" type="submit" class="btn "><?php echo $vEdit; ?></button>




					</section>
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
