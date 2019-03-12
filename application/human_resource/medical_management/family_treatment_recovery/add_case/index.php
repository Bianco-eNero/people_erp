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
$query_employees32 = "SELECT * FROM cp_end_server_type";
$employees32 = mysql_query($query_employees32, $localhost) or die(mysql_error());
$row_employees32 = mysql_fetch_assoc($employees32);
$totalRows_employees32 = mysql_num_rows($employees32);

//// selected end type service ////
if(isset($_GET['end_type']))
{
	$hjk=$_GET['end_type'];
	mysql_select_db($database_localhost, $localhost);
$query_employees32a = "SELECT * FROM cp_end_server_type WHERE cp_end_server_type_id='$hjk'";
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
                <input value="<?php if(isset($_GET['emp_id'])) { echo  $row_employees2['employee_id']. ' - ' . $row_employees2['name_arabic']; } ?>" required name="emp_id" type="text" id="name" placeholder="<?php echo $vEnterPrAndEnter; ?>" /><br />
              </form>
                <?php

                ?>

                <?php if(isset($_GET['emp_id'])) { ?>

							  <select name="end_service" id="jumpMenu2" onChange="MM_jumpMenu2('parent',this,0)">

								  <option value=""><?php echo $vSelectEndServiceType ; ?></option>
							    <?php
do {
?>
							    <option <?php if($row_employees32a['cp_end_server_type_id']==$row_employees32['cp_end_server_type_id']) { ?> selected <?php } ?> value="index.php?emp_id=<?php echo $row_employees2['employee_id']?>&end_type=<?php echo $row_employees32['cp_end_server_type_id']; ?>&sector_join_date=<?php echo $row_employees2['sector_join_date']; ?>&emp_dob=<?php echo $row_employees2['birth_date'] ?>&end_date=<?php echo $_GET['end_date']?>&membership_start=<?php echo $row_employees2['cp_member_start_date'] ?>">
							      <?php
							if($_SESSION['language']=='AR') {
								echo $row_employees32['cp_end_server_type_a'];
							}

							if($_SESSION['language']=='EN') {
								echo $row_employees32['cp_end_server_type_e'];
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
                    echo " " . $diff->y . $vYears. " , " . $diff->m. $vMonths ." , ".$diff->d." ". $vDays; ?></td>

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
$query_employees2ss = "SELECT (SUM(emp_portion_le)) AS EMP_P, (SUM(inv_emp_portion_le)) AS EMP_P_INV, (SUM(co_portion_le)) AS CO_P, (SUM(inv_co_portion_le)) AS CO_P_INV FROM cp_transaction WHERE employee_id='$id'";
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

							<form method="get" action="" name="frm2">
  <?php
  ///// CASES OF ending service ////

		?>
		<input name="emp_id" type="hidden" value="<?php echo $_GET['emp_id']; ?>">

    <?php if(isset($_GET['emp_id']) && isset($_GET['end_type']) && $_GET['end_date']<>"") { ?>


    <a href="index.php?emp_id=<?php echo $_GET['emp_id']; ?>&end_type=<?php echo $_GET['end_type']; ?>&sector_join_date=<?php echo $_GET['sector_join_date']; ?>&emp_dob=<?php echo $_GET['emp_dob']; ?>&membership_start=<?php echo $_GET['membership_start']; ?>&end_date=<?php echo $_GET['end_date'] ; ?>&calculate=1">
  <button style="margin: 10px; font-size: 16px; background-color: orange; color: white" type="button" class="btn dont_print_me"><?php echo $vCalculate; ?></button>
</a>

<?php } ?>

<?php

    /////////////////////////////////////////////////////////////////
    //// case (1) : TERMINATION NON-PUNITIVE REASON done with ahmed ramadan ////
    /////////////////////////////////////////////////////////////////

    if($_GET['end_type']=='1' && $_GET['calculate']=='1')
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
        echo number_format(0, 2, '.', ',');
        $vCompPortion='0';
        ?>
        </td>

        <td class="o_data_cell"><?php
        echo number_format(0, 2, '.', ',');
        $vCompPortionInv='0';
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
    //// end 1 TERMINATION  /////////////////////////
    //////////////////////////////////////////////


	/////?>




  <?php
  /////////////////////////////////////////////////////////////////
    //// case (2) : RESIGNATION done with ahmed ramadan ////
    /////////////////////////////////////////////////////////////////

        if($_GET['end_type']=='2' && $_GET['calculate']=='1')
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
            echo number_format(0, 2, '.', ',');
            $vCompPortion='0';
            ?>
            </td>

            <td class="o_data_cell"><?php
            echo number_format(0, 2, '.', ',');
            $vCompPortionInv='0';
            ?>
            </td>

            <?php
            /// if sector exp < 5 increase = 0
            if($vCpSecExp<5)
            {
            $empAmount=$vEmpoPortion+$vEmpoPortionInv;
            $DESCO='< 5'.$vYears.' '.$vPetroleumExperience;
              $vFactorCalculated='1';
            }

            if($vCpSecExp>=5 && $vCpSecExp<10)
            {

            $empAmount=$vEmpoPortion+$vEmpoPortionInv;
            $DESCO=' >=5 - <10'.$vYears.' '.$vPetroleumExperience;
              $vFactorCalculated='1.25';
            }

            if($vCpSecExp>=10 && $vCpSecExp<15)
            {


            $empAmount=$vEmpoPortion+$vEmpoPortionInv;
            $DESCO=' >=10 - <15'.$vYears.' '.$vPetroleumExperience;
              $vFactorCalculated='1.50';
            }

            if($vCpSecExp>=15 && $vCpSecExp<20)
            {

            $empAmount=$vEmpoPortion+$vEmpoPortionInv;
            $DESCO=' >=15 - <20'.$vYears.' '.$vPetroleumExperience;
              $vFactorCalculated='1.75';
            }

            if($vCpSecExp>20)
            {


            $empAmount=$vEmpoPortion+$vEmpoPortionInv;
            $DESCO=' > 20'.$vYears.' '.$vPetroleumExperience;
              $vFactorCalculated='2';
            }
             ?>

            <td class="o_data_cell"><?php
            echo number_format($vFactorCalculated, 2, '.', ',');
            $vFactorCalculated=$vFactorCalculated;
            echo '<br>';
            echo $DESCO;
            ?>
            </td>

            <td class="o_data_cell"><?php
            $vTotalAllowedAmount=$vEmpoPortion+$vEmpoPortionInv+$vCompPortion+$vCompPortionInv;
            echo number_format($vTotalAllowedAmount*$vFactorCalculated, 2, '.', ',');
              ?>
            </td>
          </tr>


        </tbody>
        </table>


      <?php
        }
        ////
        ///////////////////////////////////////////////
        //// end 2 resignation /////////////////////////
        //////////////////////////////////////////////


      /////?>

								<?php

    /////////////////////////////////////////////////////////////////
    //// case (3) : Early Retirement	 ////
    /////////////////////////////////////////////////////////////////

    if($_GET['end_type']=='3' && $_GET['calculate']=='1')
    {
?>

								<?php
        }
        ////
        ///////////////////////////////////////////////
        //// end 3 Early Retirement	 /////////////////////////
        //////////////////////////////////////////////


      /////?>




								<?php

    /////////////////////////////////////////////////////////////////
    //// case (4) : Early Retirement	 ////
    /////////////////////////////////////////////////////////////////

    if($_GET['end_type']=='4' && $_GET['calculate']=='1')
    {
?>

								<?php
        }
        ////
        ///////////////////////////////////////////////
        //// end 4 Early Retirement	 /////////////////////////
        //////////////////////////////////////////////


      /////?>



      <?php
      /////////////////////////////////////////////////////////////////
        //// case (5) : Disability done with ahmed ramadan ////
        /////////////////////////////////////////////////////////////////

        if($_GET['end_type']=='5' && $_GET['calculate']=='1')
        {

          $id=$_GET['emp_id'];
          mysql_select_db($database_localhost, $localhost);
        $query_employees2ss4 = "SELECT (SUM(emp_portion_le)) AS EMP_P, (SUM(inv_emp_portion_le)) AS EMP_P_INV, (SUM(co_portion_le)) AS CO_P, (SUM(inv_co_portion_le)) AS CO_P_INV FROM cp_transaction, cp_installment_period WHERE cp_installment_period.cp_installment_period_id=cp_transaction.cp_installment_period_id AND employee_id='$id' AND cp_installment_period_closed='1'";
        $employees2ss4 = mysql_query($query_employees2ss4, $localhost) or die(mysql_error());
        $row_employees2ss4 = mysql_fetch_assoc($employees2ss4);
        $totalRows_employees2ss4 = mysql_num_rows($employees2ss4);

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
            echo number_format($row_employees2ss4['EMP_P_INV'], 2, '.', ',');
            $vEmpoPortionInv=$row_employees2ss4['EMP_P_INV'];
            ?>
            </td>

            <td class="o_data_cell"><?php
            echo number_format($vCompanyPortionNew, 2, '.', ',');
            $vCompPortion=$vCompanyPortionNew;
            ?>
            </td>

            <td class="o_data_cell"><?php
            echo number_format($row_employees2ss4['CO_P_INV'], 2, '.', ',');
            $vCompPortionInv=$row_employees2ss4['CO_P_INV'];
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
            //// end 5 Disablility /////////////////////////
            //////////////////////////////////////////////


        	/////?>



								<?php

    /////////////////////////////////////////////////////////////////
    //// case (6) : Reaching retirement		 ////
    /////////////////////////////////////////////////////////////////

    if($_GET['end_type']=='6' && $_GET['calculate']=='1')
    {

      $id=$_GET['emp_id'];
      mysql_select_db($database_localhost, $localhost);
    $query_employees2ss4 = "SELECT (SUM(emp_portion_le)) AS EMP_P, (SUM(inv_emp_portion_le)) AS EMP_P_INV, (SUM(co_portion_le)) AS CO_P, (SUM(inv_co_portion_le)) AS CO_P_INV FROM cp_transaction, cp_installment_period WHERE cp_installment_period.cp_installment_period_id=cp_transaction.cp_installment_period_id AND employee_id='$id' AND cp_installment_period_closed='1'";
    $employees2ss4 = mysql_query($query_employees2ss4, $localhost) or die(mysql_error());
    $row_employees2ss4 = mysql_fetch_assoc($employees2ss4);
    $totalRows_employees2ss4 = mysql_num_rows($employees2ss4);


           $id=$_GET['emp_id'];
          mysql_select_db($database_localhost, $localhost);
        $query_employees2ss43 = "SELECT cp_basic_salary_total_last_july, total_excluded_increases_le, cp_mandatoryPeriodLe  FROM employee WHERE employee_id='$id'";
        $employees2ss43 = mysql_query($query_employees2ss43, $localhost) or die(mysql_error());
        $row_employees2ss43 = mysql_fetch_assoc($employees2ss43);


        mysql_select_db($database_localhost, $localhost);
        $query_employees2ss43a = "SELECT *  FROM cp_settings";
        $employees2ss43a = mysql_query($query_employees2ss43a, $localhost) or die(mysql_error());
        $row_employees2ss43a = mysql_fetch_assoc($employees2ss43a);


        $max_of_social_salary=$row_employees2ss43a['max_of_social_salary_le'];
        $last_july_salary=$row_employees2ss43['cp_basic_salary_total_last_july'];
        $total_excluded_increases=$row_employees2ss43['total_excluded_increases_le'];
        $mandatory_period_amount=$row_employees2ss43['cp_mandatoryPeriodLe'];



$date1 = new DateTime($row_employees2ss43a['days_count_from_date']);
$date2 = new DateTime($_GET['end_date']);
$count_days  = $date2->diff($date1)->format('%a');



        $agr_e7tesab_dof3a=  ($last_july_salary+($total_excluded_increases*$count_days/720));

        $personal_balance=$row_employees2ss4['EMP_P']+$row_employees2ss4['EMP_P_INV']+$row_employees2ss4['CO_P']+$row_employees2ss4['CO_P_INV'];



?>



<table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
  <thead>
    <tr>

      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vLastJulyBasicSalary; ?></th>
      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vExcludedSpInc; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vTotalDaysSinceLastJuly; ?></th>

        </tr>

  </thead>

    <tbody class="ui-sortable">

      <tr class="o_data_row" >

        <td class="o_data_cell"><?php
        echo number_format($last_july_salary, 2, '.', ',');
        ?></td>



        <td class="o_data_cell"><?php
  echo number_format($total_excluded_increases, 2, '.', ',');
       ?></td>

        <td class="o_data_cell"><?php
        echo $count_days; ?></td>

      </tr>


    </tbody>
    </table>




                                <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">

                                    <thead>
      <tr>

        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'أجر احتساب قيمة الدفعة'; ?></th>


          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'سداد قيمة المدة الحكمية'; ?></th>

          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'الأجر الاجمالي الشهري الفعلي'; ?></th>

          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'الأجر الاجمالي الشهري الحكمي'; ?></th>

          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'شريحة المعاش'; ?></th>

          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'مخصص الدفعات الدورية'; ?></th>

          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'الدفعة الشهرية الدورية'; ?></th>

          <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>

            <?php echo 'تسويات سابقة حتى'; ?></th>

                                        </tr>
                                    </thead>

  <tbody class="ui-sortable">

        <tr class="o_data_row" >

          <td class="o_data_cell"><?php
          echo number_format($agr_e7tesab_dof3a, 2, '.', ',');
          $agr_e7tesab_dof3a=$agr_e7tesab_dof3a;
          ?>
          </td>


             <td class="o_data_cell"><?php
          echo number_format($mandatory_period_amount, 2, '.', ',');
          $mandatory_period_amount=$mandatory_period_amount;
          ?>
          </td>




             <td class="o_data_cell"><?php
          echo number_format($last_july_salary, 2, '.', ',');
          $last_july_salary=$last_july_salary;
          ?>
          </td>

             <td class="o_data_cell"><?php
          echo number_format($agr_e7tesab_dof3a*4, 2, '.', ',');
          $alagr_el_shahry_el_hokmy=$agr_e7tesab_dof3a*4;
          ?>
          </td>

             <td class="o_data_cell"><?php
          echo number_format($alagr_el_shahry_el_hokmy-$max_of_social_salary, 2, '.', ',');
          $share7at_elm3ash=$alagr_el_shahry_el_hokmy-$max_of_social_salary;
          ?>



<?php
//// Check the payment rates according to the table included in the settings///

//// select all end type service ////
mysql_select_db($database_localhost, $localhost);
$query_employees32ee = "SELECT * FROM cp_monthly_payment_rate WHERE '$share7at_elm3ash'>=avg_slr_from AND '$share7at_elm3ash'< avg_slr_to_less_than ORDER BY cp_monthly_payment_rate_id";
$employees32ee = mysql_query($query_employees32ee, $localhost) or die(mysql_error());
$row_employees32ee = mysql_fetch_assoc($employees32ee);

do {

$el_dof3a_el_shahreya= $row_employees32ee['monthly_payment_le'];

} while ($row_employees32 = mysql_fetch_assoc($employees32));





 ?>

          </td>


          <td class="o_data_cell"><?php

  $mokasas_el_dof3at=($personal_balance+$mandatory_period_amount)*2;

          echo number_format($mokasas_el_dof3at, 2, '.', ',');
          $mokasas_el_dof3at=$mokasas_el_dof3at;
              ?>
       </td>

             <td class="o_data_cell"><?php
          echo number_format($el_dof3a_el_shahreya, 2, '.', ',');
          $vEmpoPortion=$el_dof3a_el_shahreya;
          ?>
          </td>

             <td class="o_data_cell"><?php
          echo number_format(0, 2, '.', ',');
          $tasweyat=0;
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
    //// case (7) : Death after retirement			 ////
    /////////////////////////////////////////////////////////////////

    if($_GET['end_type']=='7' && $_GET['calculate']=='1')
    {
?>

								<?php
        }
        ////
        ///////////////////////////////////////////////
        //// end 7 Death after retirement			 /////////////////////////
        //////////////////////////////////////////////


      /////?>



<?php
/////////////////////////////////////////////////////////////////
  //// case (8) : QUITING SYSTEM done with ahmed ramadan ////
  /////////////////////////////////////////////////////////////////

      if($_GET['end_type']=='8' && $_GET['calculate']=='1')
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
          echo number_format(0, 2, '.', ',');
          $vEmpoPortionInv='0';
          ?>
          </td>

          <td class="o_data_cell"><?php
          echo number_format(0, 2, '.', ',');
          $vCompPortion='0';
          ?>
          </td>

          <td class="o_data_cell"><?php
          echo number_format(0, 2, '.', ',');
          $vCompPortionInv='0';
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
      //// end 8 QUITING SYSTEM /////////////////////////
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


								<?php

    /////////////////////////////////////////////////////////////////
    //// case (10) : TERMINATION PUNITIVE REASON done with ahmed ramadan ////
    /////////////////////////////////////////////////////////////////

    if($_GET['end_type']=='10' && $_GET['calculate']=='1')
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
        echo number_format(0, 2, '.', ',');
        $vEmpoPortionInv='0';
        ?>
        </td>

        <td class="o_data_cell"><?php
        echo number_format(0, 2, '.', ',');
        $vCompPortion='0';
        ?>
        </td>

        <td class="o_data_cell"><?php
        echo number_format(0, 2, '.', ',');
        $vCompPortionInv='0';
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
    //// end 1 TERMINATION  /////////////////////////
    //////////////////////////////////////////////


	/////?>





</div>




					</section>
					<input type="hidden" name="MM_insert" value="employee_add">

					</form>

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
