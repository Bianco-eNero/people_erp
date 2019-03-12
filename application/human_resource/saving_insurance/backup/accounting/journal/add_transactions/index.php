<?php require_once('../../../../../../Connections/localhost.php'); ?>
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
include('../../../../../../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../../../../../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../../../../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../../../../../assets/languages/english.php');
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


mysql_select_db($database_localhost, $localhost);
$query_saving_installmentq = "SELECT * FROM cp_account ORDER BY cp_account_e";
$saving_installmentq = mysql_query($query_saving_installmentq, $localhost) or die(mysql_error());
$row_saving_installmentq = mysql_fetch_assoc($saving_installmentq);
$totalRows_saving_installmentq = mysql_num_rows($saving_installmentq);


$sss=$_GET['t'];

mysql_select_db($database_localhost, $localhost);
$query_saving_installmentq2 = "SELECT * FROM cp_journal_transaction, cp_account WHERE cp_journal_transaction.cp_account_id=cp_account.cp_account_id AND cp_journal_id='$sss'";
$saving_installmentq2 = mysql_query($query_saving_installmentq2, $localhost) or die(mysql_error());
$row_saving_installmentq2 = mysql_fetch_assoc($saving_installmentq2);
$totalRows_saving_installmentq2 = mysql_num_rows($saving_installmentq2);


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

if(isset($_POST['vDb']) && $_POST['vDb']<>'')
{
$db=$_POST['vDb'];
}
else
{
$db=0;
}

