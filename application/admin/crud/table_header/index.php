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
$cooo=$_SESSION['current_company'];


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include('code.php');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// End Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




$currentPage = $_SERVER["PHP_SELF"];


//// Choose this option for the main menu active selection ////
$main_function='main';
////



//// Select the CRUD Case /////
$case_id=$_GET['case_id'];
//$case_id='2';

mysqli_select_db($website,$database_website);
$query_crud_case = "SELECT * FROM crud_case WHERE crud_case_id='$case_id'";
$crud_case = mysqli_query($website , $query_crud_case) or die(mysqli_error($website));
$row_crud_case = mysqli_fetch_assoc($crud_case);
$totalRows_crud_case = mysqli_num_rows($crud_case);
//// end Select the CRUD Case /////

//// View Script (Table) /////
mysqli_select_db($website,$database_website);
//$query_view = "$row_crud_case[view_select_statement]";
$query_view = $insertSQL6;
$view = mysqli_query($website , $query_view) or die(mysqli_error($website));
$row_view = mysqli_fetch_assoc($view);
$totalRows_view = mysqli_num_rows($view);
//// end View Script (Table) /////


//// View Script (Table Fields) /////
mysqli_select_db($website,$database_website);
$query_table_header = "SELECT * FROM crud_table_header WHERE crud_case_id='$case_id' ORDER BY col_asc";
$table_header = mysqli_query($website , $query_table_header) or die(mysqli_error($website));
$row_table_header = mysqli_fetch_assoc($table_header);
$totalRows_table_header = mysqli_num_rows($table_header);
//// end View Script (Table Field) /////

//// View Current Record /////
$curr=$_GET['id'];
mysqli_select_db($website,$database_website);
$query_curr = $insertSQL7;
$curr = mysqli_query($website , $query_curr) or die(mysqli_error($website));
$row_curr = mysqli_fetch_assoc($curr);
$totalRows_curr = mysqli_num_rows($curr);
//// end View Script (Table) /////

//// Add Statement ////
if(isset($_GET['add']) || isset($_GET['duplicate']))
{

	if($_SESSION['language']=='AR')
	{
	//// STEP 1 : Edit the following line ---> ////
	 $insertSQL1=$insertSQL1;
	// $insertSQL1 = $row_crud_case[add_statement_ar];
	mysqli_select_db($website,$database_website);
    $Result1 = mysqli_query($website , $insertSQL1) or die(mysqli_error($website));
	}

	if($_SESSION['language']=='EN')
	{
	//// STEP 2 : Edit the following line ---> ////
	$insertSQL2=$insertSQL2;
	// $insertSQL2 = $row_crud_case[add_statement_en];
	mysqli_select_db($website,$database_website);
    $Result2 = mysqli_query($website , $insertSQL2) or die(mysqli_error($website));
	}


	echo '<script type="text/javascript">
           window.location = "index.php?case_id='.$_GET['case_id'].'&case_filter='.$_GET['case_filter'].'"
      </script>';
}
//// End Add Statement ////


//// Edit Statement ////
if(isset($_GET['edit']))
{

	if($_SESSION['language']=='AR')
	{
	$id=$_GET['id'];
	//// STEP 3 : Edit the following line ---> ////
	 $insertSQL3=$insertSQL3;
	// $insertSQL1 = $row_crud_case[add_statement_ar];
	mysqli_select_db($website,$database_website);
    $Result3 = mysqli_query($website , $insertSQL3) or die(mysqli_error($website));
	}

	if($_SESSION['language']=='EN')
	{
	$id=$_GET['id'];
	//// STEP 4 : Edit the following line ---> ////
	$insertSQL4=$insertSQL4;
	// $insertSQL2 = $row_crud_case[add_statement_en];
	mysqli_select_db($website,$database_website);
    $Result4 = mysqli_query($website , $insertSQL4) or die(mysqli_error($website));
	}


	echo '<script type="text/javascript">
           window.location = "index.php?case_id='.$_GET['case_id'].'&case_filter='.$_GET['case_filter'].'"
      </script>';
}
//// End Edit Statement ////

//// Delete Statement ////
if(isset($_GET['delete_now']))
{


	$id=$_GET['id'];
	//// STEP 5 : Edit the following line ---> ////
	 $insertSQL5=$insertSQL5;
	// $insertSQL1 = $row_crud_case[add_statement_ar];
	mysqli_select_db($website,$database_website);
    $Result5 = mysqli_query($website , $insertSQL5) or die(mysqli_error($website));

  	echo '<script type="text/javascript">
           window.location = "index.php?case_id='.$_GET['case_id'].'&case_filter='.$_GET['case_filter'].'"
      </script>';
}
//// End Delete Statement ////



