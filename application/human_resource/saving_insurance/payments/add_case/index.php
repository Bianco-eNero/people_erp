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

//// select all employees ////
mysql_select_db($database_localhost, $localhost);
$query_employees = "SELECT * FROM employee ORDER BY employee.employee_id";
$employees = mysql_query($query_employees, $localhost) or die(mysql_error());
$row_employees = mysql_fetch_assoc($employees);
$totalRows_employees = mysql_num_rows($employees);


//// selected employee ////
if(isset($_GET['emp_id'])) {

	$id=$_GET['emp_id'];
	mysql_select_db($database_localhost, $localhost);
$query_employees2 = "SELECT * FROM employee WHERE employee_id='$id'";
$employees2 = mysql_query($query_employees2, $localhost) or die(mysql_error());
$row_employees2 = mysql_fetch_assoc($employees2);
$totalRows_employees2 = mysql_num_rows($employees2);
}

//// select all end type service ////
mysql_select_db($database_localhost, $localhost);
$query_employees32 = "SELECT * FROM sp_end_server_type";
$employees32 = mysql_query($query_employees32, $localhost) or die(mysql_error());
$row_employees32 = mysql_fetch_assoc($employees32);
$totalRows_employees32 = mysql_num_rows($employees32);

//// selected end type service ////
if(isset($_GET['end_type']))
{
	$hjk=$_GET['end_type'];
	mysql_select_db($database_localhost, $localhost);
$query_employees32a = "SELECT * FROM sp_end_server_type WHERE sp_end_server_type_id='$hjk'";
$employees32a = mysql_query($query_employees32a, $localhost) or die(mysql_error());
$row_employees32a = mysql_fetch_assoc($employees32a);
$totalRows_employees32a = mysql_num_rows($employees32a);


}


/// selecetd employee ////





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



	    <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
        </script>


		<script type="text/javascript">
