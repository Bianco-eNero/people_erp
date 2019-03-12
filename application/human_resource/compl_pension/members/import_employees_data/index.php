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


//$use_bootstrap='1';





?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../../assets/header.php');
	//// end of header script ////
		?>

			
						<link rel="stylesheet" href="../../../../../assets/css/dropzone.css">
						<script src="../../../../../assets/js/dropzone.js"></script>

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
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vMembers; ?> </h1>
						<form method="post" action="../../create">
							<fieldset>
								
								<a href="import_employees_data_template.csv" style="text-decoration: none"><input type="button" name="create" id="create" value="<?php echo $vDownloadTemplate ; ?>" class="focus" /></a>
								
							</fieldset>
						</form>
					</section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>
					
<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
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

											<form action="upload.php" class="dropzone" id="mydropzone" style="background-image: url(../../../../../assets/images/upload.png)"  name="upload_files">

<?php?>
					<input name="time" type="hidden" id="object_id2" value="<?php echo time(); ?>">



                        <input type="hidden" name="by_emp_id" value="<?php echo $_SESSION['MM_UsernameId'];?>">



                        <input style="display: none" class="form-control droid-arabic-kufi" id="title" name="desc" maxlength="40" placeholder="<?php echo $vWriteDescBeforUpload;?>" type="text">

											
											
											</form>
											
											<br>
											
											 
											
											
											<a class="focus" href="files/import.php?s=1" style="text-decoration:none; background-color: #00a09d; color:white"><input type="submit" style=" background-color: #00a09d; color:white; border-style:none; padding: 10px" name="create" id="create" value="<?php echo $vImportData; ?>" class="focus" /></a>

												 
											
										<!-- End Content -->
										</div>

										</section>

				</section>
			</main>
		</section>
	</body>
</html>
