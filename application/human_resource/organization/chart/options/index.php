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


session_start();



$currentPage = $_SERVER["PHP_SELF"];


//// Choose this option for the main menu active selection ////
$main_function='main';
////


$fr=$_SESSION['current_company'];


	$job_id=$_GET['job'];

$query_Recordset_job = "SELECT * FROM a_sub_box,  a_main_box WHERE a_main_box.main_box_id=a_sub_box.main_box_id AND a_sub_box.sub_box_id = '$job_id'";
$Recordset_job = mysqli_query($website , $query_Recordset_job) or die(mysqli_error($website));
$row_Recordset_job = mysqli_fetch_assoc($Recordset_job);
$totalRows_Recordset_job = mysqli_num_rows($Recordset_job);

$uer=$row_Recordset_job['sub_box_id_p'];

$query_Recordset_job_up = "SELECT * FROM a_sub_box WHERE sub_box_id='$uer'";
$Recordset_job_up = mysqli_query($website , $query_Recordset_job_up) or die(mysqli_error($website));
$row_Recordset_job_up = mysqli_fetch_assoc($Recordset_job_up);
$totalRows_Recordset_job_up = mysqli_num_rows($Recordset_job_up);


if(isset($_GET['submit_edit'])) {

		$fop=$_GET['jobid'];

	if($_GET['under_supervision_of']=='0') {
		 $insertSQL = sprintf("UPDATE a_sub_box  SET sub_box_name=%s, main_box_id=%s WHERE sub_box_id=%s",
                       GetSQLValueString($_GET['job_name'], "text"),
					    GetSQLValueString($_GET['job_level'], "int"),
					   GetSQLValueString($fop, "int"));

	}
	else
	{

  $insertSQL = sprintf("UPDATE a_sub_box  SET sub_box_name=%s, main_box_id=%s, sub_box_id_p=%s WHERE sub_box_id=%s",
                       GetSQLValueString($_GET['job_name'], "text"),
					    GetSQLValueString($_GET['job_level'], "int"),
					    GetSQLValueString($_GET['under_supervision_of'], "int"),
					   GetSQLValueString($fop, "int"));
	}
  mysqli_select_db($website,$database_website);
  $Result1 = mysqli_query($website , $insertSQL) or die(mysqli_error($website));

	?>

<script language="JavaScript">
<!--
window.close();window.opener.location.reload();
</script>

	<?php




}



if(isset($_GET['submit_add'])) {


	if($_GET['under_supervision_of']=='0') {
		 $insertSQL = sprintf("INSERT INTO a_sub_box (sub_box_name, organization, main_box_id, sub_box_id_p ) VALUES (%s, %s, %s, %s) ",
                       GetSQLValueString($_GET['job_name'], "text"),
							  GetSQLValueString($fr, "int"),
					    GetSQLValueString($_GET['job_level'], "int"),
							 GetSQLValueString('0', "int"));

	}
	else
	{

  $insertSQL = sprintf("INSERT INTO a_sub_box (sub_box_name, main_box_id, organization, sub_box_id_p) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_GET['job_name'], "text"),
					    GetSQLValueString($_GET['job_level'], "int"),
					   GetSQLValueString($fr, "int"),
					    GetSQLValueString($_GET['under_supervision_of'], "int"));
	}
  mysqli_select_db($website,$database_website);
  $Result1 = mysqli_query($website , $insertSQL) or die(mysqli_error($website));

	?>

<script language="JavaScript">
<!--
window.close();window.opener.location.reload();
</script>

	<?php





}



