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

$chart_page='1';

/// to not use the chat script ///
$this_is_pop='1';

$use_bootstrap='1';

mysqli_select_db($website,$database_website);


$fr=$_SESSION['current_company'];


$query_Recordset_jobCat = "SELECT * FROM a_category, a_main_box WHERE  (a_main_box.organization='$fr'  AND a_main_box.cat_id=a_category.cat_id) OR (a_category.cat_id='222') GROUP BY a_category.cat_id ORDER BY cat_name";
$Recordset_jobCat = mysqli_query($website , $query_Recordset_jobCat) or die(mysqli_error($website));
$row_Recordset_jobCat = mysqli_fetch_assoc($Recordset_jobCat);
$totalRows_Recordset_jobCat = mysqli_num_rows($Recordset_jobCat);
////
//// end recordsets ////


?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	 include('../../../../assets/header.php');
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

						 <link rel="stylesheet" href="../../../../assets/organization_chart/css/font-awesome.min.css">
				  <link rel="stylesheet" href="../../../../assets/organization_chart/css/jquery.orgchart3.css">
				  <link rel="stylesheet" href="../../../../assets/organization_chart/css/style.css">

		<style type="text/css">
.orgchart .linkNode {
  box-sizing: border-box;
  display: inline-block;
  position: relative;
  margin: 0;
  text-align: center;
  width: 130px;
}

