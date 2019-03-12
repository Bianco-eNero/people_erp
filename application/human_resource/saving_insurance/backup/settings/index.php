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


mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT COUNT(employee_id) AS TOTAL_MEMBERS FROM employee WHERE (cp_member_type_id=2 || cp_member_type_id=6) AND organization='$organization'";
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
        include('../../../../assets/header_smart.php');
	//// end of header script ////
		?>

			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
										<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
										<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
										<!------ Include the above in your HEAD tag ---------->

										<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


	</head>
	<body style="height:100%" >
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/saving_insurance/" style="width:50%" >
						<h1 style="height: 100%;"><?php echo $vSavingInsurance; ?></h1>
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
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="../create" style="display:none">
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
				<section class="body" style="height:100%" >




										<section>
										<div class="container_">
										<!-- Start Content -->
										<div id="content" >


											<!-- widget grid -->
											<section id="widget-grid" class="">



												<!-- row -->
												<div class="row">

													<!-- NEW WIDGET START -->
													<article class="col-sm-12">

														<!-- Widget ID (each widget will need unique ID)-->
														<div class="jarviswidget jarviswidget-color-purple" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false">
															<!-- widget options:
															usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

															data-widget-colorbutton="false"
															data-widget-editbutton="false"
															data-widget-togglebutton="false"
															data-widget-deletebutton="false"
															data-widget-fullscreenbutton="false"
															data-widget-custombutton="false"
															data-widget-collapsed="true"
															data-widget-sortable="false"

															-->
															<header >
																<h2><?php echo $vSettings; ?> </h2>
															</header>

															<!-- widget div-->
															<div>

																<!-- widget edit box -->
																<div class="jarviswidget-editbox">
																	<!-- This area used as dropdown edit box -->

																</div>
																<!-- end widget edit box -->

																<!-- widget content -->
																<div class="widget-body">

																	<ul class="bs-glyphicons">
																		<li>
																			<span class="glyphicon glyphicon-adjust"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-adjust</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-align-center"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-align-center</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-align-justify"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-align-justify</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-align-left"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-align-left</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-align-right"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-align-right</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-arrow-down"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-arrow-down</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-arrow-left"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-arrow-left</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-arrow-right"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-arrow-right</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-arrow-up"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-arrow-up</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-asterisk"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-asterisk</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-backward"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-backward</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-ban-circle"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-ban-circle</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-barcode"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-barcode</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-bell"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-bell</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-bold"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-bold</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-book"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-book</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-bookmark"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-bookmark</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-briefcase"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-briefcase</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-bullhorn"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-bullhorn</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-calendar"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-calendar</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-camera"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-camera</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-certificate"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-certificate</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-check"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-check</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-chevron-down"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-chevron-down</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-chevron-left"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-chevron-left</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-chevron-right"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-chevron-right</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-chevron-up"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-chevron-up</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-circle-arrow-down"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-circle-arrow-down</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-circle-arrow-left"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-circle-arrow-left</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-circle-arrow-right"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-circle-arrow-right</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-circle-arrow-up"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-circle-arrow-up</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-cloud"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-cloud</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-cloud-download"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-cloud-download</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-cloud-upload"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-cloud-upload</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-cog"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-cog</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-collapse-down"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-collapse-down</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-collapse-up"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-collapse-up</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-comment"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-comment</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-compressed"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-compressed</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-copyright-mark"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-copyright-mark</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-credit-card"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-credit-card</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-cutlery"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-cutlery</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-dashboard"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-dashboard</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-download"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-download</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-download-alt"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-download-alt</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-earphone"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-earphone</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-edit"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-edit</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-eject"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-eject</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-envelope"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-envelope</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-euro"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-euro</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-exclamation-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-exclamation-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-expand"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-expand</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-export"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-export</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-eye-close"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-eye-close</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-eye-open"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-eye-open</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-facetime-video"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-facetime-video</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-fast-backward"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-fast-backward</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-fast-forward"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-fast-forward</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-file"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-file</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-film"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-film</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-filter"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-filter</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-fire"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-fire</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-flag"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-flag</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-flash"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-flash</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-floppy-disk"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-floppy-disk</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-floppy-open"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-floppy-open</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-floppy-remove"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-floppy-remove</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-floppy-save"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-floppy-save</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-floppy-saved"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-floppy-saved</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-folder-close"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-folder-close</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-folder-open"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-folder-open</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-font"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-font</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-forward"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-forward</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-fullscreen"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-fullscreen</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-gbp"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-gbp</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-gift"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-gift</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-glass"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-glass</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-globe"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-globe</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-hand-down"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-hand-down</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-hand-left"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-hand-left</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-hand-right"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-hand-right</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-hand-up"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-hand-up</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-hd-video"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-hd-video</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-hdd"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-hdd</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-header"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-header</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-headphones"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-headphones</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-heart"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-heart</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-heart-empty"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-heart-empty</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-home"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-home</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-import"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-import</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-inbox"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-inbox</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-indent-left"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-indent-left</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-indent-right"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-indent-right</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-info-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-info-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-italic"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-italic</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-leaf"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-leaf</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-link"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-link</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-list"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-list</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-list-alt"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-list-alt</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-lock"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-lock</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-log-in"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-log-in</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-log-out"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-log-out</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-magnet"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-magnet</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-map-marker"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-map-marker</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-minus"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-minus</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-minus-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-minus-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-move"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-move</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-music"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-music</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-new-window"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-new-window</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-off"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-off</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-ok"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-ok</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-ok-circle"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-ok-circle</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-ok-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-ok-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-open"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-open</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-paperclip"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-paperclip</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-pause"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-pause</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-pencil"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-pencil</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-phone"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-phone</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-phone-alt"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-phone-alt</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-picture"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-picture</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-plane"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-plane</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-play"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-play</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-play-circle"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-play-circle</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-plus"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-plus</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-plus-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-plus-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-print"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-print</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-pushpin"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-pushpin</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-qrcode"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-qrcode</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-question-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-question-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-random"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-random</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-record"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-record</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-refresh"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-refresh</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-registration-mark"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-registration-mark</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-remove"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-remove</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-remove-circle"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-remove-circle</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-remove-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-remove-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-repeat"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-repeat</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-resize-full"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-resize-full</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-resize-horizontal"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-resize-horizontal</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-resize-small"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-resize-small</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-resize-vertical"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-resize-vertical</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-retweet"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-retweet</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-road"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-road</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-save"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-save</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-saved"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-saved</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-screenshot"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-screenshot</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sd-video"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sd-video</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-search"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-search</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-send"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-send</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-share"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-share</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-share-alt"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-share-alt</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-shopping-cart"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-shopping-cart</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-signal"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-signal</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sort"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sort</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sort-by-alphabet"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sort-by-alphabet</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sort-by-alphabet-alt</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sort-by-attributes"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sort-by-attributes</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sort-by-attributes-alt</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sort-by-order"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sort-by-order</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sort-by-order-alt"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sort-by-order-alt</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sound-5-1"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sound-5-1</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sound-6-1"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sound-6-1</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sound-7-1"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sound-7-1</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sound-dolby"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sound-dolby</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-sound-stereo"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-sound-stereo</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-star"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-star</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-star-empty"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-star-empty</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-stats"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-stats</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-step-backward"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-step-backward</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-step-forward"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-step-forward</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-stop"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-stop</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-subtitles"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-subtitles</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-tag"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-tag</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-tags"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-tags</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-tasks"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-tasks</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-text-height"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-text-height</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-text-width"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-text-width</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-th"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-th</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-th-large"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-th-large</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-th-list"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-th-list</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-thumbs-down"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-thumbs-down</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-thumbs-up"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-thumbs-up</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-time"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-time</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-tint"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-tint</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-tower"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-tower</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-transfer"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-transfer</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-trash"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-trash</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-tree-conifer"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-tree-conifer</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-tree-deciduous"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-tree-deciduous</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-unchecked"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-unchecked</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-upload"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-upload</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-usd"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-usd</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-user"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-user</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-volume-down"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-volume-down</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-volume-off"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-volume-off</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-volume-up"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-volume-up</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-warning-sign"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-warning-sign</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-wrench"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-wrench</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-zoom-in"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-zoom-in</span>
																		</li>
																		<li>
																			<span class="glyphicon glyphicon-zoom-out"></span>
																			<span class="glyphicon-class">.glyphicon .glyphicon-zoom-out</span>
																		</li>
																	</ul>

																</div>
																<!-- end widget content -->

															</div>
															<!-- end widget div -->

														</div>
														<!-- end widget -->

													</article>
													<!-- WIDGET END -->

												</div>

												<!-- end row -->

												<!-- row -->

												<div class="row">

												</div>

												<!-- end row -->

											</section>
											<!-- end widget grid -->


										</div>


