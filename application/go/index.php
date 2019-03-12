<?php
//// include config script ////
include('../../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../assets/languages/english.php');
}
//// End Language ////


$use_bootstrap='1';

$case_id=$_GET['page'];


if($_GET['this_is_pop=1']=='1')
{
	$_SESSION['this_is_pop=1']='1';
}

/////
if(strpos($case_id, "-n")) { 
	
  
	$case_id2=str_replace("-n", "", $case_id);
	
	// echo $case_id2;
	
		$query_Recordset_crud = "SELECT * FROM crud_case WHERE case_code='$case_id2'";
$Recordset_crud = mysqli_query($website , $query_Recordset_crud) or die(mysqli_error($website));
$row_Recordset_crud = mysqli_fetch_assoc($Recordset_crud);
$totalRows_Recordset_crud = mysqli_num_rows($Recordset_crud);
	
	
?>
<script>
window.open(
  "<?php echo $server.''.$row_Recordset_crud['case_link'].'?case_id='.$row_Recordset_crud['crud_case_id']; ?>&case_filter=<?php echo $_GET['case_filter']; ?>&ref=<?php echo $_GET['ref']; ?>",
  '_blank' // <- This is what makes it open in a new window.-->
);
</script>

<?php
	
}
else
{
$query_Recordset_crud = "SELECT * FROM crud_case WHERE case_code='$case_id'";
$Recordset_crud = mysqli_query($website , $query_Recordset_crud) or die(mysqli_error($website));
$row_Recordset_crud = mysqli_fetch_assoc($Recordset_crud);
$totalRows_Recordset_crud = mysqli_num_rows($Recordset_crud);
	
	echo '<script type="text/javascript">
           window.location = "'.$server.''.$row_Recordset_crud['case_link'].'?case_id='.$row_Recordset_crud['crud_case_id'].'&case_filter='.$_GET['case_filter'].'&ref='.$_GET['ref'].'"
      </script>';
	
}


////


//// end recordsets ////

if($_GET['jumpMenu']=='index.php')
{
	?>
<script>
	history.go(-1);
</script>

<?php
}








?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../assets/header.php');
	//// end of header script ////
		?>

			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
										<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
										<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
										<!------ Include the above in your HEAD tag ---------->

										<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		
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
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" >
						<h1 style="height: 100%;"><?php echo $vComplementaryPension; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../assets/menus/header/compl_pension.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../assets/menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="../human_resource/compl_pension/create" style="display:none">
							<fieldset>
								<input type="submit" name="create" id="create" value="CREATE" class="focus" />
								<input type="submit" name="import" id="import" value="IMPORT" class="no-focus" />
							</fieldset>
						</form>
					</section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>
					
<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } else { ?>float:right; margin-right:200px <?php } ?>">
						<fieldset class="search">
							<input class="arabic" type="text" id="search" placeholder="<?php echo $vSearch ; ?>..." />

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



									
										<section>
										<div class="container">
										<!-- Start Content -->

												
										<!-- End Content -->
										</div>

										</section>

				</section>
			</main>
		</section>
	</body>
</html>
