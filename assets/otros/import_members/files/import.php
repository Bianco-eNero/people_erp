<?php
//// Include Connection ////
include('../../../../Connections/eogm.php');
//// End Connection ////


//// Include General Variables ////
include('../../../../includes/settings.php');
//// End General Variables ////


//// Include Language ////
include('../../../../includes/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../../../includes/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../../../includes/languages/english.php');
}
//// End Language ////


session_start();



$currentPage = $_SERVER["PHP_SELF"];


//// Choose this option for the main menu active selection ////
$main_function='main';
////


//// redirect to register if not logged in ////
//// redirect to register if not logged in ////
include ('../../../../includes/redirect_non_members.php');


  //// end redirect to register if not logged in ////
//// start recordsets /////

//// end recordsets ////

?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php
		//// include Head Styles ////
		include ('../../../../includes/head.php');
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
				<span id="logo"> <a href="<?php echo $server; ?>"><img src="<?php echo $server; ?>images/<?php echo $_SESSION['../current_company']; ?>.png" alt="<?php echo $ApplicationTitle; ?>"> </a></span>	<!-- END LOGO PLACEHOLDER -->



					<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
					<?php
					include('../../../../includes/menus/notifications.php');
					?>

					<!-- footer: refresh area -->
					<?php
		//		include('../../../../includes/menus/footer.php');
				?>
					<!-- end footer -->

				<!-- END AJAX-DROPDOWN -->
			</div>

			<!-- projects dropdown -->
				<?php
				include('../../../../includes/menus/projects.php');
				?>
			<!-- end projects dropdown -->

			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<?php
				include('../../../../includes/menus/collapse_menu_button.php');
				?>
				<!-- end collapse menu -->

				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<?php
				include('../../../../includes/menus/top_menu_profile.php');
				?>
				<!-- logout button -->
				<?php
				include('../../../../includes/menus/logout_button.php');
				?>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<?php
				include('../../../../includes/menus/search_mobile.php');
				?>
				<!-- end search mobile button -->

				<!-- input: search field -->
				<?php
				include('../../../../includes/menus/search.php');
				?>
				<!-- end input: search field -->

				<!-- fullscreen button -->
				<?php
				include('../../../../includes/menus/full_screen.php');
				?>
				<!-- end fullscreen button -->

				<!-- #Voice Command: Start Speech -->
				<?php
				include('../../../../includes/menus/voice_commands.php');
				?>
				<!-- end voice command -->

				<!-- multiple lang dropdown : find all flags in the flags page -->
				<?php
				include('../../../../includes/menus/language.php');
				?>
				<!-- end multiple lang -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<?php
		include('../../../../includes/menus/main_menu.php');
		?>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->


			<!-- END RIBBON -->





			<!-- MAIN CONTENT -->
			<div id="content" style="margin-top: 50px; padding-top: 0px">


				<?php
				    include('../../../../includes/sub_header.php')
					?>

			<div class="row" style="height: 50px; margin-top:20px">

					<div class="col-sm-12 col-lg-12 col-md-12 droid-arabic-kufi">
						<span style="font-size: 20px; color: black">
						<?php if($_SESSION['language']=='EN') { ?> <i class="fa fa-angle-double-right "></i> <?php }	else {  ?> <i class="fa fa-angle-double-left "></i> <?php } ?>   <?php
						echo $vHome;
							?>



							<span style="font-size: 12px">


							<?php if($_SESSION['language']=='EN') { ?> <i class="fa fa-angle-double-right "></i> <?php }	else {  ?> <i class="fa fa-angle-double-left "></i> <?php } ?>

							<?php
							echo $vCpCurrentMembers;
							?>




							</span>


						</span>

					</div>

				</div>


				<?php
		if(isset($_GET['s']))
		{
		$targetFile2=$_SESSION['rto'].'.csv';
	$patch=$_SESSION['rto'];

	//echo $targetFile2;
	$targetFile2= $_SESSION['rto'].'.csv';
//echo $_SESSION['rto'].'.csv';
$query = "LOAD DATA LOCAL INFILE '$targetFile2' INTO TABLE employee FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES (national_id_card_no,name_arabic,employee_id,cp_number,cp_company_code,birth_date,sector_join_date,company_join_date) SET cp_patch_id  = $patch";


$result = mysqli_query($eogm , $query)  or die(_ERROR15.": ".mysqli_error($eogm));



			$co_id=$_SESSION['current_company'];




			//// insert into patch record files ///

			 $sql = "insert into cp_patch_salaries (cp_patch_salaries , organization) values ('$patch' , '$co_id')";

    $result = mysqli_query($eogm , $sql) or die ("Could not insert data into DB: " . mysqli_error($eogm));




//// update the employees records ////


mysqli_select_db($eogm,$database_eogm);
$query_employee7 = "SELECT * FROM employee WHERE organization='$co_id'";
$employee7 = mysqli_query($eogm , $query_employee7) or die(mysqli_error($eogm));
$row_employee7 = mysqli_fetch_assoc($employee7);
//$totalRows_employee7 = mysqli_num_rows($employee7);



			do {

				$fffff=	$row_employee7['national_id_card_no'];
				$patch=$_SESSION['rto'];


				mysqli_select_db($eogm,$database_eogm);
$query_employee7a = "SELECT * FROM cp_patch_employee_salary WHERE national_id_card_no='$fffff' AND cp_patch_salaries_id='$patch'";
$employee7a = mysqli_query($eogm , $query_employee7a) or die(mysqli_error($eogm));
$row_employee7a = mysqli_fetch_assoc($employee7a);


				$basic=$row_employee7a['cp_basic_salary_total_last_july'];
					$production=$row_employee7a['current_production_inc_le'];
					$increases=$row_employee7a['total_excluded_increases_le'];




				$insertSQL = sprintf("UPDATE employee SET cp_basic_salary_total_last_july=%s, current_production_inc_le=%s, total_excluded_increases_le=%s WHERE national_id_card_no=%s",
					   GetSQLValueString($basic, "double"),
									 GetSQLValueString($production, "double"),
									 GetSQLValueString($increases, "double"),
					  GetSQLValueString($fffff, "int"));

  mysqli_select_db($eogm,$database_eogm);
  $Result1 = mysqli_query($eogm , $insertSQL) or die(mysqli_error($eogm));



    } while ($row_employee7 = mysqli_fetch_assoc($employee7));


			////


		?>
        <script>
		 window.location.href = "../";

    exit();
		</script>
        <?php

		}
?>



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

			<?php
			include('../../../../includes/menus/shortcuts.php');
			?>

		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
			<?php
			include('../../../../includes/menus/footer_scripts.php');
			?>

	</body>

</html>