.orgchart .linkNode .linkLine {
  background-color: rgba(217, 83, 79, 0.8);
  height: 50px;
  width: 2px;
  margin: 0 auto;
}
  </style>


		<style type="text/css">
    .orgchart { background: #fff; }
    .orgchart td.left, .orgchart td.right, .orgchart td.top { border-color: #aaa; }
    .orgchart td>.down { background-color: #aaa; }
    .orgchart .middle-level .title { background-color: cornflowerblue; }
    .orgchart .middle-level .content { border-color: cornflowerblue; }
    .orgchart .product-dept .title { background-color: #009933; }
    .orgchart .product-dept .content { border-color: #009933; }
    .orgchart .rd-dept .title { background-color: #993366; }
    .orgchart .rd-dept .content { border-color: #993366; }
    .orgchart .pipeline1 .title { background-color: #996633; }
    .orgchart .pipeline1 .content { border-color: #996633; }
    .orgchart .frontend1 .title { background-color: #cc0066; }
    .orgchart .frontend1 .content { border-color: #cc0066; }


			@media print {
body, html {
margin-top:0px;
padding-top:0px;
}
}


			@ media print{
body{
margin-top:0px;padding-top:0px;
}
}
  </style>
	</head>
	<body style="height:100%">
		<section class="employees">
			<header class="header dont_print_me">
				<nav class="sections" <?php if($_SESSION['language']=='AR') { echo 'style="direction:rtl"';} ?> >
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/organization/" >
						<h1 style="height: 100%;"><?php echo str_replace('ال', '', $vOrganizationSystem); ?></h1>
					</a>
						<ul <?php if($_SESSION['language']=='AR') { echo 'style="direction:rtl"';} ?>>
							<?php
							//// include organization header ////
							include('../../../../assets/menus/header/organization.php')
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
				<section class="control dont_print_me">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="../../organization/create" style="display:none">
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
										<div class="container" style="width: 100%">
										<!-- Start Content -->
										<?php

										 ?>
											<div class="row" style="height: 50px; margin-top:20px" class="dont_print_me">

					<div class="col-sm-12 col-lg-12 col-md-12 droid-arabic-kufi dont_print_me" style="text-align:right">


						<ul class="dont_print_me">


                            <form name="form" id="form">
                              <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)" class="droif-arabic-kufi" style="z-index: 1; position:relative">


                                <option value="index.php"><?php echo $vSelectJobCat; ?></option>

                                 <?php
							do {
							?>

                                <option <?php if($_GET['cat_id']==$row_Recordset_jobCat['cat_id']) { ?> selected <?php } ?> value="index.php?cat_id=<?php echo $row_Recordset_jobCat['cat_id']; ?>"><?php
								if($_SESSION['language']=='AR')
								{
								echo $row_Recordset_jobCat['cat_name'];
								}

								if($_SESSION['language']=='EN')
								{
								echo $row_Recordset_jobCat['cat_name_eng'];
								}
									?></option>

                                  <?php } while ($row_Recordset_jobCat = mysqli_fetch_assoc($Recordset_jobCat)); ?>



                              </select>
								<br>
								<a title="<?php echo $vSirstVerticalRow; ?>" onclick="popupCenter('edit_config/', 'myPop1',600,260);">	<i class="fa fa-cog" style="z-index: 1; position:relative"></i></a>

								<a title="<?php echo $vEdit; ?>" onclick="popupCenter('options/?cat_id=<?php echo $_GET['cat_id']; ?>&start=1', 'myPop1',600,760);">	<i class="fa fa-edit" style="z-index: 1; position:relative"></i></a>


								<a title="<?php echo $vAddJob; ?>" onclick="popupCenter('options/?cat_id=<?php echo $_GET['cat_id']; ?>&add_job=1', 'myPop1',600,760);">	<i class="fa fa-plus-circle" style="z-index: 1; position:relative"></i></a>


								<a title="<?php echo $vAddGroup; ?>" onclick="popupCenter('add_group/?cat_id=<?php echo $_GET['cat_id']; ?>&add_job=1', 'myPop1',600,760);">	<i class="fa fa-plus-circle" style="z-index: 1; position:relative"></i></a>


								<a title="<?php echo $vAddLevel; ?>" onclick="popupCenter('add_level/?cat_id=<?php echo $_GET['cat_id']; ?>', 'myPop1',600,760);">	<i class="fa fa-plus-square" style="z-index: 1; position:relative"></i></a>

								<a title="<?php echo $vPrint; ?>" onclick="window.print();return false;"><i class="fa fa-print" style="z-index: 1; position:relative"></i></a>

								<a title="<?php echo $vRefreshData; ?>" href="index.php?cat_id=<?php echo $_GET['cat_id']; ?>"><i class="fa fa-refresh" style="z-index: 1; position:relative"></i></a>

                            </form>





						</ul>


					</div>

				</div>



                                            <?php if(isset($_GET['cat_id'])) {
																							?>

				<div id="chart-container" dir="ltr" class="droid-arabic-kufi" style="height: 100%; margin-bottom: 0px; border-width:0px; margin-top: -100px; overflow-y:hidden; background-color:white"></div>


		<?php } ?>
										<!-- End Content -->
										</div>

										</section>

				</section>
			</main>
		</section>



<?php
$cat=$_GET['cat_id'];

												mysqli_select_db($website,$database_website);

												$query_Recordset_jobHeads = "SELECT * FROM a_sub_box, a_main_box WHERE active_not='0' AND a_sub_box.organization='$fr' AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='0' ";
												$Recordset_jobHeads = mysqli_query($website , $query_Recordset_jobHeads) or die(mysqli_error($website));
												$row_Recordset_jobHeads = mysqli_fetch_assoc($Recordset_jobHeads);
												$totalRows_Recordset_jobHeads = mysqli_num_rows($Recordset_jobHeads);

echo $row_Recordset_jobHeads['main_box_id'];




?>


		<!-- Your GOOGLE ANALYTICS CODE Below -->


			<script type="text/javascript" src="../../../../assets/organization_chart/js/jquery.min.js"></script>
			  <script type="text/javascript" src="../../../../assets/organization_chart/js/html2canvas.min.js"></script>
			<script type="text/javascript" src="../../../../assets/organization_chart/js/jspdf.min.js"></script>
  <script type="text/javascript" src="../../../../assets/organization_chart/js/jquery.orgchart.js"></script>

  <!-- the following reference is specific for IE -->
  <script type="text/javascript" src="https://cdn.rawgit.com/stefanpenner/es6-promise/master/dist/es6-promise.auto.min.js"></script>



  <script type="text/javascript">
    $(function() {

    var datascource = {
		<?php do {

			$a=$row_Recordset_jobHeads['sub_box_id'];
												$query_Recordset_jobHeadsE = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a'";
												$Recordset_jobHeadsE = mysqli_query($website , $query_Recordset_jobHeadsE) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE = mysqli_fetch_assoc($Recordset_jobHeadsE);
												$totalRows_Recordset_jobHeadsE = mysqli_num_rows($Recordset_jobHeadsE);


		?>
      'name': '<a style="color:white" href="index.php" class="divo"><?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE['shortname_ar']; } else { echo $row_Recordset_jobHeadsE['shortname_en']; } ?></a>',
      'title': '<a title="<?php echo $row_Recordset_jobHeads['sub_box_id']; ?>"   href="edit_job/?j=<?php echo $row_Recordset_jobHeads['sub_box_id']; ?>" ><?php  if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeads['sub_box_name']; } else { echo $row_Recordset_jobHeads['sub_box_name_en']; } ?></a>', 'className': 'middle-level',
      'children': [

		<?php
		//// start ////
		$h1=$row_Recordset_jobHeads['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads1 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h1' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads1 = mysqli_query($website , $query_Recordset_jobHeads1) or die(mysqli_error($website));
		$row_Recordset_jobHeads1 = mysqli_fetch_assoc($Recordset_jobHeads1);
		$totalRows_Recordset_jobHeads1 = mysqli_num_rows($Recordset_jobHeads1);


		if(isset($row_Recordset_jobHeads1['sub_box_id'])) {
		do  {

		    $a1=$row_Recordset_jobHeads1['sub_box_id'];
												$query_Recordset_jobHeadsE1 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a1'";
												$Recordset_jobHeadsE1 = mysqli_query($website , $query_Recordset_jobHeadsE1) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE1 = mysqli_fetch_assoc($Recordset_jobHeadsE1);
												$totalRows_Recordset_jobHeadsE1 = mysqli_num_rows($Recordset_jobHeadsE1);



		  ?>
        { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE1['shortname_ar']; } else { echo $row_Recordset_jobHeadsE1['shortname_en']; } ?>', 'title': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeads1['sub_box_name']; } else { echo $row_Recordset_jobHeads1['sub_box_name_en'];  } ?>', 'className': 'middle-level',
          'children': [

			  <?php
		//// start ////
		$h2=$row_Recordset_jobHeads1['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads2 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h2' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads2 = mysqli_query($website , $query_Recordset_jobHeads2) or die(mysqli_error($website));
		$row_Recordset_jobHeads2 = mysqli_fetch_assoc($Recordset_jobHeads2);
		$totalRows_Recordset_jobHeads2 = mysqli_num_rows($Recordset_jobHeads2);



		if(isset($row_Recordset_jobHeads2['sub_box_id'])) {
		do  {

			     $a2=$row_Recordset_jobHeads2['sub_box_id'];
												$query_Recordset_jobHeadsE2 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a2'";
												$Recordset_jobHeadsE2 = mysqli_query($website , $query_Recordset_jobHeadsE2) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE2 = mysqli_fetch_assoc($Recordset_jobHeadsE2);
												$totalRows_Recordset_jobHeadsE2 = mysqli_num_rows($Recordset_jobHeadsE2);
			  ?>

            { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE2['shortname_ar']; } else { echo $row_Recordset_jobHeadsE2['shortname_en']; } ?>', 'title': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeads2['sub_box_name']; } else { echo $row_Recordset_jobHeads2['sub_box_name_en']; } ?>',  'className': 'middle-level',
              'children': [

				  <?php
		//// start ////
		$h3=$row_Recordset_jobHeads2['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads3 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h3' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads3 = mysqli_query($website , $query_Recordset_jobHeads3) or die(mysqli_error($website));
		$row_Recordset_jobHeads3 = mysqli_fetch_assoc($Recordset_jobHeads3);
		$totalRows_Recordset_jobHeads3 = mysqli_num_rows($Recordset_jobHeads3);
		if(isset($row_Recordset_jobHeads3['sub_box_id'])) {
		do  {

				   $a3=$row_Recordset_jobHeads3['sub_box_id'];
												$query_Recordset_jobHeadsE3 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a3'";
												$Recordset_jobHeadsE3 = mysqli_query($website , $query_Recordset_jobHeadsE3) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE3 = mysqli_fetch_assoc($Recordset_jobHeadsE3);
												$totalRows_Recordset_jobHeadsE3 = mysqli_num_rows($Recordset_jobHeadsE3);

				  ?>

               { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE3['shortname_ar']; } else { echo $row_Recordset_jobHeadsE3['shortname_en']; } ?>', 'title': '<?php echo $row_Recordset_jobHeads3['sub_box_name']; ?>', 'className': 'middle-level',
              'children': [

				  <?php
		//// start ////
		$h4=$row_Recordset_jobHeads3['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads4 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h4' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads4 = mysqli_query($website , $query_Recordset_jobHeads4) or die(mysqli_error($website));
		$row_Recordset_jobHeads4 = mysqli_fetch_assoc($Recordset_jobHeads4);
		$totalRows_Recordset_jobHeads4 = mysqli_num_rows($Recordset_jobHeads4);
		if(isset($row_Recordset_jobHeads4['sub_box_id'])) {
		do  {

				     $a4=$row_Recordset_jobHeads4['sub_box_id'];
												$query_Recordset_jobHeadsE4 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a4'";
												$Recordset_jobHeadsE4 = mysqli_query($website , $query_Recordset_jobHeadsE4) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE4 = mysqli_fetch_assoc($Recordset_jobHeadsE4);
												$totalRows_Recordset_jobHeadsE4 = mysqli_num_rows($Recordset_jobHeadsE4);


				  ?>

                { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE4['shortname_ar']; } else { echo $row_Recordset_jobHeadsE4['shortname_en']; } ?>', 'title': '<?php echo $row_Recordset_jobHeads4['sub_box_name']; ?>',  'className': 'middle-level',
              'children': [

				  <?php
		//// start ////
		$h5=$row_Recordset_jobHeads4['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads5 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h5' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads5 = mysqli_query($website , $query_Recordset_jobHeads5) or die(mysqli_error($website));
		$row_Recordset_jobHeads5 = mysqli_fetch_assoc($Recordset_jobHeads5);
		$totalRows_Recordset_jobHeads5 = mysqli_num_rows($Recordset_jobHeads5);
		if(isset($row_Recordset_jobHeads5['sub_box_id'])) {
		do  {

				    $a5=$row_Recordset_jobHeads5['sub_box_id'];
												$query_Recordset_jobHeadsE5 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a5'";
												$Recordset_jobHeadsE5 = mysqli_query($website , $query_Recordset_jobHeadsE5) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE5 = mysqli_fetch_assoc($Recordset_jobHeadsE5);
												$totalRows_Recordset_jobHeadsE5 = mysqli_num_rows($Recordset_jobHeadsE5);

				  ?>

               { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE5['shortname_ar']; } else { echo $row_Recordset_jobHeadsE5['shortname_en']; } ?>', 'title': '<?php echo $row_Recordset_jobHeads5['sub_box_name']; ?>',  'className': 'middle-level',
              'children': [

				  <?php
		//// start ////
		$h6=$row_Recordset_jobHeads5['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads6 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h6' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads6 = mysqli_query($website , $query_Recordset_jobHeads6) or die(mysqli_error($website));
		$row_Recordset_jobHeads6 = mysqli_fetch_assoc($Recordset_jobHeads6);
		$totalRows_Recordset_jobHeads6 = mysqli_num_rows($Recordset_jobHeads6);
		if(isset($row_Recordset_jobHeads6['sub_box_id'])) {
		do  {

				      $a6=$row_Recordset_jobHeads6['sub_box_id'];
												$query_Recordset_jobHeadsE6 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a6'";
												$Recordset_jobHeadsE6 = mysqli_query($website , $query_Recordset_jobHeadsE6) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE6 = mysqli_fetch_assoc($Recordset_jobHeadsE6);
												$totalRows_Recordset_jobHeadsE6 = mysqli_num_rows($Recordset_jobHeadsE6);


				  ?>

                { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE6['shortname_ar']; } else { echo $row_Recordset_jobHeadsE6['shortname_en']; } ?>', 'title': '<?php echo $row_Recordset_jobHeads6['sub_box_name']; ?>',  'className': 'middle-level',
              'children': [

				  <?php
		//// start ////
		$h7=$row_Recordset_jobHeads6['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads7 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h7' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads7 = mysqli_query($website , $query_Recordset_jobHeads7) or die(mysqli_error($website));
		$row_Recordset_jobHeads7 = mysqli_fetch_assoc($Recordset_jobHeads7);
		$totalRows_Recordset_jobHeads7 = mysqli_num_rows($Recordset_jobHeads7);
		if(isset($row_Recordset_jobHeads7['sub_box_id'])) {
		do  {

				    $a7=$row_Recordset_jobHeads7['sub_box_id'];
												$query_Recordset_jobHeadsE7 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a7'";
												$Recordset_jobHeadsE7 = mysqli_query($website , $query_Recordset_jobHeadsE7) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE7 = mysqli_fetch_assoc($Recordset_jobHeadsE7);
												$totalRows_Recordset_jobHeadsE7 = mysqli_num_rows($Recordset_jobHeadsE7);
				  ?>

                { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE7['shortname_ar']; } else { echo $row_Recordset_jobHeadsE7['shortname_en']; } ?>', 'title': '<?php echo $row_Recordset_jobHeads7['sub_box_name']; ?>',  'className': 'middle-level',
              'children': [

				  <?php
		//// start ////
		$h8=$row_Recordset_jobHeads7['sub_box_id'];

		mysqli_select_db($website,$database_website);

		$query_Recordset_jobHeads8 = "SELECT * FROM a_sub_box, a_main_box , a_job_degree WHERE active_not='0' AND a_sub_box.organization='$fr' AND a_job_degree.j_d_id=a_main_box.j_d_id AND  a_sub_box.main_box_id=a_main_box.main_box_id AND a_main_box.cat_id='$cat' AND a_sub_box.sub_box_id_p='$h8' ORDER BY a_job_degree.job_level";
		$Recordset_jobHeads8 = mysqli_query($website , $query_Recordset_jobHeads8) or die(mysqli_error($website));
		$row_Recordset_jobHeads8 = mysqli_fetch_assoc($Recordset_jobHeads8);
		$totalRows_Recordset_jobHeads8 = mysqli_num_rows($Recordset_jobHeads8);
		if(isset($row_Recordset_jobHeads7['sub_box_id'])) {
		do  {

				      $a8=$row_Recordset_jobHeads8['sub_box_id'];
												$query_Recordset_jobHeadsE8 = "SELECT * FROM a_job_trans, employee  WHERE a_job_trans.indicator='2' AND employee.national_id_card_no =a_job_trans.national_id_card_no AND a_job_trans.organization='$fr' AND a_job_trans.sub_box_id='$a8'";
												$Recordset_jobHeadsE8 = mysqli_query($website , $query_Recordset_jobHeadsE8) or die(mysqli_error($website));
												$row_Recordset_jobHeadsE8 = mysqli_fetch_assoc($Recordset_jobHeadsE8);
												$totalRows_Recordset_jobHeadsE8 = mysqli_num_rows($Recordset_jobHeadsE8);
				  ?>

                { 'name': '<?php if($_SESSION['language']=='AR') { echo $row_Recordset_jobHeadsE8['shortname_ar']; } else { echo $row_Recordset_jobHeadsE8['shortname_en']; } ?>', 'title': '<?php echo $row_Recordset_jobHeads8['sub_box_name']; ?>', 'className': 'middle-level',   },

		<?php } while ($row_Recordset_jobHeads8 = mysqli_fetch_assoc($Recordset_jobHeads8));  } ?>
              ]
            },

		<?php } while ($row_Recordset_jobHeads7 = mysqli_fetch_assoc($Recordset_jobHeads7));  } ?>
              ]
            },

		<?php } while ($row_Recordset_jobHeads6 = mysqli_fetch_assoc($Recordset_jobHeads6));  } ?>
              ]
            },

		<?php } while ($row_Recordset_jobHeads5 = mysqli_fetch_assoc($Recordset_jobHeads5));  } ?>
              ]
            },

		<?php } while ($row_Recordset_jobHeads4 = mysqli_fetch_assoc($Recordset_jobHeads4));  } ?>
              ]
            },

		<?php } while ($row_Recordset_jobHeads3 = mysqli_fetch_assoc($Recordset_jobHeads3));  } ?>
              ]
            },
			  <?php } while ($row_Recordset_jobHeads2 = mysqli_fetch_assoc($Recordset_jobHeads2));  } ?>
          ]
        },
		<?php
			} while ($row_Recordset_jobHeads1 = mysqli_fetch_assoc($Recordset_jobHeads1));  } ?>


		   <?php } while ($row_Recordset_jobHeads = mysqli_fetch_assoc($Recordset_jobHeads));  ?>

      ]
    };

   $('#chart-container').orgchart({
      'data' : datascource,
      'nodeContent': 'title',
      'verticalLevel': <?php echo $row_current_company['org_vert_level']; ?>,
      'exportFilename': 'MyOrgChart'
    });

  });
  </script>

	</body>
</html>
