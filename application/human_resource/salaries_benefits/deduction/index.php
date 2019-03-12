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


///// Include news records ////
/// start query
//// End of include the settings table ///


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../assets/header.php');
	//// end of header script ////
		?>
        <style>.wrap{height: 85px}</style>
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
					<a href="<?php echo $server; ?>application/human_resource/salaries_benefits/" >
						<h1 style="height: 100%;"><?php echo str_replace('ال', '', $vSalaries); ?></h1>
					</a>
						<ul>
							<?php
							//// include salaries_benefits header ////
							include('../../../../assets/menus/header/salaries_benefits.php')
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
						<h1><?php echo  $vDeduction; ?></h1>
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



										<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
										<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
										<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
										<!------ Include the above in your HEAD tag ---------->

										<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

										<section>
										<div class="container">
                                            <!--start content-->

                                            <div class="row mbr-justify-content-center">

                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-hand-holding-usd fas"</span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="predecessor/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vPredecessor; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-file-invoice-dollar fas"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="work_earning_tax/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vWorkEarningTax; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-save far"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="saving_installment/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vSavingInstallment; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-credit-card fa"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="installments_period/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vInstallmentsPeriod; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-angle-up fa"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="max_insurance_amount/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vMaxInsuranceAmount ; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-notes-medical fas"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="social_insurance/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vSocialInsurance; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-plus-square fa"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="family_treatment/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vFamilyTreatment; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-folder-open fa"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="saving_systems/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vSavingSystems; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 mbr-col-md-6">
                                                    <div class="wrap">
                                                        <div class="ico-wrap">
                                                            <span style="color:white" class="mbr-iconfont fa-cogs fa"></span>
                                                        </div>
                                                        <div class="text-wrap vcenter">
                                                            <h1 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5"> <a href="settings/" style="color:white"><span class="arabic" style="font-size:20px"><?php echo $vSettings; ?> </span></a></h1>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <!--end content-->
                                        </div>

										</section>

				</section>
			</main>
		</section>
	</body>
</html>