?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php
		//// include Head Styles ////
		include ('../../../../../assets/header_smart.php');
		//// end of Head Styles ////
		?>
	</head>

	<!--

	TABLE OF CONTENTS.

	Use search to find needed section.

	===================================================================

	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #RIGHT PANEL              |  right panel userlist          |
	|  13. #MAIN PANEL               |  main panel                    |
	|  14. #MAIN CONTENT             |  content holder                |
	|  15. #PAGE FOOTER              |  page footer                   |
	|  16. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  17. #PLUGINS                  |  all scripts and plugins       |

	===================================================================

	-->

	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="<?php if($_SESSION['language']=='AR') { ?> smart-rtl <?php } ?>   smart-style-2 droid-arabic-kufi">

		<!-- HEADER -->

		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->

		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main_" role="main">

			<!-- RIBBON -->


			<!-- END RIBBON -->





			<!-- MAIN CONTENT -->
			<div id="content" style="margin-top: 0px; padding-top: 0px; background-color: white">

			<div class="row">

				<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" style="margin: 10px">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget">
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
								<header role="heading" style="background-color: #865b7a; color: white"><div class="jarviswidget-ctrls" role="menu" > </div>

									<h2 class="droid-arabic-kufi"><?php echo $vEdit.' / '.$vAdd.' '.$vJob; ?> <?php echo $row_Recordset_job['sub_box_name'] ; ?></h2>

								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

								<!-- widget div-->
								<div role="content" >

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->

									</div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding" style="background-color: #EAEAEA">

										<form action="index.php" method="get" target="_self" class="smart-form droid-arabic-kufi" style="background-color: currentColor">



												<?php if(isset($_GET['start'])) { ?>
											<fieldset class="">
				<div class="row">

					<div class="col-xs-11">




												<section >
													<label class="label"><?php echo $vSelect; ?></label>
													<label class="input">


														<select style="width:100%" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="job">

												<?php

	$cat_id=$_GET['cat_id'];

$query_Recordset_skill = "SELECT * FROM a_sub_box, a_main_box WHERE a_main_box.main_box_id=a_sub_box.main_box_id AND a_main_box.cat_id='$cat_id'";
$Recordset_skill = mysqli_query($website , $query_Recordset_skill) or die(mysqli_error($website));
$row_Recordset_skill = mysqli_fetch_assoc($Recordset_skill);
$totalRows_Recordset_skill = mysqli_num_rows($Recordset_skill);

						?>



														<?php do { ?>

														<option style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_skill['sub_box_id']; ?>">&nbsp; &nbsp;<?php echo $row_Recordset_skill['sub_box_id']; ?> - <?php echo $row_Recordset_skill['sub_box_name']; ?></option>

														 <?php } while ($row_Recordset_skill = mysqli_fetch_assoc($Recordset_skill)); ?>



													</select>



													</label>

												</section>





					</div>


											</div>
								</fieldset>

												<?php } ?>





											<?php if(isset($_GET['job']) && !isset($_GET['edit_job'])) { ?>
											<fieldset>
												<div style="padding: 10px">
											<ul class="list-group">
												<li class="list-group-item droid-arabic-kufi"><a href="index.php?edit_job=1&job=<?php echo $row_Recordset_job['sub_box_id'] ; ?>&cat_id=<?php echo $row_Recordset_job['cat_id']; ?>"><?php echo $vEdit; ?></a></li>
												<li class="list-group-item"><a href="index.php?add_job=1&job=<?php echo $row_Recordset_job['sub_box_id'] ; ?>&cat_id=<?php echo $row_Recordset_job['cat_id']; ?>"><?php echo $vAddJob ; ?></a></li>

											</div>
											</fieldset>

												<?php } ?>



											<?php if(!isset($_GET['job'])) { ?>
											<?php if(isset($_GET['start'])) { ?>
											<footer>
												<button type="submit" name="submit" class="btn droid-arabic-kufi" style="background-color: #865b7a; color: white">
													<span class="droid-arabic-kufi"><?php echo $vSubmit ; ?></span>
												</button>

											</footer>
											<?php } ?>
											<?php } ?>



										</form>

										<?php if(isset($_GET['edit_job'])) { ?>
										<form action="index.php" method="get" target="_self" class="smart-form droid-arabic-kufi" style="background-color: currentColor">

											<fieldset class="">

												<input type="hidden" value="<?php echo $row_Recordset_job['sub_box_id']; ?>" name="jobid">

				<div class="row">

					<div class="col-xs-11 droid-arabic-kufi">



												<section class="droid-arabic-kufi">
													<label class="label droid-arabic-kufi"><?php echo $vJobTitle; ?></label>
													<label class="input droid-arabic-kufi">
														<input class="droid-arabic-kufi" style="font-feature-settings: normal"  type="text" name="job_name" value="<?php echo $row_Recordset_job['sub_box_name']; ?>">
													</label>

												</section>


												<section >
													<label class="label"><?php echo $vOrganizationalLevelName; ?></label>
													<label class="input">


														<select style="width:100%" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="job_level">

												<?php

	$cat_id=$_GET['cat_id'];
		$fdre=$row_Recordset_job['main_box_id'];

$query_Recordset_skill33 = "SELECT * FROM a_main_box, a_job_degree, a_category WHERE (a_main_box.organization='$fr' OR a_category.cat_id='222') AND a_category.cat_id=a_main_box.cat_id AND a_main_box.cat_id='$cat_id'  AND  a_job_degree.j_d_id=a_main_box.j_d_id) ORDER BY a_job_degree.j_d_id_p";
$Recordset_skill33 = mysqli_query($website , $query_Recordset_skill33) or die(mysqli_error($website));
$row_Recordset_skill33 = mysqli_fetch_assoc($Recordset_skill33);
$totalRows_Recordset_skill33 = mysqli_num_rows($Recordset_skill33);

						?>




														<?php do { ?>

														<option <?php if($row_Recordset_skill33['main_box_id']==$row_Recordset_job['main_box_id']) { ?> selected <?php }  ?>style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_skill33['main_box_id']; ?>">&nbsp; &nbsp;<?php echo $row_Recordset_skill33['j_d_name']; ?>  <?php // echo $row_Recordset_skill33['cat_name']; ?></option>

														 <?php } while ($row_Recordset_skill33 = mysqli_fetch_assoc($Recordset_skill33)); ?>



													</select>



													</label>

												</section>


											<section >
													<label class="label"><?php echo $vUnderSupervisionOf; ?></label>
													<label class="input">


														<select style="width:100%" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="under_supervision_of">

												<?php


	$job_id=$_GET['job'];

$query_Recordset_job32 = "SELECT * FROM a_sub_box,  a_main_box, a_job_degree WHERE a_job_degree.j_d_id=a_main_box.j_d_id AND a_main_box.main_box_id=a_sub_box.main_box_id AND a_main_box.cat_id = '$cat_id' AND a_main_box.organization='$fr' ORDER BY a_job_degree.j_d_id_p";
$Recordset_job32 = mysqli_query($website , $query_Recordset_job32) or die(mysqli_error($website));
$row_Recordset_job32 = mysqli_fetch_assoc($Recordset_job32);
$totalRows_Recordset_job32 = mysqli_num_rows($Recordset_job32);

						?>

															<option value="0" <?php if($row_Recordset_job_up['sub_box_id_p']=='0') { ?> selected <?php } ?>><?php echo $vNull; ?></option>


														<?php do { ?>

														<option <?php if($row_Recordset_job32['sub_box_id']==$row_Recordset_job['sub_box_id_p']) { ?> selected <?php }  ?>style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_job32['sub_box_id']; ?>"><?php echo $row_Recordset_job32['sub_box_name']; ?> -  <?php  echo $row_Recordset_skill33['cat_name']; ?></option>

														 <?php } while ($row_Recordset_job32 = mysqli_fetch_assoc($Recordset_job32)); ?>



													</select>



													</label>

												</section>


					</div>


											</div>



											</fieldset>


											<footer>
												<button type="submit" name="submit_edit" class="btn droid-arabic-kufi" style="background-color: firebrick; color: white">
													<span class="droid-arabic-kufi"><?php echo $vSubmit ; ?></span>
												</button>

											</footer>




										</form>
										<?php } ?>


											<?php if(isset($_GET['add_job'])) { ?>
										<form action="index.php" method="get" target="_self" class="smart-form droid-arabic-kufi" style="background-color: currentColor">

											<fieldset class="">

												<input type="hidden" value="<?php echo $row_Recordset_job['sub_box_id']; ?>" name="jobid">

				<div class="row">

					<div class="col-xs-11 droid-arabic-kufi">



												<section class="droid-arabic-kufi">
													<label class="label droid-arabic-kufi"><?php echo $vJobTitle; ?></label>
													<label class="input droid-arabic-kufi">
														<input class="droid-arabic-kufi" style="font-feature-settings: normal"  type="text" name="job_name" value="">
													</label>

												</section>


												<section >
													<label class="label"><?php echo $vOrganizationalLevelName; ?></label>
													<label class="input">


														<select style="width:100%" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="job_level">

												<?php

	$cat_id=$_GET['cat_id'];
		$fdre=$row_Recordset_job['main_box_id'];

$query_Recordset_skill33 = "SELECT * FROM a_main_box, a_job_degree, a_category WHERE (a_main_box.organization='$fr' OR a_category.cat_id='222') AND a_category.cat_id=a_main_box.cat_id AND a_main_box.cat_id='$cat_id' AND  a_job_degree.j_d_id=a_main_box.j_d_id ORDER BY a_job_degree.j_d_id_p";
$Recordset_skill33 = mysqli_query($website , $query_Recordset_skill33) or die(mysqli_error($website));
$row_Recordset_skill33 = mysqli_fetch_assoc($Recordset_skill33);
$totalRows_Recordset_skill33 = mysqli_num_rows($Recordset_skill33);

						?>




														<?php do { ?>

														<option style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_skill33['main_box_id']; ?>">&nbsp; &nbsp;<?php echo $row_Recordset_skill33['j_d_name']; ?>  <?php // echo $row_Recordset_skill33['cat_name']; ?></option>

														 <?php } while ($row_Recordset_skill33 = mysqli_fetch_assoc($Recordset_skill33)); ?>



													</select>



													</label>

												</section>


											<section >
													<label class="label"><?php echo $vUnderSupervisionOf; ?></label>
													<label class="input">


														<select style="width:100%" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="under_supervision_of">

												<?php


	$job_id=$_GET['job'];

$query_Recordset_job32 = "SELECT * FROM a_sub_box,  a_main_box, a_job_degree WHERE a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND a_main_box.main_box_id=a_sub_box.main_box_id AND a_main_box.cat_id = '$cat_id' ORDER BY a_job_degree.j_d_id_p";
$Recordset_job32 = mysqli_query($website , $query_Recordset_job32) or die(mysqli_error($website));
$row_Recordset_job32 = mysqli_fetch_assoc($Recordset_job32);
$totalRows_Recordset_job32 = mysqli_num_rows($Recordset_job32);

						?>

															<option value="0"><?php echo $vNull; ?></option>


														<?php do { ?>

														<option style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_job32['sub_box_id']; ?>"><?php echo $row_Recordset_job32['sub_box_name']; ?> -  <?php  echo $row_Recordset_skill33['cat_name']; ?></option>

														 <?php } while ($row_Recordset_job32 = mysqli_fetch_assoc($Recordset_job32)); ?>



													</select>



													</label>

												</section>


					</div>


											</div>



											</fieldset>


											<footer>
												<button type="submit" name="submit_add" class="btn droid-arabic-kufi" style="background-color: firebrick; color: white">
													<span class="droid-arabic-kufi"><?php echo $vSubmit ; ?></span>
												</button>

											</footer>




										</form>
										<?php } ?>

									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>
							<!-- end widget -->

						</article>

			</div>

			<!-- END MAIN CONTENT -->









		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<?php
		include('../../../../../assets/footer_smart.php');
		?>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->


			<!-- JQUERY SELECT2 INPUT -->
		<script src="../../../../../assets/smart_theme/js/plugin/select2/select2.min.js"></script>


		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
			<?php
			include('../../../../includes/menus/footer_scripts.php');
			?>

	</body>

</html>
