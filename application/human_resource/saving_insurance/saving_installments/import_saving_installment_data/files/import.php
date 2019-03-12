<?php
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


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../../../assets/header.php');
	//// end of header script ////
		?>

	<style>
		.alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}
.alert-message code
{
    background-color: #fff;
    border-radius: 3px;
}
.alert-message-success
{
    background-color: #F4FDF0;
    border-color: #3C763D;
}
.alert-message-success h4
{
    color: #3C763D;
}
.alert-message-danger
{
    background-color: #fdf7f7;
    border-color: #d9534f;
}
.alert-message-danger h4
{
    color: #d9534f;
}
.alert-message-warning
{
    background-color: #fcf8f2;
    border-color: #f0ad4e;
}
.alert-message-warning h4
{
    color: #f0ad4e;
}
.alert-message-info
{
    background-color: #f4f8fa;
    border-color: #5bc0de;
}
.alert-message-info h4
{
    color: #5bc0de;
}
.alert-message-default
{
    background-color: #EEE;
    border-color: #B4B4B4;
}
.alert-message-default h4
{
    color: #000;
}
.alert-message-notice
{
    background-color: #FCFCDD;
    border-color: #BDBD89;
}
.alert-message-notice h4
{
    color: #444;
}
		</style>

	</head>
	<body style="height:100%">
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/saving_insurance/" >
						<h1 style="height: 100%;"><?php echo $vSavingInsurance; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../../../../../assets/menus/header/saving_insurance.php')
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
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="../../../create" style="display:none">
							<fieldset>
								<input type="submit" name="create" id="create" value="CREATE" class="focus" />
								<input type="submit" name="import" id="import" value="IMPORT" class="no-focus" />
							</fieldset>
						</form>
					</section>
					<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?> ">
						<fieldset class="search">
							<input class="arabic" type="text" id="search" placeholder="<?php echo $vSearch ; ?> ..." />

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

<?php
//echo $targetFile2;
	$targetFile2= $_SESSION['uploaded_file'];
					$current_company=$_SESSION['current_company'];
					$patch_code=$_SESSION['patch_code'];
					
					$current_period=$_SESSION['current_period'];
						
//echo $_SESSION['rto'].'.csv';
$query = "LOAD DATA LOCAL INFILE '$targetFile2' INTO TABLE sp_transaction FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (age_on_date, employee_id, emp_basic_le, excluded_incentive_le, production_incentive_le, emp_portion_le, co_portion_le, egpc_portion_le) SET patch_code=$patch_code, sp_installment_period_id=$current_period";


$result = mysqli_query($website , $query)  or die(_ERROR15.": ".mysqli_error($website));


?>
										
<div class="row">
       
        <div class="col-sm-12 col-md-12">
            <div class="alert-message alert-message-success arabic">
                <h4 style="text-align: center; font-size: 25px">
                    <?php echo $vMessage; ?></h4>
                <p style="text-align: center; font-size: 20px; color: green">
                <?php echo $vDataImported; ?>    
				</p>
				
				
				<meta http-equiv="refresh" content="2; url=<?php echo $server; ?>application/human_resource/saving_insurance/saving_installments/" />

				
            </div>
        </div>
    </div>
					
					
				</section>
			</main>
		</section>
	</body>
</html>