<script>

	//Gets tooltips activated
	$("#inbox-table [rel=tooltip]").tooltip();

	$("#inbox-table input[type='checkbox']").change(function() {
		$(this).closest('tr').toggleClass("highlight", this.checked);
	});

	$("#inbox-table .inbox-data-message").click(function() {
		$this = $(this);
		getMail($this);
	})
	$("#inbox-table .inbox-data-from").click(function() {
		$this = $(this);
		getMail($this);
	})
	function getMail($this) {
		//console.log($this.closest("tr").attr("id"));
		loadURL("ajax/email-opened.html", $('#inbox-content > .table-wrap'));
	}


	$('.inbox-table-icon input:checkbox').click(function() {
		enableDeleteButton();
	})

	$(".deletebutton").click(function() {
		$('#inbox-table td input:checkbox:checked').parents("tr").rowslide();
		//$(".inbox-checkbox-triggered").removeClass('visible');
		//$("#compose-mail").show();
	});

	function enableDeleteButton() {
		var isChecked = $('.inbox-table-icon input:checkbox').is(':checked');

		if (isChecked) {
			$(".inbox-checkbox-triggered").addClass('visible');
			//$("#compose-mail").hide();
		} else {
			$(".inbox-checkbox-triggered").removeClass('visible');
			//$("#compose-mail").show();
		}
	}

