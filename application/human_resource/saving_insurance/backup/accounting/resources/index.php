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


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {


$var_new2 = $_POST['vDate'];
$date_new2 = str_replace('/', '-', $var_new2);
//echo date('Y-m-d', strtotime($date));
$vDate2=date('Y-m-d', strtotime($date_new2));


  $insertSQL = sprintf("INSERT INTO cp_journal (cp_journal_id, cp_journal_code, cp_journal_date, cp_journal_desc) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_GET['t'], "int"),
					   GetSQLValueString($_POST['vCode'], "text"),
                       GetSQLValueString($vDate2, "date"),
					   GetSQLValueString($_POST['vDesc'], "text"));

$ffff=$_GET['t'];

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());
  
  echo '<script type="text/javascript">
           window.location = "'.$server.'application/human_resource/compl_pension/accounting/journal/add_transactions/?t='.$ffff.'"
      </script>';


}



mysqli_select_db($website,$database_website );
$query_saving_installment = "SELECT * FROM cp_journal ORDER BY cp_journal.cp_journal_code";
$saving_installment = $website->query($query_saving_installment);
$row_saving_installment = mysqli_fetch_assoc($saving_installment);



mysqli_select_db($website,$database_website );
$query_saving_installment5 = "SELECT * FROM cp_account";
$saving_installment5 = $website->query($query_saving_installment5);
$row_saving_installment5 = mysqli_fetch_assoc($saving_installment5);




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
						<h1>
							<a href="../journal">
								<span class="root"><?php echo $vAccounting; ?>
						
								</span> 
							</a> 
							
							<span class="slash"> / </span> 
							
							<span class=""><?php echo $vAdd; ?></span>
						
						</h1>
					
							<fieldset>
							
								
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
					
<div class="col-lg-8 col-md-offset-2 well bs-component" style="margin-top:0px">
          
          <h3 class="droidFontRegular"><i class="fa fa-book fa-1x"></i> <?php echo $vPrint.' '.$vCpUsesAndResources; ?></h3>
          
            <div class=" bs-component">
              <form target="_blank" action="../../../../../application/human_resource/compl_pension/reports/resources/" onSubmit="target_popup(this)" method="GET" name="form1" class="form-horizontal" id="form1" >
              <fieldset>
                  
                  
               
                
                  <input name="VID" type="hidden" value="<?php echo $_GET['t']; ?>">
                  
                
                  <input name="report" type="hidden" value="1">
                  
                  
                  <div class="form-group" >
                    
                    <div class="col-lg-12">
                    
                    <label for="inputEmail" class=" control-label"><B><?php echo   $vOn; ?> </B></label>
                    
                      <input <?php echo $form_text; ?> class="form-control masked form_texty" data-format="99/99/9999" data-placeholder="_" placeholder="dd/mm/yyyy" type="text" name="vFrom" id="date1"  value="<?php 
				//// convert inserted date to yyyy-mm-dd format ////
$todaydate = date('d/m/Y', strtotime(date("Y-m-d")));
////
				
				$dodo= $todaydate;  echo $dodo; ?>">
                      
                      
            </div>
                  </div>
                  
                  
                  
                  
               
                  
                  
                  
                 
                  
               
         
                  
                 <div class="form-group">
                    <div class="col-lg-12 ">
                      <button type="submit" class="btn btn-block btn-primary"><?php echo $vSubmit; ?></button> 
                    </div>
                  </div>
                     
                  
                </fieldset>
              <input type="hidden" name="MM_insert" value="form1">
              </form>
            </div>
          </div>					

		</section>
	</body>
</html>
<?php
mysql_free_result($saving_installment);
?>