<!--
function MM_jumpMenu2(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
	<body style="height:100%">
		<section class="employees">
			<header class="header dont_print_me">
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
				<section class="control dont_print_me">
					<section class="action">
						<h1><a href="../"><span class="root"><?php echo $vPayments; ?> </span></a> <span class="slash"> / </span> <span class=""><?php echo $vAdd; ?></span></h1>

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



						<input type="hidden" value="<?php echo $organization; ?>" name="organization">

					<section class="employee-create">
						<header style="display:none">
							<button id="active"><i class="fas fa-archive"></i><?php echo $vMember; ?></button>
							<div class="clear"></div>
						</header>
						<section class="title">
							<figure style="display: none">
								<img src="../../../../../assets/images/placeholder.png" />
							</figure>
							<fieldset>
								<label for="name"><?php echo $vSelectEmployeeTpEndService; ?></label><br />
                <form method="get" action="index.php">
                <input value="<?php if(isset($_GET['emp_id'])) { echo  $row_employees2['employee_id']. ' - ' . $row_employees2['name_arabic']; } ?>" required name="emp_id" type="text" id="name" placeholder="<?php echo $vEnterPrAndEnter; ?>" /><br/>
              </form>
                <?php

                ?>

                <?php if(isset($_GET['emp_id'])) { ?>

                  <select name="end_service" id="jumpMenu2" onChange="MM_jumpMenu2('parent',this,0)">

                      <option value=""><?php echo $vSelectEndServiceType ; ?></option>
                    <?php do { ?>
                    <option <?php if($row_employees32a['sp_end_server_type_id']==$row_employees32['sp_end_server_type_id']) { ?> selected <?php } ?> value="index.php?emp_id=<?php echo $row_employees2['employee_id']?>&end_type=<?php echo $row_employees32['sp_end_server_type_id']; ?>&sector_join_date=<?php echo $row_employees2['sector_join_date']; ?>&emp_dob=<?php echo $row_employees2['birth_date'] ?>&end_date=<?php echo $_GET['end_date']?>&membership_start=<?php echo $row_employees2['sp_member_start_date'] ?>">
                              <?php
                        if($_SESSION['language']=='AR') {
                            echo $row_employees32['sp_end_server_type_a'];
                        }

                        if($_SESSION['language']=='EN') {
                            echo $row_employees32['sp_end_server_type_e'];
                        }

                                ?>
                    </option>
                    <?php
                    } while ($row_employees32 = mysql_fetch_assoc($employees32));
                      $rows = mysql_num_rows($employees32);
                      if($rows > 0) {
                          mysql_data_seek($employees32, 0);
                          $row_employees32 = mysql_fetch_assoc($employees32);
                      }
                    ?>
                  </select>

                <?php } ?>

                <?php if(isset($_GET['emp_id'])) { ?>

								<br>
								<form method="get" action="index.php">

									<input type="hidden" value="<?php echo $_GET['emp_id']; ?>" name="emp_id">
									<input type="hidden" value="<?php echo $_GET['end_type']; ?>" name="end_type">
                                    <input type="hidden" value="<?php echo $_GET['sector_join_date']; ?>" name="sector_join_date">
                                    <input type="hidden" value="<?php echo $_GET['emp_dob'];?>" name="emp_dob">
                                    <input type="hidden" value="<?php echo $_GET['membership_start'];?>" name="membership_start">



                                    <select name="title">

                                        <option selected hidden><?php echo $vSelect ; ?></option>
                                        <?php
                                        $title_query=mysql_query("SELECT * FROM sp_perc_title", $localhost);
                                        $title = mysql_fetch_assoc($title_query);
                                        do {
                                            ?>
                                            <option <?php if($title['sp_perc_title_id']==$_GET['title']){echo 'selected';} ?> value="<?php echo $title['sp_perc_title_id'] ; ?>">
                                                <?php
                                                if($_SESSION['language']=='AR') {
                                                    echo $title['title'];
                                                }
                                                if($_SESSION['language']=='EN') {
                                                    echo $title['title_en'];
                                                }

                                                ?>
                                            </option>
                                            <?php
                                        } while (mysql_fetch_assoc($title_query));
                                        ?>
                                    </select>


								    <input name="end_date" value="<?php echo $_GET['end_date']; ?>" type="date" id="part-time" placeholder="<?php echo $vDateOfEndService ; ?>" />
								    <br>
									<button style="margin: 10px; font-size: 16px; background-color: #00a09d; color: white" type="submit" class="btn "><?php echo $vPreviewBasicData; ?></button>

								</form>

<?php } ?>
                <?php
//// preview basic data ////


///// GET THE BASIC DATA /////

  ///////////////////////////////////////////////////////
	//// PETR SECTOR EXPERIENCE TILL END SERVICE DATE ////
  //////////////////////////////////////////////////////
  $from=date($_GET['sector_join_date']);
  $to=date($_GET['end_date']);

  //// calculate sector experience in years ////
  $vCpSecExp = date_diff(date_create($from), date_create($to))->y;

//// preview sector experience in Y , m , d ////
  $date1 = new DateTime(date($_GET['sector_join_date']));
$date2 = new DateTime(date($_GET['end_date']));
$diff = $date1->diff($date2);


  /////////////////////////////////////////////
  //// get the age at the end service date ////
  //////////////////////////////////////////////
  $fromAge=date($_GET['emp_dob']);
  $to=date($_GET['end_date']);

//// calculate Age in years ////
  $Age = date_diff(date_create($fromAge), date_create($to))->y;

//// preview age in Y , m , d ////
  $date1A = new DateTime(date($_GET['emp_dob']));
$date2A = new DateTime(date($_GET['end_date']));
$diffA = $date1A->diff($date2A);


/////////////////////////////////////////////
//// get the membership duration /////////////
//////////////////////////////////////////////
$fromMembership=date($_GET['membership_start']);
$to=date($_GET['end_date']);

//// calculate Age in years ////
$MemberhipStart = date_diff(date_create($fromMembership), date_create($to))->y;

//// preview age in Y , m , d ////
$date1B = new DateTime(date($_GET['membership_start']));
$date2B = new DateTime(date($_GET['end_date']));
$diffB = $date1B->diff($date2B);


///// end get the basic data test section  ////

// echo '<br>';
            //    echo 'Test ';
            //    echo $vCpSecExp;
              //  echo $eee ;
          //    echo '<br>';

  //            echo $Age;

                ?>


							</fieldset>
							<div class="clear"></div>
						</section>

						<br>

<?php if(isset($_GET['emp_id'])) { ?>


            <section class="employees">

              <?php if(isset($_GET['emp_id']) && isset($_GET['end_type']) && $_GET['end_date']<>"") { ?>

            <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
              <thead>
                <tr>

                  <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vPetroleumExperience; ?></th>
                  <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCpMembershipPeriod; ?></th>
                  <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vAgeOnEndServiceDate; ?></th>

                </tr>

              </thead>

                <tbody class="ui-sortable">

                  <tr class="o_data_row" >

                    <td class="o_data_cell"><?php
                    echo " " . $diff->y . $vYears. " , " . $diff->m. $vMonths ." , ".$diff->d." ". $vDays;
                    ?></td>

                    <td class="o_data_cell"><?php
                    echo " " . $diffB->y . $vYears. " , " . $diffB->m. $vMonths ." , ".$diffB->d." ". $vDays; ?></td>

                    <td class="o_data_cell"><?php
                    echo " " . $diffA->y . $vYears. " , " . $diffA->m. $vMonths ." , ".$diffA->d." ". $vDays; ?></td>

                  </tr>


                </tbody>
                </table>

              <?php } ?>

              </section>

              <?php if(isset($_GET['emp_id']) && isset($_GET['end_type']) && $_GET['end_date']<>"") { ?>


<h3><?php echo $vCpPersonalAccountSummary ; ?></h3>

<?php
if(isset($_GET['emp_id'])) {

	$id=$_GET['emp_id'];
	mysql_select_db($database_localhost, $localhost);
$query_employees2ss = "SELECT (SUM(emp_portion_le)) AS EMP_P, (SUM(inv_emp_portion_le)) AS EMP_P_INV, (SUM(co_portion_le)) AS CO_P, (SUM(inv_co_portion_le)) AS CO_P_INV FROM sp_transaction WHERE employee_id='$id'";
$employees2ss = mysql_query($query_employees2ss, $localhost) or die(mysql_error());
$row_employees2ss = mysql_fetch_assoc($employees2ss);
$totalRows_employees2ss = mysql_num_rows($employees2ss);
}
 ?>

                <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
                  <thead>
                    <tr>

                      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vEmployeePortion; ?></th>
                      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vEmployeePortionInv; ?></th>
                        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCoPortion; ?></th>
                          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCoPortionInv; ?></th>
                            <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vTotal; ?></th>

                        </tr>

                  </thead>

                    <tbody class="ui-sortable">

                      <tr class="o_data_row" >

                        <td class="o_data_cell"><?php
                        echo number_format($row_employees2ss['EMP_P'], 2, '.', ',');
                        $vEmployeePortionNew=$row_employees2ss['EMP_P'];
                    //    echo $row_employees2ss['EMP_P']; ?></td>

                        <td class="o_data_cell"><?php
                        echo number_format($row_employees2ss['EMP_P_INV'], 2, '.', ',');
                        $vEmployeePortionInvNew=$row_employees2ss['EMP_P_INV'];
                    //    echo $row_employees2ss['EMP_P_INV']; ?></td>

                        <td class="o_data_cell"><?php
                        echo number_format($row_employees2ss['CO_P'], 2, '.', ',');
                        $vCompanyPortionNew=$row_employees2ss['CO_P'];
                      //  echo $row_employees2ss['CO_P']; ?></td>

                        <td class="o_data_cell"><?php
                        echo number_format($row_employees2ss['CO_P_INV'], 2, '.', ',');
                          $vCompanyPortionInvNew=$row_employees2ss['CO_P_INV'];
                      //  echo $row_employees2ss['CO_P_INV']; ?></td>

                        <td class="o_data_cell"><?php
                        echo number_format($row_employees2ss['EMP_P']+$row_employees2ss['EMP_P_INV']+$row_employees2ss['CO_P']+$row_employees2ss['CO_P_INV'], 2, '.', ','); ?></td>


                      </tr>


                    </tbody>
                    </table>

                  <?php } ?>


  <?php
  ///// CASES OF ending service ////

		?>
		<input name="emp_id" type="hidden" value="<?php echo $_GET['emp_id']; ?>">

    <?php if(isset($_GET['emp_id']) && isset($_GET['end_type']) && $_GET['end_date']<>"") { ?>


    <a href="index.php?emp_id=<?php echo $_GET['emp_id']; ?>&end_type=<?php echo $_GET['end_type']; ?>&sector_join_date=<?php echo $_GET['sector_join_date']; ?>&emp_dob=<?php echo $_GET['emp_dob']; ?>&membership_start=<?php echo $_GET['membership_start']; ?>&end_date=<?php echo $_GET['end_date'] ; ?>&title=<?php echo $_GET['title'] ; ?>&calculate=1">
  <button style="margin: 10px; font-size: 16px; background-color: orange; color: white" type="button" class="btn dont_print_me"><?php echo $vCalculate; ?></button>
</a>

<?php } ?>


<?php

    /////////////////////////////////////////////////////////////////
    //// case (6) : Reaching retirement		 ////
    /////////////////////////////////////////////////////////////////

    if($_GET['end_type']=='6' && $_GET['calculate']=='1')
    {

//        $id=$_GET['emp_id'];
//        mysql_select_db($database_localhost, $localhost);
//        $query_employees2ss4 = "SELECT (SUM(emp_portion_le)) AS EMP_P, (SUM(inv_emp_portion_le)) AS EMP_P_INV, (SUM(co_portion_le)) AS CO_P, (SUM(inv_co_portion_le)) AS CO_P_INV FROM sp_transaction, sp_installment_period WHERE sp_installment_period.sp_installment_period_id=sp_transaction.sp_installment_period_id AND employee_id='$id' AND sp_installment_period_closed='1'";
//        $employees2ss4 = mysql_query($query_employees2ss4, $localhost) or die(mysql_error());
//        $row_employees2ss4 = mysql_fetch_assoc($employees2ss4);
//        $totalRows_employees2ss4 = mysql_num_rows($employees2ss4);

        $titleURL=$_GET['title'];
        $selectTitle = mysql_fetch_assoc(mysql_query("SELECT * FROM sp_perc_title WHERE sp_perc_title_id = $titleURL", $localhost));

        $WageCommision=$selectTitle['basic_Remuneration'];
        $Wage=2466.54;
        $VirtualPremium=107.17;

        $IncludedCommision=$selectTitle['special_guaranteed_premiums'];
        $Included=4637.90;

        $ExcludedCommision=$selectTitle['special_unsecured_premiums'];
        $Excluded=776.07;

        $PrecIncentive=$selectTitle['percentage']/100;

        $MaxMonth = mysql_fetch_assoc(mysql_query("SELECT * FROM sp_max_mounth", $localhost));
        $MaxMonth=$MaxMonth['month'];
        ?>



        <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
        <thead>
            <tr>
                <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vDescription; ?></th>
                <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vFeesDeterCommisson; ?></th>
                <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vActualWage; ?></th>
                <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vWageSP; ?></th>
            </tr>

        </thead>

        <tbody class="ui-sortable">

            <tr class="o_data_row" >

                <td class="o_data_cell"><?php echo $vBasicWage;?></td>

                <td class="o_data_cell"><?php
                echo number_format($WageCommision, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                echo number_format($Wage, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                    $WageCompare=($Wage>$WageCommision)?$WageCommision:$Wage;
                    $WageCompare=$WageCompare+$VirtualPremium;
                echo number_format($WageCompare, 2, '.', ',');
                ?></td>

            </tr>

            <tr class="o_data_row" >

                <td class="o_data_cell"><?php echo $vIncludedSpInc;?></td>

                <td class="o_data_cell"><?php
                echo number_format($IncludedCommision, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                echo number_format($Included, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                    $IncludedCompare=($Included>$IncludedCommision)?$IncludedCommision:$Included;
                echo number_format($IncludedCompare, 2, '.', ',');
                ?></td>

            </tr>

            <tr class="o_data_row" >

                <td class="o_data_cell"><?php echo $vExcludedSpInc;?></td>

                <td class="o_data_cell"><?php
                echo number_format($ExcludedCommision, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                echo number_format($Excluded, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                    $ExcludedCompare=($Excluded>$ExcludedCommision)?$ExcludedCommision:$Excluded;
                echo number_format($IncludedCompare, 2, '.', ',');
                ?></td>

            </tr>

            <tr class="o_data_row">

                <td class="o_data_cell"><?php echo $vcp_total_monthly_salary_le;?></td>

                <td class="o_data_cell"><?php
                    $TotalCommision=$ExcludedCommision+$WageCommision+$IncludedCommision;
                    echo number_format($TotalCommision, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                    $Total=$Excluded+$Wage+$Included;
                    echo number_format($Total, 2, '.', ',');
                ?></td>
                <td class="o_data_cell"><?php
                    $TotalCompare=($Total>$TotalCommision)?$TotalCommision:$Total;
                    $TotalCompare=$TotalCompare+$VirtualPremium;
                echo number_format($TotalCompare, 2, '.', ',');
                ?></td>

            </tr>


        </tbody>
        </table>
        <hr>
        <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed" style="width: 50%;margin: 20px auto;">
            <tbody class="ui-sortable">
                <tr class="o_data_row" >
                    <td class="o_data_cell">
                        <?php echo $vBasicSalary.' : ';?>
                    </td>
                    <td class="o_data_cell">
                        <?php
                        $BasicSalary=$WageCompare+$IncludedCompare;
                        echo $BasicSalary;
                        ?>
                    </td>
                </tr>

                <tr class="o_data_row" >
                    <td class="o_data_cell">
                        <?php echo $vExcludedSpInc.' : ';?>
                    </td>
                    <td class="o_data_cell">
                        <?php
                        echo $ExcludedCompare;
                        ?>
                    </td>
                </tr>

                <tr class="o_data_row" >
                    <td class="o_data_cell">
                        <?php echo $vTheValueOfTheIncentive.' : ';?>
                    </td>
                    <td class="o_data_cell">
                        <?php
                        $ValueIncentive=$BasicSalary*$PrecIncentive;
                        echo $ValueIncentive;
                        ?>
                    </td>
                </tr>

                <tr class="o_data_row" >
                    <td class="o_data_cell">
                        <?php echo $vTotal3.' : ';?>
                    </td>
                    <td class="o_data_cell">
                        <?php
                        $Total3=$ValueIncentive+$ExcludedCompare+$BasicSalary;
                        echo $Total3;
                        ?>
                    </td>
                </tr>

                <tr class="o_data_row" >
                    <td class="o_data_cell">
                        <?php echo $vTheValueOfTheReward.' : ';?>
                    </td>
                    <td class="o_data_cell">
                        <?php
                        $ValueReward=$Total3*$MaxMonth;
                        echo $ValueReward;
                        ?>
                    </td>
                </tr>

            </tbody>
        </table>
        <?php
        }
        ////
        ///////////////////////////////////////////////
        //// end 6 Reaching retirement		 /////////////////////////
        //////////////////////////////////////////////


      /////?>

    <?php
        /////////////////////////////////////////////////////////////////
        //// case (9) : Transfer to outside done with ahmed ramadan ////
        /////////////////////////////////////////////////////////////////

        if($_GET['end_type']=='9' && $_GET['calculate']=='1')
        {
    ?>
    <h3><?php echo $vTotalAllowedAmountAsOnePayment; ?></h3>


    <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
      <thead>
        <tr>

          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vEmployeePortion; ?></th>
          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vEmployeePortionInv; ?></th>
            <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCoPortion; ?></th>
              <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCoPortionInv; ?></th>
                <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vFactor; ?></th>
                  <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vTotal; ?></th>

            </tr>

      </thead>

        <tbody class="ui-sortable">

          <tr class="o_data_row" >

            <td class="o_data_cell"><?php
            echo number_format($vEmployeePortionNew, 2, '.', ',');
            $vEmpoPortion=$vEmployeePortionNew;
            ?>
            </td>

            <td class="o_data_cell"><?php
            echo number_format($vEmployeePortionInvNew, 2, '.', ',');
            $vEmpoPortionInv=$vEmployeePortionInvNew;
            ?>
            </td>

            <td class="o_data_cell"><?php
            echo number_format($vCompanyPortionNew, 2, '.', ',');
            $vCompPortion=$vCompanyPortionNew;
            ?>
            </td>

            <td class="o_data_cell"><?php
            echo number_format($vCompanyPortionInvNew, 2, '.', ',');
            $vCompPortionInv=$vCompanyPortionInvNew;
            ?>
            </td>

            <td class="o_data_cell"><?php
            echo number_format(0, 2, '.', ',');
            $vFactorCalculated='0';
            ?>
            </td>

            <td class="o_data_cell"><?php
            $vTotalAllowedAmount=$vEmpoPortion+$vEmpoPortionInv+$vCompPortion+$vCompPortionInv;
            echo number_format($vTotalAllowedAmount, 2, '.', ',');

            ?>
            </td>
          </tr>


        </tbody>
        </table>




      <?php
        }
        ///////////////////////////////////////////////
        //// end 9 Transfer  /////////////////////////
        //////////////////////////////////////////////
?>
</div>

					</section>
					<input type="hidden" name="MM_insert" value="employee_add">

				<!-- End of content -->
				</section>
			</main>


		</section>

<?php } ?>

	</body>
</html>
<?php
mysql_free_result($employees);

?>
