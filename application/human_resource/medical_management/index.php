<?php require_once('../../../Connections/localhost_i.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
        break;
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
mysqli_select_db($localhost_i,$database_localhost );
$query_drugs = "SELECT COUNT(med_drugs.med_drugs_id) AS TOTAL_DRUGS FROM med_drugs";
$drugs = mysqli_query($localhost_i,$query_drugs) or die(mysqli_error());
$row_drugs = mysqli_fetch_assoc($drugs);
$totalRows_drugs = mysqli_num_rows($drugs);

mysqli_select_db($localhost_i,$database_localhost );
$query_clinics = "SELECT COUNT(med_clinics.med_clinics_id) AS TOTAL_CLINICS FROM med_clinics";
$clinics = mysqli_query($localhost_i,$query_clinics) or die(mysqli_error());
$row_clinics = mysqli_fetch_assoc($clinics);
$totalRows_clinics = mysqli_num_rows($clinics);

mysqli_select_db($localhost_i,$database_localhost );
$query_clinics3 = "SELECT COUNT(med_records.med_records_id) AS TOTAL_CASES FROM med_records";
$clinics3 = mysqli_query($localhost_i,$query_clinics3) or die(mysqli_error());
$row_clinics3 = mysqli_fetch_assoc($clinics3);
$totalRows_clinics3 = mysqli_num_rows($clinics3);



mysqli_select_db($localhost_i,$database_localhost );
$query_doctors = "SELECT COUNT(med_doctors.med_doctor_id) AS TOTAL_DOCTORS FROM med_doctors";
$doctors = mysqli_query($localhost_i,$query_doctors) or die(mysqli_error());
$row_doctors = mysqli_fetch_assoc($doctors);
$totalRows_doctors = mysqli_num_rows($doctors);

//// include config script ////
include('../../../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../../assets/languages/english.php');
}
//// End Language ////


$use_bootstrap='1';


mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT COUNT(employee_id) AS TOTAL_MEMBERS FROM employee WHERE organization='$organization'";
$Recordset1 = mysqli_query($website ,$query_Recordset1) or die(mysqli_error($Recordset1));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
//// End of include the settings table ///


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../assets/header.php');
	//// end of header script ////
		?>

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
					<a href="<?php echo $server; ?>application/human_resource/medical_management/" >
						<h1 style="height: 100%;"><?php echo str_replace('ال', '', $vMedicalSystem); ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../../assets/menus/header/medical_management.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../../assets/menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="create" style="display:none">
							<fieldset>
								<input type="submit" name="create" id="create" value="CREATE" class="focus" />
								<input type="submit" name="import" id="import" value="IMPORT" class="no-focus" />
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



										<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
										<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
										<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
										<!------ Include the above in your HEAD tag ---------->

										<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

										<section>
										<div class="container">


												<div class="row mbr-justify-content-center">

										            <div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fa-users fa"></span>
										                    </div>
										                    <div class="text-wrap vcenter">
										                        <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="<?php echo $server; ?>application/go/?page=med010" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vEmployees ; ?> (<?php echo $row_Recordset1['TOTAL_MEMBERS'];?>)</span></a></h1>

										                    </div>
										                </div>
										            </div>

													<div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fa-user-md fa"></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="saving_installments/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vDoctors ; ?> (<?php echo $row_doctors['TOTAL_DOCTORS']; ?>)</span></a></h1>

										                    </div>
										                </div>
										            </div>


										            <div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-briefcase-medical "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="saving_installments/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vClinics ; ?> (<?php echo $row_clinics['TOTAL_CLINICS']; ?>)</span></a></h1>

										                    </div>
										                </div>
										            </div>

													  <div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-capsules "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">
																						<a href="<?php echo $server; ?>application/go/?page=med020" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vDrugs ; ?> (<?php echo $row_drugs['TOTAL_DRUGS']; ?>)</span></a>
																					</h1>

										                    </div>
										                </div>
										            </div>



													<div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-notes-medical "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="<?php echo $server; ?>application/go/?page=med060" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vMedicalCases ; ?> (<?php echo $row_clinics3['TOTAL_CASES'];?>)</span></a></h1>

										                    </div>
										                </div>
										            </div>

													 <div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-hospital-alt "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="saving_installments/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vMedicalEntities ; ?> (<?php echo $row_Recordset2['TOTAL_PERIODS'];?>)</span></a></h1>

										                    </div>
										                </div>
										            </div>


													 <div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-medkit "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="saving_installments/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vPharmacies ; ?> (<?php echo $row_Recordset2['TOTAL_PERIODS'];?>)</span></a></h1>

										                    </div>
										                </div>
										            </div>


													<div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-briefcase "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="<?php echo $server; ?>application/go/?page=med030" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vMedicalBenefits ; ?> (<?php echo $row_Recordset2['TOTAL_PERIODS'];?>)</span></a></h1>

										                    </div>
										                </div>
										            </div>




                                                     <div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-user "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">
																						<a href="<?php echo $server; ?>application/go/?page=med070" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vPersonalTreatment ; ?> </span></a>
																					</h1>

										                    </div>
										                </div>
										            </div>


                                                    <div class="col-lg-3 mbr-col-md-3">
										                <div class="wrap">
										                    <div class="ico-wrap">
										                        <span style="color:white" class="mbr-iconfont fas fa-child "></span>
										                    </div>
										                    <div class="text-wrap vcenter">
																					<h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">
																						<a href="<?php echo $server; ?>application/go/?page=med080" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vFamilyTreatment ; ?> </span></a>
																					</h1>

										                    </div>
										                </div>
										            </div>










										        </div>

										</div>

										</section>

				</section>
			</main>
		</section>
	</body>
</html>
<?php
mysqli_free_result($drugs);

mysqli_free_result($clinics);

mysqli_free_result($doctors);
?>