</script>
</div>

					<div class="inbox-footer">

						<div class="row">

							<div class="col-xs-6 col-sm-1">

								<div class="txt-color-white hidden-desktop visible-mobile">
									3.5GB of <strong>10GB</strong>

									<div class="progress progress-micro">
										<div class="progress-bar progress-primary" style="width: 34%;"></div>
									</div>
								</div>
							</div>

							<div class="col-xs-6 col-sm-11 text-right">
								<div class="txt-color-white inline-block">
									<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> 52 mins ago |</i> Displaying <strong>44 of 259</strong>
								</div>
							</div>

						</div>

					</div>

				</div>


			</div>

										<!-- End Content -->
										</div>

										</section>

										<script type="text/javascript">

										// DO NOT REMOVE : GLOBAL FUNCTIONS!

										$(document).ready(function() {

											pageSetUp();

											// PAGE RELATED SCRIPTS

											function hide_divs(search) {
												$(".bs-glyphicons li").hide(); // hide all divs
												$('.bs-glyphicons li > span[class*="'+search+'"]').parent().show(); // show the ones that match
											}

											function show_all() {
												$(".bs-glyphicons li").show()
											}

											$("#glyph-search").keyup(function() {
												var search = $.trim(this.value);
												if (search === "") {
													show_all();
												}
												else {
													hide_divs(search);
												}
											});


										})

										</script>

				</section>
			</main>
		</section>
        <?php
         include('../../../../assets/footer_smart.php');
        ?>


	</body>
</html>
