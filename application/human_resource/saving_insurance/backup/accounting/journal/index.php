<?php require_once('../../../../../Connections/localhost.php'); ?>
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



mysql_select_db($database_localhost, $localhost);
$query_saving_installment = "SELECT * FROM cp_journal ORDER BY cp_journal.cp_journal_code ";
$saving_installment = mysql_query($query_saving_installment, $localhost) or die(mysql_error());
$row_saving_installment = mysql_fetch_assoc($saving_installment);
$totalRows_saving_installment = mysql_num_rows($saving_installment);
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
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" >
						<h1 style="height:100%"><?php echo $vSavingInsurance; ?></h1>
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
			<main class="main">
				<section class="control">
					<section class="action">
						<h1><span class="root"><?php echo $vAccounting; ?></span></h1>
					
							<fieldset>
								<a class="focus" href="add/?t=<?php echo time(); ?>" style="text-decoration:none;"><input type="submit" name="create" id="create" value="<?php echo $vAdd; ?>" class="focus" /></a>
								
								<a class="focus" href="../../members/import_employees_data" style="text-decoration:none; display: none"><input type="submit" name="create" id="create" value="<?php echo $vImportEmployeesData; ?>" class="focus" /></a>
								
								<a class="focus" href="../../members/update_salary_data" style="text-decoration:none; display: none"><input type="submit" name="create" id="create" value="<?php echo $vUpdateTheSalary; ?>" class="focus" /></a>
								
								
							</fieldset>
						
					</section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>
					
<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
						<fieldset class="search">
                        <form target="_self" method="get">
							<input autofocus="autofocus" onfocus="this.select()" value="<?php if(isset($_GET['search'])) { echo $_GET['search']; }?>" class="arabic" name="search" type="text" id="search" placeholder="<?php echo $vSearch ; ?>..." />
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
							 <span class="print">
								<a href="<?php echo $server; ?>application/human_resource/compl_pension/reports/members/?report=1" target="_blank" >
								 <button class="" id=""><i class="fas fa-print"></i></button>
							 </a>
							 </span>
						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body" style="height:100%">
<section class="employee-create">
<div class="table-responsive">
	
	<table <?php echo $table_style; ?> class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed" id="employees">
                <thead>
                  <tr style="background-color:#eeeeee">
                    <td width="100">#</td>
                    <td width="100"><?php echo $vDate; ?></td>
                    <td width="243"><?php echo $vDescription; ?></td>
                    <td width="90"><?php echo $vDebit; ?></td>
                    <td width="90"><?php echo $vCredit; ?></td>
                    <td width="95"> </td>
                  </tr>
                </thead>
        <tbody>
                <?php
				
				?>
                  <?php 
				  $counter=1;
				  do { 
				  
				  $derw=$row_saving_installment['cp_journal_id'];
					  
					  
					  
mysqli_select_db($website,$database_website );
$query_saving_installmentw = "SELECT SUM(cp_journal_transaction.cp_db) AS DEB, SUM(cp_journal_transaction.cp_cr) AS CRE FROM cp_journal_transaction GROUP BY cp_journal_transaction.cp_journal_id";
$saving_installmentw = $website->query($query_saving_installmentw);
$row_saving_installmentw = mysqli_fetch_assoc($saving_installmentw);

					
				  
			if(isset($row_saving_installment['cp_journal_id']))
			{
				  ?>
          <tr>
            <td width="100"><?php echo $row_saving_installment['cp_journal_code']; ?></td>
                    <td width="100"><?php echo $row_saving_installment['cp_journal_date']; ?></td>
                    <td><?php echo $row_saving_installment['cp_journal_desc']; ?></td>
                    <td width="90"><?php echo $row_saving_installmentw['DEB']; ?></td>
                    <td width="90"><?php echo $row_saving_installmentw['CRE']; ?></td>
                    <td>
						
                     <a style="display: none" onClick="return popup700(this, 'notes')" class="btn btn-primary btn-xs"  href="../../deposits/edit/?s=<?php echo $row_saving_installment['cp_deposit_id']; ?>"><i class="fa fa-edit"></i> <?php echo $vEdit; ?></a>                    
                     
                     
                      <a style="display: none"  class="btn btn-success btn-xs"  href="../../deposits/edit/?s=<?php echo $row_saving_installment['cp_deposit_id']; ?>"><i class="fa fa-eye"></i> <?php echo $vView; ?></a>                     </td>
          </tr>
                    <?php
					}
					$counter++;
					 } while ($row_saving_installment = mysql_fetch_assoc($saving_installment)); ?>
                <?php
				
				?>
                </tbody>
              </table>
</div>

				</section>
		</section>
	</body>
</html>
<?php
mysql_free_result($saving_installment);
?>