?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../assets/header.php');
	//// end of header script ////
		?>


</head>
	<body style="height:100%">
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/">
						<figure style="height:100%">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" >
						<h1 style="height:100%"><?php echo $vSystemAdmin; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../../../assets/menus/header/system.php')
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
			<main class="main">
				<section class="control" class="control" style="background-Color:thistle ">
					<section class="action">
						<h1><span class="root"><?php
							//// Page Name ////
							if($_SESSION['language']=='AR') {
							echo $row_crud_case['crud_case_title'];
							}

							if($_SESSION['language']=='EN') {
							echo $row_crud_case['crud_case_title_en'];
							}
							?></span></h1>

							<fieldset>
								<a class="focus" href="?add_now=1&case_id=<?php echo $_GET['case_id']; ?>&case_filter=<?php echo $_GET['case_filter']; ?>&ref=" style="text-decoration:none;"><input type="submit" name="create" id="create" value="<?php echo $vAdd; ?>" class="focus" /></a>


							</fieldset>

					</section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>

<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
						<fieldset class="search">
                        <form target="_self" method="get">
							<input autofocus="autofocus" onfocus="this.select()" value="<?php if(isset($_GET['search'])) { echo $_GET['search']; }?>" class="arabic" name="search" type="text" id="search" placeholder="<?php echo $vSearchByPayroll ; ?>" style="background-color:thistle" />
						</form>
						</fieldset>
						<fieldset class="refine" <?php if($_SESSION['language']=='AR') { ?>style="margin-left:0px <?php } ?> ">
							<span style="font-size: 14px"><?php echo  $row_crud_case['case_code']; ?> </span>  &nbsp

<button id="filters"><i class="fas fa-filter"></i>Filters<i class="fas fa-caret-down"></i></button>
							<button id="group-by"><i class="fas fa-bars"></i>Group By<i class="fas fa-caret-down"></i></button>
							<button id="favourites"><i class="fas fa-star"></i>Favourites<i class="fas fa-caret-down"></i></button>
						</fieldset>
						<fieldset class="view">


							 <span class="">
								<a target="_blank" title="CASE EDIT" style="text-decoration: none" href="<?php echo $server; ?>application/admin/crud/?id=<?php echo $_GET['case_id']; ?>&edit_now=1&case_id=6&selected_case=&case_filter="  >
								 <button class="" id=""><i class="fa fa-cog"></i></button>
							 </a>
							 </span>


							 <span class="">
								<a title="CASE TABLE ROWS" style="text-decoration: none" href="<?php echo $server; ?>application/admin/crud/table_row/?case_id=8&id=<?php echo $_GET['id']; ?>&case_filter=<?php echo $_GET['case_id'] ;?>"  >
								 <button class="" id=""><i class="fa fa-th"></i></button>
							 </a>
							 </span>

							 <span class="">
								<a title="CASE TABLE HEADER" style="text-decoration: none" href="<?php echo $server; ?>application/admin/crud/table_header/?case_id=7&id=<?php echo $_GET['id']; ?>&case_filter=<?php echo $_GET['case_id'] ;?>"  >
								 <button class="" id=""><i class="fa fa-th-list"></i></button>
							 </a>
							 </span>

							 <span class="">
								<a title="CASE FORM" style="text-decoration: none" href="<?php echo $server; ?>application/admin/crud/form/?case_id=9&id=<?php echo $_GET['id']; ?>&case_filter=<?php echo $_GET['case_id'] ;?>"  >
								 <button class="" id=""><i class="fa fa-book-open"></i></button>
							 </a>
							 </span>


							 <span class="">
								<a title="VIEW CASE" style="text-decoration: none" href="?case_id=<?php echo $_GET['case_id']; ?>&case_filter=<?php echo $_GET['case_filter'] ; ?>">
								 <button class="" id=""><i class="fa fa-glasses"></i></button>
							 </a>
							 </span>


							 <span class="print">
								<a style="text-decoration: none">
								 <button class="" id="" onclick="window.history.back()"><i class="fas fa-angle-right" ></i></button>
							 </a>
							 </span>



							 <span class="print">
								<a href="<?php echo $server; ?>application/human_resource/compl_pension/reports/members/?report=1" target="_blank" >
								 <button class="" id=""><i class="fas fa-print"></i></button>
							 </a>
							 </span>



						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>


				<section class="body" style="height:100%">

				<?php
				//////////////////////////// Start Add Form Controls ////////////////////

					//// select the first control ////
				mysqli_select_db($website,$database_website);
				$query_add_1 = "SELECT * FROM crud_add_form WHERE crud_case_id='$case_id' ORDER BY field_asc LIMIT 0,1";
				$add_1 = mysqli_query($website , $query_add_1) or die(mysqli_error($website));
				$row_add_1 = mysqli_fetch_assoc($add_1);
				$totalRows_add_1 = mysqli_num_rows($add_1);

					//// select the second control ////
				mysqli_select_db($website,$database_website);
				$query_add_2 = "SELECT * FROM crud_add_form WHERE crud_case_id='$case_id' ORDER BY field_asc LIMIT 1,1";
				$add_2 = mysqli_query($website , $query_add_2) or die(mysqli_error($website));
				$row_add_2 = mysqli_fetch_assoc($add_2);
				$totalRows_add_2 = mysqli_num_rows($add_2);



						//// select the tabs ////
				mysqli_select_db($website,$database_website);
				$query_tab = "SELECT * FROM crud_add_form_tab WHERE crud_case_id='$case_id' ORDER BY crud_add_form_tab_asc";
				$tab = mysqli_query($website , $query_tab) or die(mysqli_error($website));
				$row_tab = mysqli_fetch_assoc($tab);
				$totalRows_tab = mysqli_num_rows($tab);

							//// select the tabs second time ////
				mysqli_select_db($website,$database_website);
				$query_tab2 = "SELECT * FROM crud_add_form_tab WHERE crud_case_id='$case_id' ORDER BY crud_add_form_tab_asc";
				$tab2 = mysqli_query($website , $query_tab2) or die(mysqli_error($website));
				$row_tab2 = mysqli_fetch_assoc($tab2);
				$totalRows_tab2 = mysqli_num_rows($tab2);

								//// select the tabs third time ////
				mysqli_select_db($website,$database_website);
				$query_tab3 = "SELECT * FROM crud_add_form_tab WHERE crud_case_id='$case_id' ORDER BY crud_add_form_tab_asc";
				$tab3 = mysqli_query($website , $query_tab3) or die(mysqli_error($website));
				$row_tab3 = mysqli_fetch_assoc($tab3);
				$totalRows_tab3 = mysqli_num_rows($tab3);

						//// select the remaining control of the selected TAB ////

				//////////////////////// End Add Forms Controls ////////////////////////
				?>


				<?php if(isset($_GET['add_now']) || isset($_GET['edit_now']) || isset($_GET['duplicate_now']))

				{
				?>
				<form  method="GET" target="_self" name="add">

						<input type="hidden" value="<?php echo $organization; ?>" name="organization">

						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
					<input type="hidden" name="case_id" value="<?php echo $_GET['case_id']; ?>">
					<input type="hidden" name="case_filter" value="<?php echo $_GET['case_filter']; ?>">


					<section class="employee-create">


						<section class="title">
							<?php if(isset($row_curr['photo']) && $row_curr['photo']<>"") { ?>
							<figure style="">
								<img src="file:///Macintosh HD/Applications/MAMP/assets/images/placeholder.png" />
							</figure>
							<?php } ?>
							<fieldset>
								<label for="name"><?php
								if($_SESSION['language']=='AR')
								{
								echo $row_add_1['title_ar'];
								}

								if($_SESSION['language']=='EN')
								{
								echo $row_add_1['title_en'];
								}
								?></label><br />
								<input  required name="<?php echo $row_add_1['field_name']; ?>" type="text" id="name" placeholder="<?php
								if($_SESSION['language']=='AR')
								{
								echo $row_add_1['title_ar'];
								}

								if($_SESSION['language']=='EN')
								{
								echo $row_add_1['title_en'];
								}
								?>" value="<?php if($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1' || $_GET['view_now']=='1') { if($_SESSION['language']=='AR') { echo $row_curr[$row_add_1['table_field_ar']]; } else { echo $row_curr[$row_add_1['table_field_en']]; } } ?>"/><br />


							  <input value="<?php if($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1' || $_GET['view_now']=='1') { if($_SESSION['language']=='AR') { echo $row_curr[$row_add_2['table_field_ar']]; } else { echo $row_curr[$row_add_2['table_field_en']]; } } ?>" required name="<?php echo $row_add_2['field_name']; ?>" type="text" id="part-time" placeholder="<?php
								if($_SESSION['language']=='AR')
								{
								echo $row_add_2['title_ar'];
								}

								if($_SESSION['language']=='EN')
								{
								echo $row_add_2['title_en'];
								}
								?>" />
							</fieldset>

							<div class="clear"></div>

						</section>

						<br>

						<div class="tabs">
							<?php if($row_crud_case['has_tabs']=='1') { ?>
  <div class="tab-button-outer">
    <ul id="tab-button">

		<?php

		do {



		?>
		<li><a href="#<?php echo $row_tab['crud_add_form_tab_id']; ?>"><h4><?php
			if($_SESSION['language']=='AR') {
			echo $row_tab['crud_add_form_tab_title_ar'];
			}
			if($_SESSION['language']=='EN') {
			echo $row_tab['crud_add_form_tab_title_en'];
			}
			?></h4></a></li>
		<?php } while ($row_tab = mysqli_fetch_assoc($tab)); ?>

    </ul>
  </div>
	<?php } ?>
	<?php if($row_crud_case['has_tabs']=='1') { ?>
  <div class="tab-select-outer">
    <select id="tab-select">
		<?php do { ?>
		<option value="#<?php echo $row_tab2['crud_add_form_tab_id']; ?>"><h4><?php if($_SESSION['language']=='AR') {
			echo $row_tab2['crud_add_form_tab_title_ar'];
			}
			if($_SESSION['language']=='EN') {
			echo $row_tab2['crud_add_form_tab_title_en'];
			} ?></h4></option>
		<?php } while ($row_tab2 = mysqli_fetch_assoc($tab2)); ?>

    </select>
  </div>
 <?php } ?>

<?php
//// preview the TABS records /////

$count='1';
do {
		//// select the reamaining controls ////
	  			if($row_crud_case['has_tabs']=='1')
					{

							$selected_tab=$row_tab3['crud_add_form_tab_id'];

							//// if the fisrt lab, scape forst two fields for the above labells and tects /////
							if($count=='1') {
							mysqli_select_db($website,$database_website);
							$query_add = "SELECT * FROM crud_add_form WHERE crud_case_id='$case_id' AND crud_add_form_tab_id='$selected_tab'  ORDER BY field_asc ASC LIMIT 2,1000";
							$add = mysqli_query($website , $query_add) or die(mysqli_error($website));
							$row_add = mysqli_fetch_assoc($add);
							$totalRows_add = mysqli_num_rows($add);
							}
							else
							{
							mysqli_select_db($website,$database_website);
							$query_add = "SELECT * FROM crud_add_form WHERE crud_case_id='$case_id' AND crud_add_form_tab_id='$selected_tab'  ORDER BY field_asc ASC LIMIT 0,1000";
							$add = mysqli_query($website , $query_add) or die(mysqli_error($website));
							$row_add = mysqli_fetch_assoc($add);
							$totalRows_add = mysqli_num_rows($add);
							}
				}
				else
				{
							//// if the fisrt lab, scape forst two fields for the above labells and tects /////
							if($count=='1') {
							mysqli_select_db($website,$database_website);
							$query_add = "SELECT * FROM crud_add_form WHERE crud_case_id='$case_id'  ORDER BY field_asc ASC LIMIT 2,1000";
							$add = mysqli_query($website , $query_add) or die(mysqli_error($website));
							$row_add = mysqli_fetch_assoc($add);
							$totalRows_add = mysqli_num_rows($add);
							}
							else
							{
							mysqli_select_db($website,$database_website);
							$query_add = "SELECT * FROM crud_add_form WHERE crud_case_id='$case_id'  ORDER BY field_asc ASC LIMIT 0,1000";
							$add = mysqli_query($website , $query_add) or die(mysqli_error($website));
							$row_add = mysqli_fetch_assoc($add);
							$totalRows_add = mysqli_num_rows($add);
							}
				}
?>
  <div id="<?php echo $row_tab3['crud_add_form_tab_id']; ?>" class="tab-contents" <?php if($row_crud_case['has_tabs']=='0') { ?>style="background-color: whitesmoke" <?php } ?>>


	  <section class="">
	    <main style="padding: 0px; margin: 4px">
			<section class="">


				<div class="row">

					<?php
					//// start the form controls loops ////
					do { ?>

<table   border="0" cellspacing="4" cellpadding="4" style=" margin-top: 3px; margin-bottom: : 3px" class="col-sm-<?php echo $row_add['title_width']+$row_add['field_width']; ?>">
  <tbody>
    <tr>

      <td class="col-sm-<?php echo $row_add['title_width']; ?>" style="padding-right: 10px; padding-left: 10px"><?php
				if($_SESSION['language']=='AR')
				{
				echo $row_add['title_ar'];
				}

				if($_SESSION['language']=='EN')
				{
				echo $row_add['title_en'];
				}
				?></td>
      <td class="col-sm-<?php echo $row_add['field_width']; ?>" style="padding-right: 10px; padding-left: 10px">


			<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
			<!-- ////////////////////////////////////// Start The form Control (1) (Text or Date ) /////////////////////////////////////////// -->
			<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
		  <?php if($row_add['field_type']=='date' || $row_add['field_type']=='text') { ?>
		<input value="<?php if($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1' || $_GET['view_now']=='1') { if($_SESSION['language']=='AR') { echo $row_curr[$row_add['table_field_ar']]; } else { echo $row_curr[$row_add['table_field_en']]; } } ?>" <?php if($row_add['locked']=='1') { ?> disabled <?php }  ?> placeholder="<?php if($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1' || $_GET['view_now']=='1') { if($_SESSION['language']=='AR') { echo $row_curr[$row_add['table_field_ar']]; } else { echo $row_curr[$row_add['table_field_en']]; } } ?>" <?php if($row_add['field_type']=='text') { ?>type="text"<?php } ?> <?php if($row_add['field_type']=='date') { ?>type="date"<?php } ?> id="name"  name="<?php echo $row_add['field_name']; ?>" style="width: 100%" class="text_hany"  <?php if($row_add['required']=='1') { ?> required <?php } ?>/>
		  <?php } ?>
		  	<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
			<!-- ////////////////////////////////////// End The form Control (1) (Text or Date ) /////////////////////////////////////////// -->
			<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

		  	<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// ->
			<!-- ////////////////////////////////////// Start The form Control (2) (Select) //////////////////////////////////////////////// -->
			<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<?php if($row_add['field_type']=='select') { ?>
				<select style="width:100%; height:30px" class="select2 select2-hidden-accessible droid-arabic-kufi col-md-6" tabindex="-1" aria-hidden="true" name="<?php echo $row_add['field_name']; ?>">

				<?php do { ?>

				<?php  ////// Start  Select recordset (select_table_id_field ,   select_table_en_field , select_table_ar_field)  ////
				$query_Recordset_select = "SELECT * FROM $row_add[select_table]";
				$Recordset_select = mysqli_query($website , $query_Recordset_select) or die(mysqli_error($website));
				$row_Recordset_select = mysqli_fetch_assoc($Recordset_select);
				$totalRows_Recordset_select = mysqli_num_rows($Recordset_select);
					////// End  Select recordset (select_table_id_field ,   select_table_en_field , select_table_ar_field)  ////
				?>

					<optgroup style="font-family: Tahoma, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana,' sans-serif'; font-size: 18px" class="droid-arabic-kufi" label="">
						<?php do { ?>

							<option <?php if($row_Recordset_select[$row_add['select_table_id_field']]==$row_curr[$row_add['table_field_ar']] || $row_Recordset_select[$row_add['select_table_id_field']]==$_GET['case_filter']) { ?>selected <?php } ?> style="font-weight: 100" class="droid-arabic-kufi" value="<?php echo $row_Recordset_select[$row_add['select_table_id_field']]; ?>"><?php if($_SESSION['language']=='AR') { echo $row_Recordset_select[$row_add['select_table_ar_field']]; } else { echo $row_Recordset_select[$row_add['select_table_en_field']]; } ?></option>

						<?php } while ($row_Recordset_select = mysqli_fetch_assoc($Recordset_select)); ?>
					 <?php } while ($row_Recordset_skill_group = mysqli_fetch_assoc($Recordset_skill_group)); ?>
					</optgroup>
				</select>
				<?php } ?>
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// End The form Control (2) (Select) ////////////////////////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// Start The form Control (3) (Files) for the update only ///////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<?php if(isset($_GET['edit_now'])) { ?>
				<?php if($row_add['field_type']=='files' && ($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1')) { ?>
				<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/?record_id=<?php echo $_GET['id']; ?>&control_id=<?php echo $row_add['crud_add_form_id'] ; ?>&object_id=<?php echo $_GET['id']; ?>&field=files&table=any', 'myPop1',600,500);" class="droid-arabic-kufi btn btn-success" style="color:white">
						<i class="fa fa-plus" style="color: white"></i>
						<?php echo $vUpload ; ?>
				</a>



				<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/preview/?record_id=<?php echo $_GET['id']; ?>&control_id=<?php echo $row_add['crud_add_form_id'] ; ?>&object_id=<?php echo $_GET['id']; ?>', 'myPop1',1000,900);" class="droid-arabic-kufi" style="color:white">
						<i class="fa fa-copy" style="color: black"></i>
				</a>

				<?php
				 }
				?>
				<?php } ?>
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// End The form Control (3) (Files) for the update only /////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////// Start The form Control (4) (Photo) for the update only 9999 for photo ////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<?php if(isset($_GET['edit_now'])) { ?>
				<?php if($row_add['field_type']=='photo' && ($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1')) { ?>
				<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/?record_id=<?php echo $_GET['id']; ?>&control_id=<?php echo '9999';  ?>&object_id=<?php echo $_GET['id']; ?>&table=<?php echo $table ; ?>&field=<?php echo $photo_field ; ?>&id_field=<?php echo $id_field ;?>', 'myPop1',600,500);" class="droid-arabic-kufi btn btn-success" style="color:white">
						<i class="fa fa-plus" style="color: white"></i>
						<?php echo $vUpload ; ?>
				</a>

				<?php if(isset($row_curr['photo']) && $row_curr['photo']<>"") { ?>
				<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/files/<?php echo $row_curr['photo']; ?>', 'myPop1',800,900);" class="droid-arabic-kufi" style="color:white">
						<i class="fa fa-image" style="color: black"></i>
				</a>
				<?php } ?>


				<?php } ?>
				<?php } ?>
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// End The form Control (4) (Photo) for the update only /////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


				<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// Start The form Control (5) (Document ) /////////////////////////////////////////// -->
				<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<?php if(isset($_GET['edit_now'])) { ?>
				<?php if($row_add['field_type']=='document' && ($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1')) { ?>
				<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/?record_id=<?php echo $_GET['id']; ?>&control_id=<?php echo '8888';  ?>&object_id=<?php echo $_GET['id']; ?>&table=<?php echo $table ; ?>&field=<?php echo $document_field ; ?>&id_field=<?php echo $id_field ;?>', 'myPop1',600,500);" class="droid-arabic-kufi btn btn-success" style="color:white">
						<i class="fa fa-plus" style="color: white"></i>
						<?php echo $vUpload ; ?>
				</a>

				<?php if(isset($row_curr['document']) && $row_curr['document']<>"") { ?>
				<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/files/<?php echo $row_curr['document']; ?>', 'myPop1',800,900);" class="droid-arabic-kufi" style="color:white">
						<i class="fa fa-file" style="color: black"></i>
				</a>
				<?php } ?>


				<?php } ?>
				<?php } ?>
				<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- /////////////////////////////////////// End The form Control (5) (Document ) //////////////////////////////////////////////// -->
				<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// Start The form Control (6) (summernote) //////////////////////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<?php if($row_add['field_type']=='summernote') { ?>
				<div>
				<textarea class="droid-arabic-kufi" id="summernote" name="<?php echo $row_add['field_name']; ?>" <?php if(!isset($_GET['view_now'])) { ?>cols="60" rows="100" <?php } else { ?> cols="10" rows="10" <?php  } ?>><?php
						if($_SESSION['language']=='AR') { echo $row_curr[$row_add['table_field_ar']]; } else { echo $row_curr[$row_add['table_field_en']]; }
					?></textarea>
					</div>



				<?php } ?>
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// End The form Control (6) (summernote) //////////////////////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// Start The form Control (7) (color) //////////////////////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<?php if($row_add['field_type']=='color') { ?>

				<input  class="form-control" value="<?php if($_GET['edit_now']=='1' || $_GET['duplicate_now']=='1' || $_GET['view_now']=='1') { if($_SESSION['language']=='AR') { echo $row_curr[$row_add['table_field_ar']]; } else { echo $row_curr[$row_add['table_field_en']]; } } ?>" style="font-family: inherit; font-weight: 100; height:30px" id="colorpicker-1" name="<?php echo $row_add['field_name']; ?>" placeholder="" type="text" autofocus="" <?php if($row_add['required']=='1') { ?> required <?php } ?>>

				<?php } ?>
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
				<!-- ////////////////////////////////////// End The form Control (7) (color) //////////////////////////////////////////////// -->
				<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->


		</td>

	  </tr>
 </tbody>
</table>

					<!-- The field label -->


				<?php } while ($row_add = mysqli_fetch_assoc($add)); ?>

				</div>

			</section>
		  </main>
	  </section>



  </div>
<?php
$count++;
} while ($row_tab3 = mysqli_fetch_assoc($tab3)); ?>





</div>

				<!-- ////////////////////////////////////// Start the Buttons /////////////////////////////////////////// -->

				<div class="" style="margin: 20px">



				<?php if(isset($_GET['add_now'])) {  ?>
				<input  style="margin-left: 0px; margin-right: 0px; background-color: #00a09d; color: white"  type="submit" name="<?php if($_GET['add_now']=='1') { ?>add<?php } ?>" value="<?php echo $vSubmit ; ?>" class="btn ">
				<?php } ?>

				<?php if(isset($_GET['duplicate_now'])) {  ?>
				<input  style="margin-left: 0px; margin-right: 0px; background-color: #00a09d; color: white"  type="submit" name="<?php if($_GET['duplicate_now']=='1') { ?>duplicate<?php } ?>" value="<?php echo $vDuplicate; ?>" class="btn ">
				<?php } ?>

				<?php if(isset($_GET['edit_now'])) {  ?>
				<input  style="margin-left: 00px; margin-right: 0px; background-color: #00a09d; color: white"  type="submit" name="<?php if($_GET['edit_now']=='1') { ?>edit<?php } ?>" value="<?php echo $vEdit; ?>" class="btn ">
				<?php } ?>




					</div>

				<!-- ////////////////////////////////////// End the Buttons /////////////////////////////////////////// -->

					</section>


					</form>
				<?php
				}
				?>


				<!-- //////////////////////////////////////////////// Start Table //////////////////////////////////////////////// -->
				<?php if(!isset($_GET['add_now']) && !isset($_GET['edit_now']) && !isset($_GET['duplicate_now']) && !isset($_GET['view_now']))
				{
				?>
				<section class="employee-create">

				<div class="" style="width: 100%; padding-left: 5px;  padding-right: 5px; padding:0px">

				<div class="table-responsive" id="testTable">

				<table style="border-width: 0px; margin-bottom: 0px" id="datatable_tabletools" class="table table-condensed table-striped table-bordered table-hover droid-arabic-kufi display" id="employees"  <?php if($_SESSION['language']=='AR') { ?> dir="rtl" <?php } ?>>

                	<!-- //////////////////////////////////////////////// Start Header //////////////////////////////////////////////// -->
                 	<thead>
                  		<tr  class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>>
                    		<th width="10" style="font-weight: 600" class="o_column_sortable">#</th>
								<?php do { ?>
								<td width="<?php echo $row_table_header["col_width"]; ?>" style=" font-weight: 600" class="o_column_sortable"><?php
								if($_SESSION['language']=='EN')
								{
								echo $row_table_header["col_title_en"];
								}

								if($_SESSION['language']=='AR')
								{
								echo $row_table_header["col_title_ar"];
								}
								?>
								</td>
								<?php
								} while ($row_table_header = mysqli_fetch_assoc($table_header));
								?>
							<th width="30%"  style=" font-weight: 600; min-width: 80" class="dont_print_me"></th>
                  		</tr>
                	</thead>
					<!-- //////////////////////////////////////////////// End Header //////////////////////////////////////////////// -->

					<!-- //////////////////////////////////////////////// Start Footer //////////////////////////////////////////////// -->

					<!-- //////////////////////////////////////////////// End Footer //////////////////////////////////////////////// -->

					<tbody>

                  <?php
				  $counter=1;

				  do {

				  ?>
                  <tr>
                    <td width="1%"  class="o_data_cell"><?php echo $counter; ?></td>

					  <?php
					  	///// View Script (Table Rows) /////
						mysqli_select_db($website,$database_website);
						$query_table_rows = "SELECT * FROM crud_table_rows WHERE crud_case_id='$case_id' ORDER BY row_asc";
						$table_rows = mysqli_query($website , $query_table_rows) or die(mysqli_error($website));
						$row_table_rows = mysqli_fetch_assoc($table_rows);
						$totalRows_table_rows = mysqli_num_rows($table_rows);
					  	///// end View Script (Table Rows) /////


					   //// View ID Record /////
						mysqli_select_db($website,$database_website);
						$query_table_rows_id = "SELECT * FROM crud_table_rows WHERE crud_case_id='$case_id' AND id_record='1'";
						$table_rows_id = mysqli_query($website , $query_table_rows_id) or die(mysqli_error($website));
						$row_table_rows_id = mysqli_fetch_assoc($table_rows_id);
						$totalRows_table_rows_id = mysqli_num_rows($table_rows_id);
						//// end View ID Record/////

					  ?>

					  <?php do {
					  /////// Start The Table Rows /////
					  ?>
					  <td class="o_data_cell">
						<?php
					  if($_SESSION['language']=='EN')
					  	{


							  if($row_table_rows['decimal_number']=='1')
							  {
							  ///////////////////////// If Decimal Field /////////////////////////////
							  echo  number_format($row_view[$row_table_rows['row_field_en']], 2, '.', ',');
							  }
							  else
							  {
							  //////////////////////////// If photo //////////////////////////////////
						  	  if($row_table_rows['photo']=='1')
					          		{
							  		?>
						  			<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/files/<?php echo $row_view['photo']; ?>', 'myPop1',800,900);" class="droid-arabic-kufi" style="color:white">

						  			<img src="<?php echo $server; ?>includes/upload/files/<?php echo $row_view['photo']; ?>" alt="" width="118" height="123">

						 			</a>
							  		<?php
							   		}
								  	else
									{
										if($row_table_rows['document']=='1')
										{
										///////////////////////// if Document /////////////////////////////
										?>
						  				<a  onclick="popupCenter('<?php echo $server; ?>includes/upload/files/<?php echo $row_view['document']; ?>', 'myPop1',800,900);">
										<?php echo $vView ; ?>
										<?php
							  			echo $row_view[$row_table_rows['document']];
										?>
						  				</a>
						  				<?php
										}
										else
										{
										///////////////////////// if other Fields /////////////////////////////
							  			echo $row_view[$row_table_rows['row_field_en']];
										}
							  		}
							  }
						}

						if($_SESSION['language']=='AR')
						{
							  if($row_table_rows['decimal_number']=='1')
							  {
							  ///////////////////////// If Decimal Field /////////////////////////
							  echo  number_format($row_view[$row_table_rows['row_field_ar']], 2, '.', ',');
							  }
							  else
							  {

								  	//////////////////////////// If photo //////////////////////////////////
								  	if($row_table_rows['photo']=='1')
									{
							  		?>
						  			<a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/files/<?php echo $row_view['photo']; ?>', 'myPop1',800,900);" class="droid-arabic-kufi" style="color:white">

							  		<img src="<?php echo $server; ?>includes/upload/files/<?php echo $row_view['photo']; ?>" alt="" width="118" height="123">

						  			</a>
							  		<?php
							   		}
								  	else
									{
										if($row_table_rows['document']=='1')
										{
										///////////////////////// if Document /////////////////////////////
										?>
						  				<a onclick="popupCenter('<?php echo $server; ?>includes/upload/files/<?php echo $row_view['document']; ?>', 'myPop1',800,900);">
										<?php echo $vView ; ?>
										<?php
							  			echo $row_view[$row_table_rows['document']];
										?>
						  				</a>
						  				<?php
										}
										else
										{
										///////////////////////// if other Fields /////////////////////////////
							  			echo $row_view[$row_table_rows['row_field_ar']];
										}
							  		}
							  }
						}
					  ?>
					  </td>
					   <?php
						 /////// End The Table Rows /////
						} while ($row_table_rows = mysqli_fetch_assoc($table_rows));
					  ?>


					  <!-- //////////////////////////////////////////////// Start The Butons //////////////////////////////////////////////// -->
					  <td style=" font-weight: 600; min-width: 90" class="dont_print_me">

							  <a href="?id=<?php echo $row_view[$row_table_rows_id['row_field_ar']]; ?>&edit_now=1&case_id=<?php echo $_GET['case_id']; ?>&selected_case=<?php echo $_GET['case_filter']; ?>&case_filter=<?php echo $_GET['case_filter'] ; ?>"><i class="fa fa-edit fa-1x"></i></a> &nbsp;

						   <a href="?id=<?php echo $row_view[$row_table_rows_id['row_field_ar']]; ?>&duplicate_now=1&case_id=<?php echo $_GET['case_id']; ?>&selected_case=<?php echo $_GET['id']; ?>&case_filter=<?php echo $_GET['case_filter'] ; ?>">
							<i class="fa fa-clone fa-1x"></i>
						  </a>

						  &nbsp;


						  <a onclick="return confirm('<?php echo $vDeleteMessage; ?>');" href="?id=<?php echo $row_view[$row_table_rows_id['row_field_ar']]; ?>&delete_now=1&case_id=<?php echo $_GET['case_id']; ?>&case_filter=<?php echo $_GET['case_filter'] ; ?>"><i class="fa fa-trash"></i></a></td>





						  <?php
					  		if($row_crud_case['has_sub_cases']=='1')
							{
					  	  ?>
						  <a  href="<?php echo $index; ?>?1=1&id=<?php echo $row_view[$row_table_rows_id['row_field_ar']]; ?>&view_now=1&case_id=<?php echo $case_id; ?>&has_sub_case=1<?php if(isset($_GET['case_filter'])) { ?>&case_filter=<?php echo $_GET['case_filter']; } ?>&ref=<?php

								if($_SESSION['language']=='AR')
								{
									echo $row_view['name_arabic'];
								}
								else
								{
									echo $row_view['name_english'];
								}

								   ?>"><i class="fa fa-search fa-1x" title"View Details"></i></a>

						  &nbsp; &nbsp;
						  <?php
							}
					  		?>


					  </td>
                   	  <!-- //////////////////////////////////////////////// End The Butons //////////////////////////////////////////////// -->





                  </tr>
                    <?php

					$counter++;
					 } while ($row_view = mysqli_fetch_assoc($view)); ?>




                </tbody>
              </table>
				</div>
				</div>

					</section>

				<?php
				}
				?>
				<!-- //////////////////////////////////////////////// End Table //////////////////////////////////////////////// -->


				<?php
				if(!isset($_GET['add_now']) &&  !isset($_GET['edit']))
				{
					?>

					<?php
				}
				?>

<br><br><br><br><br><br>


		</section>
	</body>
</html>
