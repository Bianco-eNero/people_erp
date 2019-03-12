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

$_SESSION['current_period']=$_GET['id'];

mysqli_select_db($website,$database_website );
$query_Recordset2 = "SELECT * FROM sp_installment_period WHERE sp_installment_period_id='$id'";
$Recordset2 = $website->query($query_Recordset2);
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);


mysqli_select_db($website,$database_website );
$query_Recordset3 = "SELECT * FROM sp_installment_period ORDER BY sp_installment_period_id";
$Recordset3 = $website->query($query_Recordset3);
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);




mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT * FROM employee, sp_transaction WHERE sp_transaction.employee_id=employee.employee_id AND sp_transaction.sp_installment_period_id='$id' AND employee.employee_id LIKE '%$search%' AND (sp_transaction.emp_portion_le+sp_transaction.inv_emp_portion_le+sp_transaction.co_portion_le+sp_transaction.inv_co_portion_le+sp_transaction.inv_total_le)>0";
$Recordset1 = $website->query($query_Recordset1);
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
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/">
						<figure style="height:100%">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/saving_insurance/" >
						<h1 style="height:100%"><?php echo $vSavingInsurance; ?></h1>
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
						<h1><?php echo $vSavingInstallments; ?> (<?php echo $row_Recordset2['sp_installment_period_desc']; ?>)</h1>
						
							<fieldset>
								
								<a class="focus" href="../import_saving_installment_data/" style="text-decoration:none;"><input type="submit" name="create" id="create" value="<?php echo $vImportData; ?>" class="focus" /></a>
								
							</fieldset>
						
					</section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>
					
<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
						<form target="_self" method="get">
						
							<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
							
						<fieldset class="search">
                        

													<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

							<input value="<?php echo $_GET['search']; ?>" class="arabic" name="search" type="text" id="search" placeholder="<?php echo $vSearch ; ?>..." />
						
						</fieldset>
						<fieldset class="refine" <?php if($_SESSION['language']=='AR') { ?>style="margin-left:0px <?php } ?> ">


						  <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu2('parent',this,0)">
	                        <option value="index.php"><i class="fas fa-filter"></i> <?php echo $vSelectPeriod; ?></option>

													<?php do { ?>
													<option value="?id=<?php echo $row_Recordset3['sp_installment_period_id']; ?>"><?php echo $row_Recordset3['sp_installment_period_desc']; ?></option>

    <?php } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3)); ?>

	                      </select>
							
							<?php // if ($row_Recordset2['sp_installment_period_closed']<>'1') { ?>
							&nbsp
							&nbsp
							
							<b><?php echo $vInvReturn; ?></b>
								<input style="width: 50px" value="<?php if($row_Recordset2['percentage_calculated']>'0') { echo $row_Recordset2['percentage_calculated']; } ?>" class="arabic" name="percentage" type="text" id="search" placeholder="<?php echo $vPercentage ; ?>" />
							
							<input type="submit" name="apply_percentage"  class="btn" value="<?php echo $vApply ; ?>">
								
							<?php // } ?>



						</fieldset>
							
							</form>
						
						
						<fieldset class="view">
							
							 <span class="layout">
								 <button class="active" id="thumbnails-large"><i class="fas fa-th-large"></i></button><button id="list"><i class="fas fa-list-ul"></i></button><button id="thumbnails"><i class="fas fa-th"></i></button>
							 </span>

							 <span class="print">
								<a href="<?php echo $server; ?>application/human_resource/saving_insurance/reports/saving_installment/?report=1&id=<?php echo $row_Recordset2['sp_installment_period_id']; ?>" target="_blank" >
								 <button class="" id=""><i class="fas fa-print"></i></button>
							 </a>
							 </span>


						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body" style="height:100%">

<div class="table-responsive">

	<section class="employee-create">

  <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm">
    <thead>
      <tr>

        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCompanyCode; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vMemberNumber; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vPayroll; ?></th>
					<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vName; ?></th>
							 <?php if($row_Recordset1['sp_installment_period_id']>'33') { ?>
							<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vBasicSalary; ?></th>
								<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vExcludedSpInc; ?></th>
									<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vProductionIncentive; ?></th>
										<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vMembershipSalary; ?></th>
										<?php } ?>
											<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vStartBalanceLe; ?></th>
												<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vEmployeePortion; ?></th>
											<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCumulatedInvReturs; ?></th>
												<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCoPortion; ?></th>
													<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCumulatedInvReturs; ?></th>
														<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vClosingBalance; ?></th>
															<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vEgpcPortion; ?></th>


										<th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo ''; ?></th>
				<th class="o_column_sortable"></th>
      </tr>

		</thead>

			<tbody class="ui-sortable">
				
				<?php
				
					
?>
        <?php do { 
				
				
	
				?>
        <tr class="o_data_row">

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
							 <?php if($row_Recordset1['sp_installment_period_id']>'33') { ?>
          <td class="o_data_cell"><?php echo number_format($row_Recordset1['sp_basic_salary_total_last_july'], 2, '.', ','); ?></td>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['total_excluded_increases_le'], 2, '.', ','); ?></td>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['current_production_inc_le'], 2, '.', ','); ?></td>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['sp_calculation_salary'], 2, '.', ','); ?></td>
				<?php } ?>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['start_banace_le'], 2, '.', ','); ?></td>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['emp_portion_le'], 2, '.', ','); ?></td>
					<td class="o_data_cell">
						
						
						
						<?php echo number_format($row_Recordset1['inv_emp_portion_le'], 2, '.', ','); ?>
			
			</td>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['co_portion_le'], 2, '.', ','); ?></td>
					<td class="o_data_cell">
						
						<?php echo number_format($row_Recordset1['inv_co_portion_le'], 2, '.', ','); ?>
			
			</td>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['start_banace_le']+$row_Recordset1['emp_portion_le']+$row_Recordset1['inv_emp_portion_le']+$row_Recordset1['co_portion_le']+$row_Recordset1['inv_co_portion_le'], 2, '.', ','); ?></td>
					<td class="o_data_cell"><?php echo number_format($row_Recordset1['egpc_portion_le'], 2, '.', ','); ?></td>




					<td class="o_data_cell"></td>
					<td class="o_data_cell"></td>
        </tr>
				
<?php
	//// Closing procedures/ /////
	
	$closing_balance=$row_Recordset1['start_banace_le']+$row_Recordset1['emp_portion_le']+$row_Recordset1['inv_emp_portion_le']+$row_Recordset1['co_portion_le']+$row_Recordset1['inv_co_portion_le'];
	
	
				
?>
            <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); 
				
				
				
				
				
				?>


      </tbody>
      </table>
		</div>
    </div>

				</section>
			</main>
		</section>
	</body>
</html>

<?php
    if(isset($_GET['reset_inv'])) { 
    echo '<script type="text/javascript">
window.location = "'.$server.'application/human_resource/saving_insurance/saving_installments/"
      </script>';
		
	}

?>

<?php mysqli_close($website); ?>
