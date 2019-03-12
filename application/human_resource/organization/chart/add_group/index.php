#865b7a<?php
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


//// redirect to register if not logged in ////
//// redirect to register if not logged in ////




$sopw=$_SESSION['current_company'];


if(isset($_POST['level']))
{

$aaaddd=$_POST['level'];

mysqli_select_db($website,$database_website);
$query_current_authorization = "SELECT *  FROM a_job_degree WHERE j_d_id='$aaaddd'";
$current_authorization = mysqli_query($website , $query_current_authorization) or die(mysqli_error($website));
$row_current_authorization = mysqli_fetch_assoc($current_authorization);
$totalRows_current_authorization = mysqli_num_rows($current_authorization);
  //// end redirect to register if not logged in ////



$cat_id=$_POST['group'];

$org_vert_level=$_POST['level'];

  $insertSQL = sprintf("INSERT INTO a_main_box (organization, 	j_d_id, cat_id, j_d_id_p) VALUES (%s, %s, %s, %s)",
                        GetSQLValueString($sopw, "int"),
					   GetSQLValueString($org_vert_level, "int"),
					   GetSQLValueString($cat_id, "int"),
					   GetSQLValueString($row_current_authorization['j_d_id_p'], "int"));

  mysqli_select_db($website,$database_website);
  $Result1 = mysqli_query($website , $insertSQL) or die(mysqli_error($website));

	?>

<script language="JavaScript">
<!--
window.close();window.opener.location.reload();
</script>

	<?php



}
//// start recordsets /////


?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php
    //// include header script ////
  	 include('../../../../../assets/header_smart.php');
  	//// end of header script ////
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

									<h2 class="droid-arabic-kufi"><?php echo $vAddGroup; ?> </h2>

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

										<form action="index.php" method="post" target="_self" class="smart-form droid-arabic-kufi" style="background-color: currentColor">

									<input type="hidden" value="<?php echo $_GET['cat_id']; ?>" name="cat_id">

											<fieldset>



												<section>
													<label class="label"><?php echo $vAddGroup; ?></label>
													<label class="input">

														<select style="width:100%" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="group">

												<?php

	$cat_id=$_GET['cat_id'];

$query_Recordset_skill = "SELECT * FROM a_category ORDER BY cat_name";
$Recordset_skill = mysqli_query($website , $query_Recordset_skill) or die(mysqli_error($website));
$row_Recordset_skill = mysqli_fetch_assoc($Recordset_skill);
$totalRows_Recordset_skill = mysqli_num_rows($Recordset_skill);

						?>



														<?php do { ?>

														<option style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_skill['cat_id']; ?>">&nbsp; &nbsp; <?php echo $row_Recordset_skill['cat_name']; ?></option>

														 <?php } while ($row_Recordset_skill = mysqli_fetch_assoc($Recordset_skill)); ?>



													</select>

													</label>

												</section>

												<section>
													<label class="label"><?php echo $vOrganizationalLevelName; ?></label>
													<label class="input">

														<select style="width:100%" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="level">

												<?php

	$cat_id=$_GET['cat_id'];

$query_Recordset_skill22 = "SELECT * FROM a_job_degree ORDER BY j_d_id_p";
$Recordset_skill22 = mysqli_query($website , $query_Recordset_skill22) or die(mysqli_error($website));
$row_Recordset_skill22 = mysqli_fetch_assoc($Recordset_skill22);
$totalRows_Recordset_skill22 = mysqli_num_rows($Recordset_skill22);

						?>



														<?php do { ?>

														<option style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_skill22['j_d_id']; ?>">&nbsp; &nbsp; <?php echo $row_Recordset_skill22['j_d_name']; ?></option>

														 <?php } while ($row_Recordset_skill22 = mysqli_fetch_assoc($Recordset_skill22)); ?>



													</select>

													</label>

												</section>


											</fieldset>


											<footer>
												<button type="submit" name="submit" class="btn droid-arabic-kufi" style="background-color: #865b7a; color: white">
													<span class="droid-arabic-kufi"><?php echo $vSubmit ; ?></span>
												</button>
												<button type="button" class="btn btn-default" onclick="window.close();">
													Back
												</button>
											</footer>
										</form>

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
			include('../../../../includes/menus/page_footer.php');
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
			include('../../../../../assets/footer_smart.php');
			?>

	</body>

</html>
