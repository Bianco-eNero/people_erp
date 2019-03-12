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

//// End of include the settings table ///


$fds=$_GET['account'];


$varfrom = $_GET['vFrom'];
$datefrom = str_replace('/', '-', $varfrom);
//echo date('Y-m-d', strtotime($date));
$from=date('Y-m-d', strtotime($datefrom));


$varto = $_GET['vTo'];
$dateto = str_replace('/', '-', $varto);
//echo date('Y-m-d', strtotime($date));
$to=date('Y-m-d', strtotime($dateto));



mysqli_select_db($website,$database_website );
$query_employee = "SELECT * FROM sp_account WHERE sp_account_id='$fds'";
$employee = $website->query($query_employee);
$row_employee = mysqli_fetch_assoc($employee);



mysqli_select_db($website,$database_website );
$query_employee3 = "SELECT * FROM sp_account";
$employee3 = $website->query($query_employee3);
$row_employee3 = mysqli_fetch_assoc($employee3);




  $toto_cr='0';
	  
	  $toto_db='0';
	  
	  //// balance
	  $galal = '0';
	  	  

	  //// balances ////
	  
	  $ahmedhany='0';



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
ميزان المراجعة
 <h5 class="text-center"><?php 
 if($_SESSION['language']=='EN')
 {
 echo $row_employee['sp_account_e'];
 }
 if($_SESSION['language']=='AR')
 {
 echo $row_employee['sp_account_a'];
 }
 ?> <br />
 
( <?php echo $vOn; ?> : <?php echo $_GET['vFrom'];?>) </h5>
	</div>

<div <?php if($_SESSION['language']=='AR') { ?> style="rtl" <?php } ?>>

	<table  width="980%" border="1" align="center" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-hover " id="employees" <?php echo $table_style; ?> >
<thead>
                  <tr>
                    <td width="500" bgcolor="#f2f2f2"><?php echo $vDescription; ?></td>
                    <td width="100" bgcolor="#f2f2f2"><?php echo $vDebit; ?></td>
                    <td width="100" bgcolor="#f2f2f2"><?php echo $vCredit; ?></td>
    </tr>
                </thead>
                <tbody>
                <?php
				
				?>
                  
                  <?php do { 
				
				$fdsf=$row_employee3['sp_account_id'];
				
				
	
mysqli_select_db($website,$database_website );
$query_employee34 = "SELECT *, SUM(sp_journal_transaction.sp_db) AS db_total, SUM(sp_journal_transaction.sp_cr) AS cr_total, if((SUM(sp_journal_transaction.sp_db)>SUM(sp_journal_transaction.sp_cr)),(SUM(sp_journal_transaction.sp_db)-SUM(sp_journal_transaction.sp_cr)),0) AS db_diff, if((SUM(sp_journal_transaction.sp_cr)>SUM(sp_journal_transaction.sp_db)),(SUM(sp_journal_transaction.sp_cr)-SUM(sp_journal_transaction.sp_db)),0) AS cr_diff FROM sp_journal_transaction, sp_journal WHERE sp_journal.sp_journal_id=sp_journal_transaction.sp_journal_id AND  sp_journal_transaction.sp_account_id='$fdsf' AND sp_journal.sp_journal_date<='$from' GROUP BY sp_journal_transaction.sp_account_id";
$employee34 = $website->query($query_employee34);
$row_employee34 = mysqli_fetch_assoc($employee34);

	
				  ?>
                  
                  <tr>
                    <td><?php 
					if($_SESSION['language']=='EN')
					{
					echo $row_employee3['sp_account_e'];
					}
					if($_SESSION['language']=='AR')
					{
					echo $row_employee3['sp_account_a'];
					}
					?></td>
                    <td>
					
					<?php echo number_format($row_employee34['db_diff'], 2, '.', ',');
					$toto_db=$toto_db+$row_employee34['db_diff'];
					?></td>
                    <td><?php echo number_format($row_employee34['cr_diff'], 2, '.', ',');
					
					 
					$toto_cr=$toto_cr+$row_employee34['cr_diff'];
					?></td>
                  </tr>
                  <?php } while ($row_employee3 = mysqli_fetch_assoc($employee3)); ?>
                  <tr style="background-color:
                  #D5D5D5">
                    <td><?php echo $vTotalTransactions; ?></td>
                    <td>
					
					<?php 
		//echo $toto_db; 
		/// preview decimal format ////
		echo number_format($toto_db, 2, '.', ',');
		
		////
		?>					</td>
                    <td><?php 
		//echo $toto_db; 
		/// preview decimal format ////
		echo number_format($toto_cr, 2, '.', ',');
		
		////
		?></td>
                  </tr>
                  
                  
                  <tr style="background-color:
                  #D5D5D5">
                    <td><?php echo $vTransactionsBalance; ?></td>
                    <td>
					
					<?php 
		//echo $toto_db; 
		/// preview decimal format ////
		if($toto_db>$toto_cr)
		{
		echo number_format($toto_db-$toto_cr, 2, '.', ',');
	
		}
		else
		{
		echo '';
		}
		
		////
		?>					</td>
                    <td><?php 
		//echo $toto_db; 
		/// preview decimal format ////
		if($toto_cr>$toto_db)
		{
		echo number_format($toto_cr-$toto_db, 2, '.', ',');
	
		}
		else
		{
		echo '';
		}
		
		////
		?></td>
                  </tr>
                  
                  
                  
                  <tr style="background-color:
                  #D5D5D5">
                    <td><?php echo $vEndBalance; ?></td>
                    <td>
					
					<?php 
		//echo $toto_db; 
		/// preview decimal format ////
		if($toto_db>$toto_cr)
		{
		echo number_format($toto_db-$toto_cr, 2, '.', ',');
	
		}
		else
		{
		echo '';
		}
		
		////
		?>					</td>
                    <td><?php 
		//echo $toto_db; 
		/// preview decimal format ////
		if($toto_cr>$toto_db)
		{
		echo number_format($toto_cr-$toto_db, 2, '.', ',');
	
		}
		else
		{
		echo '';
		}
		
		////
		?></td>
                  </tr>
                    
                <?php
				
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
