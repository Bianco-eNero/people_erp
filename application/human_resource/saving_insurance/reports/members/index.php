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

mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT * FROM employee WHERE (sp_member_type_id=2 || sp_member_type_id=6) AND organization='$organization' AND (sp_transaction.emp_portion_le+sp_transaction.inv_emp_portion_le+sp_transaction.co_portion_le+sp_transaction.inv_co_portion_le+sp_transaction.inv_total_le)>0";
$Recordset1 = mysqli_query($website ,$query_Recordset1) or die(mysqli_error($Recordset1));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
//// End of include the settings table ///

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
    <img src="../../../../../assets/images/logos/khalda.jpeg" width="100" height="94" alt=""/>

    <br><span style="font-size:12px">
    نظام المعاش التكميلي للعاملين بشركة خالدة للبترول
</span>

      <br>

		  تقرير الأعضاء بالنظام
		</p>
	</div>

<div <?php if($_SESSION['language']=='AR') { ?> style="rtl" <?php } ?>>

	<table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed"   style="font-size:10px <?php if($_SESSION['language']=='AR') { ?>; direction:rtl <?php } ?>">
  <thead>
      <tr>
        <th width="1" class="o_list_record_selector">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" id="checkbox-86" class="custom-control-input">
            <label for="checkbox-86" class="custom-control-label">​
            </label>
          </div>
        </th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCompanyCode; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vMemberNumber; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vPayroll; ?></th>
					<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vName; ?></th>
						<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vDateOfBirth; ?></th>
							<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vBasicSalary; ?></th>
								<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vExcludedSpInc; ?></th>
									<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vProductionIncentive; ?></th>
										<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo ''; ?></th>
											<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo ''; ?></th>
      </tr>

		</thead>

			<tbody class="ui-sortable">

        <?php do { ?>
        <tr class="o_data_row" >
          <td width="1" class="o_list_record_selector" style="padding:2px">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" id="checkbox-87" class="custom-control-input">
              <label for="checkbox-87" class="custom-control-label">​</label>
            </div>
          </td>
          <td class="o_data_cell"><?php echo $row_Recordset1['sp_company_code']; ?></td>
          <td class="o_data_cell"><?php echo $row_Recordset1['sp_number']; ?></td>
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
          <td class="o_data_cell"><?php echo $row_Recordset1['birth_date']; ?></td>
          <td class="o_data_cell"><?php echo $row_Recordset1['sp_basic_salary_total_last_july']; ?></td>
					<td class="o_data_cell"><?php echo $row_Recordset1['total_excluded_increases_le']; ?></td>
					<td class="o_data_cell"><?php echo $row_Recordset1['current_production_inc_le']; ?></td>

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
</html>