if(isset($_POST['vCr']) && $_POST['vCr']<>'')
{
$cr=$_POST['vCr'];
}
else
{
$cr=0;
}

  $insertSQL = sprintf("INSERT INTO cp_journal_transaction (cp_account_id, cp_journal_id, cp_db, cp_cr) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['account'], "int"),
                       GetSQLValueString($_POST['jid'], "int"),
                       GetSQLValueString($db, "double"),
                       GetSQLValueString($cr, "double"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

$tttt=$_POST['jid'];

 echo '<script type="text/javascript">
           window.location = "'.$current_link.'t='.$tttt.'"
      </script>';
  
  

}



$ffttyy=$_GET['t'];

mysql_select_db($database_localhost, $localhost);
$query_saving_installment = "SELECT * FROM cp_journal WHERE cp_journal_id='$ffttyy'";
$saving_installment = mysql_query($query_saving_installment, $localhost) or die(mysql_error());
$row_saving_installment = mysql_fetch_assoc($saving_installment);
$totalRows_saving_installment = mysql_num_rows($saving_installment);


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../../../assets/header.php');
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
							include('../../../../../../assets/menus/header/compl_pension.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../../../../../assets/menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main">
				<section class="control">
					<section class="action">
						<h1>
							<a href="../../journal">
								<span class="root"><?php echo $vAccounting; ?>
						
								</span> 
							</a> 
							
							<span class="slash"> / </span> 
							
							<span class=""><?php echo $vAdd; ?></span>
						
						</h1>
					
							<fieldset>
							
								
								<a class="focus" href="../../../members/import_employees_data" style="text-decoration:none; display: none"><input type="submit" name="create" id="create" value="<?php echo $vImportEmployeesData; ?>" class="focus" /></a>
								
								<a class="focus" href="../../../members/update_salary_data" style="text-decoration:none; display: none"><input type="submit" name="create" id="create" value="<?php echo $vUpdateTheSalary; ?>" class="focus" /></a>
								
								
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
					
<div class="col-lg-8 col-md-offset-2 " style="margin-top:0px">
          
          <h3 class="droidFontRegular"><i class="fa fa-book fa-1x"></i> <?php echo $vAdd.' '.$vCpJournals; ?></h3>
          
            <div class=" bs-component">
              
              <fieldset>
                  
                  
               
                
                  
                  
                  
                  <div class="form-group" >
                    
                    <div class="col-lg-12">
                    
                    <label for="inputEmail" class=" control-label"><B><?php echo   $vDate; ?> </B></label>
                    
                      <input disabled <?php echo $form_text; ?> class="form-control masked form_texty" data-format="99/99/9999" data-placeholder="_" placeholder="dd/mm/yyyy" type="text" name="vDate" id="date1" value="<?php 
//// convert inserted date to yyyy-mm-dd format ////
$todaydate = date('d/m/Y', strtotime($row_saving_installment['cp_journal_date']));

//$todaydate=$row_acc_333['acc_journal_entry_date'];
////
$dodo= $todaydate;  echo $dodo; ?>">
                      
                      
            </div>
                  </div>
                  
                  
                  
                  
                <div class="form-group" >
                    
                    <div class="col-lg-12">
                    
                    <label for="inputEmail" class=" control-label "><B>#</B></label>
                    
                      <input disabled <?php echo $form_text; ?> class="form-control form_texty"   type="text" name="vCode" value="<?php echo $row_saving_installment['cp_journal_code']; ?>" >
                      
                      
            </div>
                </div>
                  
                  
                  
                <div class="form-group" >
                    
                    <div class="col-lg-12">
                    
                    <label for="inputEmail" class=" control-label "><B><?php echo $vDescription; ?></B></label>
                    
                      <input disabled <?php echo $form_text; ?> class="form-control form_texty"   type="text" name="vDesc"value="<?php echo $row_saving_installment['cp_journal_desc']; ?>" >
                      
                      <br><br>
            </div>
                </div>
                
                
                  <table  <?php echo $table_style; ?> class="table table-condensed table-striped table-bordered table-hover " id="employees">
               
               <?php
				if(isset($row_saving_installmentq2['cp_journal_transaction_id']))
			{
			?>
            
                <thead>
                  <tr style="background-color:#eeeeee">
                    <td width="245"><?php echo $vAccountName; ?></td>
                    <td width="100"><?php echo $vDebit; ?></td>
                    <td width="100"><?php echo $vCredit; ?></td>
                   
                    <td width="120"> </td>
                  </tr>
                </thead>
                <?php
				}
				?>
                <tbody>
               
                  <?php 
				  $db_total=0;
				   $cr_total=0;
				  do { 
				  
			if(isset($row_saving_installmentq2['cp_journal_transaction_id']))
			{
				  ?>
                  <tr>
                    <td><?php 
					if($_SESSION['language']=='EN')
					{
					echo $row_saving_installmentq2['cp_account_e']; 
					}
					if($_SESSION['language']=='AR')
					{
					echo $row_saving_installmentq2['cp_account_a']; 
					}
					?></td>
                    <td width="100"><?php 
					if($row_saving_installmentq2['cp_db']>'0')
					{
					$db_total=$db_total+$row_saving_installmentq2['cp_db'];
					echo number_format($row_saving_installmentq2['cp_db'], 2, '.', ','); 
					}
					?></td>
                    <td width="100"><?php 
					if($row_saving_installmentq2['cp_cr']>'0')
					{
					$cr_total=$cr_total+$row_saving_installmentq2['cp_cr'];
					echo number_format($row_saving_installmentq2['cp_cr'], 2, '.', ',');
					}
					 ?></td>
                    <td width="120">
                     <a onClick="return popup700(this, 'notes')" class="btn btn-primary btn-xs"  href="edit/?s=<?php echo $row_saving_installment['cp_deposit_id']; ?>"><i class="fa fa-edit"></i> <?php echo $vEdit; ?></a>                    
                     
                     
                      <a  class="btn btn-success btn-xs"  href="edit/?s=<?php echo $row_saving_installment['cp_deposit_id']; ?>"><i class="fa fa-eye"></i> <?php echo $vView; ?></a>                     </td>
                  </tr>
                    <?php
					}
					$counter++;
					 } while ($row_saving_installmentq2 = mysql_fetch_assoc($saving_installmentq2)); ?>
                <?php
				
				?>
                </tbody>
                <br><br>
                <?php
				if(isset($db_total) || isset($cr_total))
			{
			?>
				
                <tfoot>
                <tr style="background-color:#eeeeee">
                    <td width="245"><?php echo $vTotal; ?></td>
                    <td width="100"><?php  echo number_format($db_total, 2, '.', ','); ?></td>
                    <td width="100"><?php  echo number_format($cr_total, 2, '.', ','); ?></td>
                   
                    <td width="120"> </td>
                  </tr>
                  </tfoot>
                  <?php
				  }
				  ?>
                  
              </table>
                  
               
         <form action="index.php" method="POST" name="form11" class="form-horizontal  bs-component" id="form1" >
<div class="form-group ">
                    
                    
            
            <table width="100%" border="0" dir="<?php if($_SESSION['language']=='AR') { ?>rtl<?php } else { ?>ltr<?php } ?>">
  <tr>
    <td width="120">
      
    <div class="col-lg-12">
                    
                    <label for="inputEmail" class=" control-label"><B><?php echo   $vDebit; ?> </B></label>
                    
                      <input <?php echo $form_text; ?> class="form-control form_texty"   type="text" name="vDb" >
                      
                      
            </div>
     
            
            </td>
            
            <td  width="120">
            
  
            
            <div class="col-lg-12">
                    
                    <label for="inputEmail" class=" control-label"><B><?php echo   $vCredit; ?> </B></label>
                    
                       <input <?php echo $form_text; ?> class="form-control form_texty"   type="text" name="vCr" >
                      
                      
            </div>
            
            
    </td>
    
    <td>
    
    <div class="col-lg-12">
                    <label for="inputEmail" class=" control-label"><B><?php echo $vAccountName; ?></B></label>
<select <?php echo $form_text; ?>  class="form-control" name="account">
  <option value="" ></option>
  <?php
do {  
?>
  <option value="<?php echo $row_saving_installmentq['cp_account_id']?>"><?php 
  if($_SESSION['language']=='EN')
  {
  echo $row_saving_installmentq['cp_account_e'];
  }
  
  if($_SESSION['language']=='AR')
  {
  echo $row_saving_installmentq['cp_account_a'];
  }
  
  ?></option>
  <?php
} while ($row_saving_installmentq = mysql_fetch_assoc($saving_installmentq));
  $rows = mysql_num_rows($saving_installmentq);
  if($rows > 0) {
      mysql_data_seek($saving_installmentq, 0);
	  $row_saving_installmentq = mysql_fetch_assoc($saving_installmentq);
  }
?>
                        
             
              </select>
 </div>
    
    </td>
    
    <td width="90">
     <div class="col-lg-12 ">
                     <label for="inputEmail" class=" control-label"><B><br/> </B></label>
                      <button name="add" type="submit" class="btn btn-block btn-primary"><?php echo $vAdd; ?></button> 
                    </div>
                  
                  
    </td>
  </tr>
</table>
           
            
            
            
            
           <br><br>
                    
                    
                   
                  
                 <input type="hidden" name="jid" value="<?php echo $_GET['t'];?>">  
                 
                 <input type="hidden" name="MM_insert" value="form1">
                 
              </form>   
                  
                  <?php
				  if($db_total==$cr_total)
				  {
				  ?>
                 <a href="../add/?t=<?php echo time(); ?>">
         <div class="form-group">
                    <div class="col-lg-12 ">
                      <button type="button" class="btn btn-block btn-primary"><?php echo $vAddAnotherJournal; ?></button> 
                   </div>
                </div>
                    </a>
                    
                    <?php
					}
					?> 
                  
                </fieldset>
            
            </div>
          </div>					

		</section>
	</body>
</html>
<?php
mysql_free_result($saving_installment);
?>
