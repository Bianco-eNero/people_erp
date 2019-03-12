<?php
//// include config script ////
include('../../../../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../../../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../../../assets/languages/english.php');
}
//// End Language ////

$use_bootstrap='1';


///// Include news records ////
$search=$_GET['search'];

mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT * FROM cp_installment_period WHERE cp_installment_period_desc LIKE '%$search%' ORDER BY cp_installment_period_id DESC";
$Recordset1 = mysqli_query($website ,$query_Recordset1) or die(mysqli_error($Recordset1));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
//// End of include the settings table ///

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../assets/header.php');
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
							include('../../../../assets/menus/header/saving_insurance.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../../../assets/menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vSavingInstallments; ?></h1>
						<form method="post" action="create" >
							<fieldset>
								
								
								
							</fieldset>
						</form>
					</section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>
					
<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
						<fieldset class="search">
                        <form target="_self" method="get">
							<input class="arabic" value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>" name="search" type="text" id="search" placeholder="<?php echo $vSearch ; ?>..." />
						</form>
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

<div class="table-responsive">
	<section class="employee-create" style="width: 40%;">

  <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm">
    <thead>
      <tr>
        <th width="1" class="o_list_record_selector" style="padding:2px">
          <div class="custom-control custom-checkbox">
            </label>
          </div>
        </th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vDescription; ?></th>
        <th class="o_column_sortable"><?php echo $vStatus; ?></th>
				<th class="o_column_sortable"></th>
      </tr>

		</thead>

			<tbody class="ui-sortable">

        <?php do { ?>
        <tr class="o_data_row">
          <td width="1" class="o_list_record_selector" style="padding:2px">
            <div class="custom-control custom-checkbox">


            </div>
          </td>
          <td class="o_data_cell"><?php echo $row_Recordset1['cp_installment_period_desc']; ?></td>
          <td class="o_data_cell" style="color: white; <?php
				 if($row_Recordset1['cp_installment_period_closed']=='1') { ?>background-color: red<?php } else { ?>background-color: green<?php } ?>">
			<?php
				 if($row_Recordset1['cp_installment_period_closed']=='1') { echo $vClosedPeriod ; } else { echo $vOpenPeriod;  }
				  
				  ?>
			</td>
					<td class="o_data_cell"><form name="form" id="form">

						<a href="view/?id=<?php echo $row_Recordset1['cp_installment_period_id']; ?>&closed=<?php echo $row_Recordset1['cp_installment_period_closed']; ?>">
														 <i class="fas fa-eye" title="<?php echo $vPersonalAccountDetailed; ?>"></i>
													 </a>



                    </form>
					</td>
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
