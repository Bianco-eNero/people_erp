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
$query_employee = "SELECT * FROM cp_account WHERE cp_account_id='$fds'";
$employee = $website->query($query_employee);
$row_employee = mysqli_fetch_assoc($employee);




mysqli_select_db($website,$database_website );
$query_employee3 = "SELECT * FROM cp_account";
$employee3 = $website->query($query_employee3);
$row_employee3 = mysqli_fetch_assoc($employee3);


  $toto_cr='0';
	  
	  $toto_db='0';
	  
	  //// balance
	  $galal = '0';
	  	  

	  //// balances ////
	  
	  $ahmedhany='0';


$resources='0';
$utilizations='0';


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
      الميزانية
<h5 class="text-center">( <?php echo $vOn; ?> : <?php echo $_GET['vFrom'];?>) </h5>
</h5>
	</div>

<div <?php if($_SESSION['language']=='AR') { ?> style="rtl" <?php } ?>>

	<table  width="980%" border="1" align="center" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-hover " id="employees" <?php echo $table_style; ?> >
<thead>
                  <tr>
                    <td colspan="2" align="center" bgcolor="#f2f2f2"><?php echo $vCpUtilizations; ?></td>
                    <td colspan="2" align="center" bgcolor="#f2f2f2"><?php echo $vCpResources; ?></td>
    </tr>
    
    <tr>
                    <td width="500" bgcolor="#f2f2f2"><?php echo $vDescription; ?></td>
                    <td width="100" bgcolor="#f2f2f2"><?php echo $vCpBalance; ?></td>
                    <td width="500" bgcolor="#f2f2f2"><?php echo $vDescription; ?></td>
                    <td width="100" bgcolor="#f2f2f2"><?php echo $vCpBalance; ?></td>
    </tr>
                </thead>
                <tbody>
                <?php
				
				?>
                  
                  <?php 
				
				$fdsf=$row_employee3['cp_account_id'];
				
					
					
mysqli_select_db($website,$database_website );
$query_employee34 = "SELECT *, SUM(cp_journal_transaction.cp_db) AS db_total, SUM(cp_journal_transaction.cp_cr) AS cr_total, if((SUM(cp_journal_transaction.cp_db)>SUM(cp_journal_transaction.cp_cr)),(SUM(cp_journal_transaction.cp_db)-SUM(cp_journal_transaction.cp_cr)),0) AS db_diff, if((SUM(cp_journal_transaction.cp_cr)>SUM(cp_journal_transaction.cp_db)),(SUM(cp_journal_transaction.cp_cr)-SUM(cp_journal_transaction.cp_db)),0) AS cr_diff FROM cp_journal_transaction, cp_journal WHERE cp_journal.cp_journal_id=cp_journal_transaction.cp_journal_id AND  cp_journal_transaction.cp_account_id='2' AND cp_journal.cp_journal_date<='$from' GROUP BY cp_journal_transaction.cp_account_id";
$employee34 = $website->query($query_employee34);
$row_employee34 = mysqli_fetch_assoc($employee34);

					
	
$totalRows_employee34 = mysqli_num_rows($employee34);


/// Resources ////	
					mysqli_select_db($website,$database_website );

$query_employee344 = "SELECT *, SUM(cp_journal_transaction.cp_db) AS db_total, SUM(cp_journal_transaction.cp_cr) AS cr_total, if((SUM(cp_journal_transaction.cp_db)>SUM(cp_journal_transaction.cp_cr)),(SUM(cp_journal_transaction.cp_db)-SUM(cp_journal_transaction.cp_cr)),0) AS db_diff, if((SUM(cp_journal_transaction.cp_cr)>SUM(cp_journal_transaction.cp_db)),(SUM(cp_journal_transaction.cp_cr)-SUM(cp_journal_transaction.cp_db)),0) AS cr_diff FROM cp_journal_transaction, cp_journal WHERE cp_journal.cp_journal_id=cp_journal_transaction.cp_journal_id AND  cp_journal_transaction.cp_account_id='3' AND cp_journal.cp_journal_date<='$from' GROUP BY cp_journal_transaction.cp_account_id";
$employee344 = $website->query($query_employee344);
$row_employee344 = mysqli_fetch_assoc($employee344);

				

/// Net Returns ( 7 - 4 ) ////			
						mysqli_select_db($website,$database_website );

