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


///// Include news records ////
$search=$_GET['search'];
$id=$_GET['id'];


mysqli_select_db($website,$database_website );
$query_Recordset2 = "SELECT * FROM cp_installment_period WHERE cp_installment_period_id='$id'";
$Recordset2 = $website->query($query_Recordset2);
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);


mysqli_select_db($website,$database_website );
$query_Recordset3 = "SELECT * FROM cp_installment_period ORDER BY cp_installment_period_id";
$Recordset3 = $website->query($query_Recordset3);
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);




mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT * FROM employee, cp_transaction WHERE cp_transaction.employee_id=employee.employee_id AND cp_transaction.cp_installment_period_id='$id' AND employee.employee_id LIKE '%$search%' AND (cp_transaction.emp_portion_le+cp_transaction.inv_emp_portion_le+cp_transaction.co_portion_le+cp_transaction.inv_co_portion_le+cp_transaction.inv_total_le)>0";
$Recordset1 = $website->query($query_Recordset1);
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);


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
        <style type="text/css">
<!--
.style1 {font-size: 24px}
-->
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

<br><span style="font-size:12px">
الشئون الطبية
</span>
<br>


سجل المرضى
    </p>
	  <p class="style1 arabic" style="text-align: center;">
	  <span style="font-size:12px">

	    <!--2018-01-01 - 2018-06-30-->
	    </span>    <span style="font-size:12px">

  <?php echo $row_Recordset2['cp_installment_period_desc']; ?>

  </span>

    </p>
	</div>




<div <?php if($_SESSION['language']=='AR') { ?> style="rtl" <?php } ?>>
<table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm" style="font-size:10px">
  <thead>
    <tr>

      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vName; ?></th>
      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vNumber; ?></th>
      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vJob; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vAdministration; ?></th>
        	 <?php if($row_Recordset1['cp_installment_period_id']>'33') { ?>
            <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo ""; ?></th>
              <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vExcludedSpInc; ?></th>
                <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vProductionIncentive; ?></th>
                  <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vMembershipSalary; ?></th>
                  <?php } ?>
                    <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vMedicalHistory; ?></th>
                      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vDateOfBirth; ?></th>
                    <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vHireDate; ?></th>
                      <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vSocialStatus; ?></th>
                        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vAddress; ?></th>
			     <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vHomePhone; ?></th>



                  <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo ''; ?></th>
    </tr>

  </thead>

    <tbody class="ui-sortable">

      <?php do { ?>
      <tr class="o_data_row">

        <td class="o_data_cell"><?php echo $row_Recordset1['cp_company_code']; ?></td>
        <td class="o_data_cell"><?php echo $row_Recordset1['cp_number']; ?></td>
        <td class="o_data_cell"><?php echo $row_Recordset1['employee_id']; ?></td>
        <td class="o_data_cell"><?php
          if($_SESSION['language']=='AR')
           {
             echo $row_Recordset1['name_arabic'];
            }
            if($_SESSION['language']=='EN')
             {
               echo $row_Recordset1['name_english'];
              }
             ?></td>
             	 <?php if($row_Recordset1['cp_installment_period_id']>'33') { ?>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['cp_basic_salary_total_last_july'], 2, '.', ','); ?></td>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['total_excluded_increases_le'], 2, '.', ','); ?></td>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['current_production_inc_le'], 2, '.', ','); ?></td>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['cp_calculation_salary'], 2, '.', ','); ?></td>
        <?php } ?>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['start_banace_le'], 2, '.', ','); ?></td>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['emp_portion_le'], 2, '.', ','); ?></td>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['inv_emp_portion_le'], 2, '.', ','); ?></td>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['co_portion_le'], 2, '.', ','); ?></td>
        <td class="o_data_cell"><?php echo number_format($row_Recordset1['inv_co_portion_le'], 2, '.', ','); ?></td>




        <td class="o_data_cell"></td>
        <td class="o_data_cell"></td>
      </tr>


          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>


    </tbody>
    </table>
  </div>
  </div>

      </section>
    </main>
  </section>
</body>

    </div>
    </div>

			  </section>
			</main>
		</section>
	</body>
</html>
