<?php
//// Include Connection ////
include('../../../Connections/eogm.php');
//// End Connection ////


//// Include General Variables ////
include('../../../includes/settings.php');
//// End General Variables ////


//// Include Language ////
include('../../../includes/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../../includes/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../../includes/languages/english.php');
}
//// End Language ////


session_start();



$currentPage = $_SERVER["PHP_SELF"];


//// Choose this option for the main menu active selection ////
$main_function='main';
////


//// redirect to register if not logged in ////
//// redirect to register if not logged in ////
include ('../../../includes/redirect_non_members.php');


  //// end redirect to register if not logged in ////
//// start recordsets /////

//// end recordsets ////

?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php
		//// include Head Styles ////
		include ('../../../includes/head.php');
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
	<body class="<?php if($_SESSION['language']=='AR') { ?> smart-rtl <?php } ?>    <?php echo $row_current_user['theme']; ?> <?php echo $row_current_user['menu']; ?> <?php echo $row_current_user['header_type']; ?> <?php echo $row_current_user['navigation_type']; ?>">

		<!-- HEADER -->
		<header id="header" style="background-color: " >
			<div id="logo-group" style="background-color: white; border-bottom-color: black; border-bottom-style: solid; border-bottom-width: 1px">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <a href="<?php echo $server; ?>"><img src="<?php echo $server; ?>images/<?php echo $_SESSION['current_company']; ?>.png" alt="<?php echo $ApplicationTitle; ?>"> </a></span>	<!-- END LOGO PLACEHOLDER -->



					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<?php
					include('../../../includes/menus/notifications.php');
					?>

					<!-- footer: refresh area -->
					<?php
		//		include('../../../includes/menus/footer.php');
				?>
					<!-- end footer -->

				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
				<?php
				include('../../../includes/menus/projects.php');
				?>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<?php
				include('../../../includes/menus/collapse_menu_button.php');
				?>
				<!-- end collapse menu -->

				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<?php
				include('../../../includes/menus/top_menu_profile.php');
				?>
				<!-- logout button -->
				<?php
				include('../../../includes/menus/logout_button.php');
				?>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<?php
				include('../../../includes/menus/search_mobile.php');
				?>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<?php
				include('../../../includes/menus/search.php');
				?>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<?php
				include('../../../includes/menus/full_screen.php');
				?>
				<!-- end fullscreen button -->

				<!-- #Voice Command: Start Speech -->
				<?php
				include('../../../includes/menus/voice_commands.php');
				?>
				<!-- end voice command -->

				<!-- multiple lang dropdown : find all flags in the flags page -->
				<?php
				include('../../../includes/menus/language.php');
				?>
				<!-- end multiple lang -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<?php
		include('../../../includes/menus/main_menu.php');
		?>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->


			<!-- END RIBBON -->





			<!-- MAIN CONTENT -->
			<div id="content" style="margin-top: 50px; padding-top: 0px">


				<?php
				    include('../../../includes/sub_header.php')
					?>

			<div class="row" style="height: 50px; margin-top:20px">

					<div class="col-sm-12 col-lg-12 col-md-12 droid-arabic-kufi">
						<span style="font-size: 20px; color: black">

						<?php if($_SESSION['language']=='EN') { ?> <i class="fa fa-angle-double-right "></i> <?php }	else {  ?> <i class="fa fa-angle-double-left "></i> <?php } ?>




						<?php
						echo $vComplementaryPension;
							?>

							<span style="font-size: 12px">


							<?php if($_SESSION['language']=='EN') { ?> <i class="fa fa-angle-double-right "></i> <?php }	else {  ?> <i class="fa fa-angle-double-left "></i> <?php } ?>

							<?php
							echo $vCpMembersImport; 
							?>

							</span>

						</span>

					</div>

				</div>






	<?php
	$_SESSION['rto']=time();
	?>



				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						<a class="droid-arabic-kufi" href="template.csv"><?php echo $vDownloadTemplate; ?></a><br>
<br>

						<form action="upload.php" class="dropzone" id="mydropzone">


                        <input type="hidden" name="by_emp_id" value="<?php echo $_SESSION['MM_UsernameId'];?>">
                        <input name="time" type="hidden" id="object_id2" value="<?php echo $_SESSION['rto']; ?>">



                        <input style="display: none" class="form-control droid-arabic-kufi" id="title" name="desc" maxlength="40" placeholder="<?php echo $vWriteDescBeforUpload;?>" type="text">


					  </form>


                          </form>
					</div>



				</div>
                <a class="btn btn-lg btn-block droid-arabic-kufi" style="background-color: firebrick; color: white" href="files/import.php?s=1"><?php echo $vImportData;?></a>





				</div>
			<!-- END MAIN CONTENT -->









		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
			<?php
			include('../../../includes/menus/page_footer.php');
			?>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->

			<?php
			include('../../../includes/menus/shortcuts.php');
			?>

		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
			<?php
			include('../../../includes/menus/footer_scripts.php');
			?>

				<script src="<?php echo $server;?>html/js/plugin/dropzone/dropzone.min.js"></script>


        <script type="text/javascript">

		// DO NOT REMOVE : GLOBAL FUNCTIONS!

		$(document).ready(function() {

			pageSetUp();

			Dropzone.autoDiscover = false;
			$("#mydropzone").dropzone({
				//url: "/file/post",
				addRemoveLinks : true,
				//// in mb
				maxFilesize: 70.0,
				dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block" style="margin-top:0px"><span class="font-lg" style="margin-top:0%"><i class="fa fa-cloud" style="margin-top:0%"></i><h4 class="droid-arabic-kufi"> <?php echo $vDropFiles;?><br/><?php echo $vOrClick;?></h4></span><span>&nbsp&nbsp<h4 class="display-inline" style="margin-top:0%"></h4></span>',
				dictResponseError: 'Error uploading file!'
			});


		})

		</script>

	</body>

</html>