$query_employee3447 = "SELECT *, SUM(cp_journal_transaction.cp_db) AS db_total, SUM(cp_journal_transaction.cp_cr) AS cr_total, if((SUM(cp_journal_transaction.cp_db)>SUM(cp_journal_transaction.cp_cr)),(SUM(cp_journal_transaction.cp_db)-SUM(cp_journal_transaction.cp_cr)),0) AS db_diff, if((SUM(cp_journal_transaction.cp_cr)>SUM(cp_journal_transaction.cp_db)),(SUM(cp_journal_transaction.cp_cr)-SUM(cp_journal_transaction.cp_db)),0) AS cr_diff FROM cp_journal_transaction, cp_journal WHERE cp_journal.cp_journal_id=cp_journal_transaction.cp_journal_id AND  cp_journal_transaction.cp_account_id='7' AND cp_journal.cp_journal_date<='$from' GROUP BY cp_journal_transaction.cp_account_id";
$employee3447 = $website->query($query_employee3447);
$row_employee3447 = mysqli_fetch_assoc($employee3447);
				
					
						mysqli_select_db($website,$database_website );

$query_employee34474 = "SELECT *, SUM(cp_journal_transaction.cp_db) AS db_total, SUM(cp_journal_transaction.cp_cr) AS cr_total, if((SUM(cp_journal_transaction.cp_db)>SUM(cp_journal_transaction.cp_cr)),(SUM(cp_journal_transaction.cp_db)-SUM(cp_journal_transaction.cp_cr)),0) AS db_diff, if((SUM(cp_journal_transaction.cp_cr)>SUM(cp_journal_transaction.cp_db)),(SUM(cp_journal_transaction.cp_cr)-SUM(cp_journal_transaction.cp_db)),0) AS cr_diff FROM cp_journal_transaction, cp_journal WHERE cp_journal.cp_journal_id=cp_journal_transaction.cp_journal_id AND  cp_journal_transaction.cp_account_id='4' AND cp_journal.cp_journal_date<='$from' GROUP BY cp_journal_transaction.cp_account_id";
$employee34474 = $website->query($query_employee34474);
$row_employee34474 = mysqli_fetch_assoc($employee34474);
					
			

$net_bank_returns=$row_employee34474['db_diff']-$row_employee3447['cr_diff'];
				  ?>
                  
                  <tr>
                    <td><?php 
					
					echo $vCpPaidCompensations; 
					
					?></td>
                    <td>
					
					<?php echo number_format($row_employee34['db_diff'], 2, '.', ',');
					$utilizations=$utilizations+$row_employee34['db_diff'];
					?></td>
                    <td width="500"><?php 
					
					echo $vCpResourcesComplex; 
					
					?></td>
                    <td><?php echo number_format($row_employee344['cr_diff'], 2, '.', ',');
					
					 
					$resources=$resources+$row_employee344['cr_diff'];
					?></td>
                  </tr>
                
                  <tr>
                    <td><?php echo $vCpResourcesComplexSurplus; 
					$resources=$resources+$vCpResourcesComplexSurplus;
					
					?></td>
                    <td>
					
					<?php 
		//echo $toto_db; 
		$ffffff=$row_employee344['cr_diff']+$net_bank_returns-$row_employee34['db_diff'];
		/// preview decimal format ////
		echo number_format($ffffff, 2, '.', ',');
		
		$utilizations=$utilizations+$ffffff;
		
		////
		?>					</td>
                    <td width="500"><?php 
					
					echo $vCpNetBankReturns; 
					
					?></td>
                    <td><?php 
		//echo $toto_db; 
		/// preview decimal format ////
		echo number_format($net_bank_returns, 2, '.', ',');
		$resources=$resources+$net_bank_returns;
		////
		?></td>
                  </tr>
                  
                  
                  <tr style="background-color:
                  #D5D5D5">
                    <td><?php echo $vTotal; ?></td>
                    <td><?php 
		//echo $toto_db; 
		/// preview decimal format ////
		
		echo number_format($utilizations, 2, '.', ',');
	
		
		
		
		////
		?></td>
                    <td width="500"><?php echo $vTotal; ?></td>
                    <td><?php 
		//echo $toto_db; 
		/// preview decimal format ////
		
		echo number_format($resources, 2, '.', ',');
	
		
		
		
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
