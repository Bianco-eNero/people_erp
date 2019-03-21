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

if ( isset($_GET['id']) ){
    $id=$_GET['id'];
}else{
    header('Location: http://people.benegypt.com/application/human_resource/personnel/employees/');
    exit();
}

$use_bootstrap='1';


///// Include news records ////
$search=$_GET['search'];
$cooo=$_SESSION['current_company'];

mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT * FROM employee WHERE organization='$organization' AND employee_id LIKE '%$search%' AND organization='$cooo' AND employee_id='$id' ORDER BY employee_id";
$Recordset1 = mysqli_query($website ,$query_Recordset1) or die(mysqli_error($Recordset1));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
//// End of include the settings table ///
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    //// include header script ////
    include('../../../../../assets/header.php');
    include('../../../../../assets/header_smart.php');
    //// end of header script ////
    ?>

    <script type="text/javascript">
        <!--
        function MM_jumpMenu2(targ,selObj,restore){ //v3.0
            eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
            if (restore) selObj.selectedIndex=0;
        }
        //-->
    </script>
    <style>
        *{font-weight: 100}
        th{text-align: center}
        ul{list-style: none}
        i{color:#a2a2a2}
        .btn-primary{background: #875a7b;}
        .container_{padding: 10px; }
        #content{ background: #ffffff;border: 1px #dedede solid; padding: 10px; }
        .txt-color-blueLight{font-weight: bold;color: #a2a2a2!important;}
        .filled-title{font-weight: bold}
        .tab-pane{ background: #ffffff}
        .tab-color { background: #fff;border: 1px solid #e2e2e2;padding: 5px 10px; }
        span.filled-title { font-weight: bold;font-size: 15px; }
        .s2 { color: #D14; }
        .c1 { color: #998;font-style: italic;}
        .mi { color: #099; }
    </style>
    <script>
        $(document).ready(function(){
           var accordionIcons = {
                header: "fa fa-plus",       // custom icon class
                activeHeader: "fa fa-minus" // custom icon class
            };

            $("#accordion").accordion({
                autoHeight : false,
                heightStyle : "content",
                collapsible : true,
                animate : 300,
                icons: accordionIcons,
                header : "h4"
            });
            $(".tab-link").click(function(){
                $(this).each(function(){
                    $(this).removeClass('active');
                });
            });
        });
    </script>
</head>
<body style="height:100%;">
<section class="employees">
    <header class="header">
        <nav class="sections">
            <a href="<?php echo $server; ?>application/">
                <figure style="height:100%">
                    <i class="fas fa-th"></i>
                </figure>
            </a>
            <a href="<?php echo $server; ?>application/human_resource/personnel" >
                <h1 style="height:100%"><?php echo str_replace('ال', '', $vEmployees ); ?></h1>
            </a>
            <ul>
                <?php
                //// include compl pnsion header ////
                include('../../../../../assets/menus/header/personnel.php')
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
    <main class="main">
        <section class="control">
            <section class="action">
                <h1><span class="root"><ol class="breadcrumb" style="background: none">
                        <li><a href="<?php echo $server; ?>application/human_resource/personnel" style="font-weight: bold;color: #875a7b;"><?php echo str_replace('ال', '', $vEmployees ); ?></a></li>
                        <li class="active"><?php echo str_replace('ال', '', $vEmployeeData ); ?></li>
                    </ol></span></h1>

                <fieldset style="display: none">
                    <a class="focus" href="add/" style="text-decoration:none;"><input type="submit" name="create" id="create" value="<?php echo $vAdd; ?>" class="focus" /></a>

                    <a class="focus" href="update_salary_data/" style="text-decoration:none;"><input type="submit" name="create" id="create" value="<?php echo $vUpdateTheSalary; ?>" class="focus" /></a>

                    <a class="focus" href="import_employees_data/" style="text-decoration:none;"><input type="submit" name="create" id="create" value="<?php echo $vImportEmployeesData; ?>" class="focus" /></a>
                </fieldset>

            </section>
            <section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
                <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>

            <section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
                <fieldset class="search">
                    <form target="_self" method="get">
                        <input autofocus="autofocus" onfocus="this.select()" value="<?php if(isset($_GET['search'])) { echo $_GET['search']; }?>" class="arabic" name="search" type="text" id="search" placeholder="<?php echo $vSearchByPayroll ; ?>" />
                    </form>
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
                    <span class="print">
								<a href="#" target="_blank" >
								 <button class="" id=""><i class="fas fa-print"></i></button>
							 </a>
							 </span>
                </fieldset>
                <div class="clear"></div>
            </section>
            <div class="clear"></div>
        </section>
        <section class="body">





            <section>
                <div class="container_">
                    <!-- Start Content -->
                    <div id="content" >


                        <!-- widget content -->
                        <div class="widget-body">
                            <div class="row padding-10">
                                <div class="col-md-3" style="<?php if($_SESSION['language']=='AR') { echo 'float:right;'; }?>">
                                    <img src="../../../../../../assets/images/emp_pics/<?php echo $row_Recordset1['employee_id']; ?>.bmp" width="120" height="135" alt="<?php echo $row_Recordset1['name_english']?>" class="thumbnail" style="display: block;margin:10px auto"/>
                                    <!--start side navbar-->
                                    <div  style="width: 100%;<?php if($_SESSION['language']=='AR') { echo 'float:right;'; }?>">
                                        <div id="accordion" class="ui-accordion ui-widget ui-helper-reset" role="tablist">
                                            <div>
                                                <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-accordion-accordion-header-0" aria-controls="ui-accordion-accordion-panel-0" aria-selected="false" tabindex="0"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vBasicBata ;?></h4>
                                                <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-0" aria-labelledby="ui-accordion-accordion-header-0" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                    <ul>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-basic" data-toggle="tab" style="color: #000!important;"><i class="fas fa-puzzle-piece fa-fw"></i> <?php echo $vPersonalData2 ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-familymember" data-toggle="tab" style="color: #000!important;"><i class="fas fa-user fa-fw"></i> <?php echo  $vFamilyData;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-military" data-toggle="tab" style="color: #000!important;"><i class="fa fa-fighter-jet fa-fw"></i> <?php echo  $vMilitaryStatus;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-educational" data-toggle="tab" style="color: #000!important;"><i class="fas fa-graduation-cap fa-fw"></i> <?php echo  $vEducationalCertificates;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-contactBata" data-toggle="tab" style="color: #000!important;"><i class="fas fa-phone fa-fw"></i> <?php echo  $vContactBata;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-visa" data-toggle="tab" style="color: #000!important;"><i class="fas fa-star fa-fw"></i> <?php echo  $vVisasAndWorPerms;?></a></li>
                                                    </ul>
                                                </div>

                                                <?php if ($_GET['funds'] >0 ){ ?>
                                                    <div>
                                                        <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-1" aria-controls="ui-accordion-accordion-panel-1" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vSavingsFunds ;?></h4>
                                                        <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-1" aria-labelledby="ui-accordion-accordion-header-1" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                            <ul>
                                                                <li class="tab-link" style="<?php if ($_GET['funds'] ==1 ){ echo 'display:block;'; }else{ echo 'display:none;';}?>padding: 4px;"><a href="#tab-complementaryPensionData" data-toggle="tab" style="color: #000!important;"><i class="fas fa-users fa-fw"></i> <?php echo $vComplementaryPensionData ;?></a></li>
                                                                <li class="tab-link" style="<?php if ($_GET['funds'] ==2 ){ echo 'display:block;'; }else{ echo 'display:none;';}?>padding: 4px;"><a href="#tab-savingInsurance" data-toggle="tab" style="color: #000!important;"><i class="fas fa-leaf fa-fw"></i> <?php echo $vSavingInsurance ;?></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php }else{?>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-1" aria-controls="ui-accordion-accordion-panel-1" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vBasicOccupationalData ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-1" aria-labelledby="ui-accordion-accordion-header-1" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-occupational" data-toggle="tab" style="color: #000!important;"><i class="fas fa-bookmark fa-fw"></i> <?php echo $vOccupyingDate ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-CareerDevelopmentData" data-toggle="tab" style="color: #000!important;"><i class="fas fa-briefcase fa-fw"></i> <?php echo $vCareerDevelopmentData ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-endingServing" data-toggle="tab" style="color: #000!important;"><i class="fas fa-unlink fa-fw"></i> <?php echo  $vEndingService;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vLeaves ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-leaves" data-toggle="tab" style="color: #000!important;"><i class="fas fa-umbrella fa-fw"></i> <?php echo $vLeavesValidBalances ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-leavesInvalid" data-toggle="tab" style="color: #000!important;"><i class="fas fa-umbrella fa-fw"></i> <?php echo $vLeavesInvalidBalances ;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vTimeControl ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-timeControl" data-toggle="tab" style="color: #000!important;"><i class="fas fa-puzzle-piece fa-fw"></i> <?php echo $vPermissions ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-execusses" data-toggle="tab" style="color: #000!important;"><i class="fa fa-sun-o fa-fw"></i> <?php echo $vExecusses ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-checkInOut" data-toggle="tab" style="color: #000!important;"><i class="fas fa-exchange-alt fa-fw"></i> <?php echo  $vCheckInOut;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vSalary.' & '.$vBenefits  ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><h6 style="color: #000!important;"><i class="fas fa-money-bill-wave fa-fw"></i> <?php echo $vEarnings ;?></h6></li>
                                                            <ul>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-salaryRecords" data-toggle="tab" style="color: #000!important;"><?php echo $vSalaryRecords ;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-salaryChanges" data-toggle="tab" style="color: #000!important;"><?php echo $vSalaryChanges ;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-premiumOfLiving" data-toggle="tab" style="color: #000!important;"><?php echo $vPremiumOfLiving;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-periodicPremium" data-toggle="tab" style="color: #000!important;"><?php echo $vPeriodicPremium;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-specialPremium" data-toggle="tab" style="color: #000!important;"><?php echo $vSpecialPremium;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-increaseOfPermenantBasicPay" data-toggle="tab" style="color: #000!important;"><?php echo $vIncreaseOfPermenantBasicPay;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-homorousTransfered" data-toggle="tab" style="color: #000!important;"><?php echo $vHomorousTransfered;?></a></li>
                                                            </ul>
                                                            <hr>
                                                            <li class="tab-link" style="padding: 4px;"><h6 style="color: #000!important;"><i class="fas fa-money-bill-wave fa-fw"></i> <?php echo $vDeduction ;?></h6></li>
                                                            <ul>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-predecessor" data-toggle="tab" style="color: #000!important;"><?php echo $vPredecessor;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-insurancePremiumsAndSubscriptions" data-toggle="tab" style="color: #000!important;"><?php echo $vInsurancePremiumsAndSubscriptions;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-entitiesEntitledToPremiums" data-toggle="tab" style="color: #000!important;"><?php echo $vEntitiesEntitledToPremiums;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-maxInsuranceAmount" data-toggle="tab" style="color: #000!important;"><?php echo $vMaxInsuranceAmount;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-socialInsurance" data-toggle="tab" style="color: #000!important;"><?php echo $vSocialInsurance;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-familyTreatmentDeDuction" data-toggle="tab" style="color: #000!important;"><?php echo $vFamilyTreatmentDeDuction;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-savingSystems" data-toggle="tab" style="color: #000!important;"><?php echo $vSavingSystems;?></a></li>
                                                            </ul>
                                                            <hr>
                                                            <li class="tab-link" style="padding: 4px;"><h6 style="color: #000!important;"><i class="fas fa-money-bill-wave fa-fw"></i> <?php echo $vBenefits ;?></h6></li>
                                                            <ul>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-functionalParameters" data-toggle="tab" style="color: #000!important;"><?php echo $vFunctionalParameters;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-bestPerformanceIncrease" data-toggle="tab" style="color: #000!important;"><?php echo $vBestPerformanceIncrease;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-bestPerformanceIncreaseFormula" data-toggle="tab" style="color: #000!important;"><?php echo $vBestPerformanceIncreaseFormula;?></a></li>
                                                                <li class="tab-link" style="padding: 4px;"><a href="#tab-bestPerformanceCalculation" data-toggle="tab" style="color: #000!important;"><?php echo $vBestPerformanceCalculation;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vDocumentManagement ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-document" style="padding: 4px;"><a href="#tab-leaves" data-toggle="tab" style="color: #000!important;"><i class="fa fa-file fa-fw"></i> <?php echo $vDocumentManagement ;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vMedicalSystem.' '.$vJDDetails  ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-familyMedical" data-toggle="tab" style="color: #000!important;"><i class="fa fa-user-friends fa-fw"></i> <?php echo $vFamilyMedicalServiceRequests ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-dentistRecords" data-toggle="tab" style="color: #000!important;"><i class="fa fa-tooth fa-fw"></i> <?php echo $vDentistRecords ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-medicalService" data-toggle="tab" style="color: #000!important;"><i class="fa fa-hospital fa-fw"></i> <?php echo $vMedicalService ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-preventHealtcareItem" data-toggle="tab" style="color: #000!important;"><i class="fa fa-stop fa-fw"></i> <?php echo $vPreventHealtcareItem ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-healthcareItemPermission" data-toggle="tab" style="color: #000!important;"><i class="fa fa-plus fa-fw"></i> <?php echo $vHealthcareItemPermission ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-diseases" data-toggle="tab" style="color: #000!important;"><i class="fa fa-ambulance fa-fw"></i> <?php echo $vDiseases ;?></a></li>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-checkup" data-toggle="tab" style="color: #000!important;"><i class="fa fa-user-md fa-fw"></i> <?php echo $vCheckup ;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vPenalties ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-penalties" data-toggle="tab" style="color: #000!important;"><i class="fa fa-user fa-fw"></i> <?php echo $vPenalties ;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vTraining.' '.$vDevelopment ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-training" data-toggle="tab" style="color: #000!important;"><i class="fa fa-file fa-fw"></i> <?php echo $vTraining.' '.$vDevelopment ;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vReports ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-reports" data-toggle="tab" style="color: #000!important;"><i class="fa fa-file fa-fw"></i> <?php echo $vReports ;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div>
                                                    <h4 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all ui-accordion-icons" role="tab" id="ui-accordion-accordion-header-2" aria-controls="ui-accordion-accordion-panel-2" aria-selected="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon fa fa-plus"></span><?php echo $vSettings ;?></h4>
                                                    <div class="padding-10 ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-accordion-panel-2" aria-labelledby="ui-accordion-accordion-header-2" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
                                                        <ul>
                                                            <li class="tab-link" style="padding: 4px;"><a href="#tab-settings" data-toggle="tab" style="color: #000!important;"><i class="fa fa-cog fa-fw"></i> <?php echo $vSettings ;?></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <?php }?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--end side navbar-->
                                </div>
                                <!--start tab-->
                                <div class="col-md-9 tab-content">
                                    <div style="margin: 35px 8px;">
                                        <h1 class="giveMargin">
                                            <span>
                                                <?php if($_SESSION['language']=='AR'){ echo $row_Recordset1['name_arabic'];}else{ echo $row_Recordset1['name_english'];} ?>
                                            </span>
                                        </h1>
                                        <h4><?php echo $row_Recordset1['employee_id']; ?></h4>
                                        <h4><?php if($_SESSION['language']=='AR') { echo $row_Recordset1['job_title_ar']; }else{ echo $row_Recordset1['job_title_en']; } ?></h4>
                                    </div>
                                    <!-- start tab for basic data-->
                                    <!--start basic data-->
                                    <div class="padding-10 tab-pane active"  id="tab-basic">
                                        <h1> <?php echo $vBasicBata;?>
                                            <button style="background: transparent;border: none;" data-toggle="modal" data-target="#editbasic">
                                                <i class="fa fa-edit fa-fw" style="color: #875a7b;"></i>
                                            </button>
                                            <!-- edit basic data module -->
                                            <div class="modal fade" id="editbasic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" <?php if($_SESSION['language']=='AR'){ echo 'style="float:left;"';}?>>
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel"><?php echo $vBasicBata;?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="?do=insert" method="post" >
                                                                <h6>
                                                                    <div class=" txt-color-blueLight"><i class="fa fa-puzzle-piece fa-fw"></i> <?php echo $vPersonalData2;?></div>
                                                                </h6>
                                                                <table width="90%" align="center" class="table table-striped table-forum">
                                                                    <tbody style="font-size: 15px;">
                                                                    <!-- Post -->
                                                                    <tr>
                                                                            <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                            else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vPayroll;?></b></label>
                                                                            </td>
                                                                            <td colspan="3"><span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" name="employee_id" value="<?php echo $row_Recordset1['employee_id'];?>">
                                                                                </label>
                                                                            </span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vEmployeeName;?></b></label>
                                                                        </td>
                                                                        <td colspan="3">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" name="name" value="<?php if($_SESSION['language']=='AR'){ echo $row_Recordset1['name_arabic'];}else{ echo $row_Recordset1['name_english'];}?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vDateOfBirth;?></b></label>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="date" class="input-sm" name="birth_date" value="<?php echo $row_Recordset1['birth_date'];?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vAddress;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" name="address" value="<?php if($_SESSION['language']=='AR') {  echo $row_Recordset1['address_ar']; }else{ echo $row_Recordset1['address']; }?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vCourtesy;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                            </span>
                                                                        </td>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vGender;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="select">
                                                                                    <select>
                                                                                        <option disabled hidden selected value="<?php echo $row_Recordset1['gender'];?>"><?php if ($row_Recordset1['gender'] == 0 ){echo $vMale;}else{echo $vFemale;}?></option>
                                                                                        <option value="0"><?php echo $vMale;?></option>
                                                                                        <option value="1"><?php echo $vFemale;?></option>
                                                                                    </select> <i></i>
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vNationality;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" value="<?php echo $row_Recordset1['national_id_card_type'];?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vIdCardNumber;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" value="<?php echo $row_Recordset1['national_id_card_no'];?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vSocialStatus;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" disabled value="<?php echo $row_Recordset1[''];?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vNoChildren;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" disabled value="<?php echo $row_Recordset1[''];?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vExtension;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" value="<?php echo $row_Recordset1['cp_total_monthly_salary_actual_le'];?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                        <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                                        else{ echo 'align="left" class="text-left"';} ?>>
                                                                            <label><b><?php echo $vJobName;?></b></label>
                                                                        </td>
                                                                        <td width="30%">
                                                                            <span class="nm">
                                                                                <label class="input">
                                                                                    <input type="text" class="input-sm" value="<?php if($_SESSION['language']=='AR') { echo $row_Recordset1['job_title_ar']; }else{ echo $row_Recordset1['job_title_en']; }?>">
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                <?php echo $vCancel;?>
                                                            </button>
                                                            <button type="button" class="btn btn-primary">
                                                                <?php echo $vSubmit;?>
                                                            </button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </h1>
                                        <h6>
                                            <div class=" txt-color-blueLight"><i class="fa fa-puzzle-piece fa-fw"></i> <?php echo $vPersonalData2;?></div>
                                        </h6>
                                        <table width="90%" align="center" class="table table-striped table-forum">
                                            <tbody>
                                            <!-- Post -->
                                            <tr>
                                                <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vPayroll;?></b></td>
                                                <td colspan="3"><span class="nm"><?php echo $row_Recordset1['employee_id'];?></span></td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vEmployeeName;?></b></td>
                                                <td colspan="3"><?php if($_SESSION['language']=='AR'){ echo $row_Recordset1['name_arabic'];}else{ echo $row_Recordset1['name_english'];}?></td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vEmployeeShortName;?></b></td>
                                                <td colspan="3">
                                                    <?php if($_SESSION['language']=='AR')
	                                                { $name=explode(' ',trim($row_Recordset1['name_arabic']));echo $name[0].' '.$name[1];}
	                                                else{ $name=explode(' ',trim($row_Recordset1['name_english']));echo $name[0].' '.$name[1];} ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>><b><?php echo $vDateOfBirth;?></b></td>
                                                <td width="38%">
                                                    <div align="left" dir="ltr"><?php echo $row_Recordset1['birth_date'];?></div>
                                                    <p style="display: none" class="note" align="left" dir="ltr">(  41 years, 2 months, 21 days,)</p>
                                                </td>
                                                <td width="15%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vAddress;?></b></td>
                                                <td width="27%"><?php if($_SESSION['language']=='AR') {  echo $row_Recordset1['address_ar']; }else{ echo $row_Recordset1['address']; }?></td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vCourtesy;?></b></td>
                                                <td width="38%"><?php echo $row_Recordset1['title_of_courtesy_id'];?></td>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vGender;?></b></td>
                                                <td width="27%"><?php if ($row_Recordset1['gender'] == 0 ){echo '<i class="fas fa-male fa-fw"></i> '.$vMale;}else{echo '<i class="fas fa-female fa-fw"></i> '.$vFemale;}?></td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php  echo $vNationality;?></b></td>
                                                <td width="38%"><?php echo $row_Recordset1['national_id_card_type'];?></td>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vIdCardNumber;?></b></td>
                                                <td width="27%"><?php echo $row_Recordset1['national_id_card_no'];?></td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vSocialStatus?></b></td>
                                                <td width="38%"></td>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vNoChildren?></b></td>
                                                <td width="27%"></td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vExtension?></b></td>
                                                <td width="38%"><?php echo $row_Recordset1['cp_total_monthly_salary_actual_le'];?></td>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vJobName;?></b></td>
                                                <td width="27%"><?php if($_SESSION['language']=='AR') { echo $row_Recordset1['job_title_ar']; }else{ echo $row_Recordset1['job_title_en']; }?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end basic data-->
                                    <!--start familymemeber-->
                                    <div class="padding-10 tab-pane" id="tab-familymember">
                                        <h1> <?php echo $vBasicBata;?> </h1>
                                        <h6><div class="txt-color-blueLight"><i class="fa fa-child fa-fw"></i> <?php echo $vFamilyData;?></div></h6>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo '<i class="fas fa-graduation-cap fa-fw"></i> '.$vFamilymembers;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vRelationType;?></th>
                                                        <th><?php echo $vName;?></th>
                                                        <th><?php echo $vDateOfBirth;?></th>
                                                        <th><?php echo $vCertificate;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end familymemeber-->
                                    <!--start contactBata-->
                                    <div class="padding-10 tab-pane" id="tab-contactBata">
                                        <h1> <?php echo $vBasicBata;?> </h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-phone fa-fw"></i> <?php echo  $vContactBata;?></div></h6>
                                        <table width="90%" align="center" class="table table-striped table-forum">
                                            <tbody>
                                                <tr>
                                                    <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                    else{ echo 'align="left" class="text-left"';} ?>>
                                                        <b><?php echo $vMobilePhone?></b></td>
                                                    <td colspan="3"><?php
                                                        if ( !empty($row_Recordset1['phone_1_office']) || !empty($row_Recordset1['phone_2_home']) || !empty($row_Recordset1['phone_3_mobile']) || !empty($row_Recordset1['phone_4_fax']) ){
                                                            if ( !empty($row_Recordset1['phone_1_office']) ){ echo $vMobilePhone.' '.$vDirectPhone.' : <i class="fas fa-briefcase fa-fw"></i> '.$row_Recordset1['phone_1_office'].'<br>';}
                                                            if ( !empty($row_Recordset1['phone_2_home']) ){ echo $vMobilePhone.' '.$vHomePhone.' : <i class="fas fa-home fa-fw"></i> '.$row_Recordset1['phone_2_home'].'<br>';}
                                                            if ( !empty($row_Recordset1['phone_3_mobile']) ){ echo $vMobilePhone.' : <i class="fas fa-phone fa-fw"></i> '.$row_Recordset1['phone_3_mobile'].'<br>';}
                                                            if ( !empty($row_Recordset1['phone_4_fax']) ){ echo $vFax.' : <i class="fas fa-fax fa-fw"></i> '.$row_Recordset1['phone_4_fax'];}
                                                        }else{
                                                            echo '<i class="fas fa-phone fa-fw"></i> '.$vNull;
                                                        }
                                                        ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end contactBata-->
                                    <!--start military-->
                                    <div class="padding-10 tab-pane" id="tab-military">
                                        <h1 > <?php echo $vBasicBata;?> <a href="#"><i class="fa fa-edit fa-fw"></i></a> </h1>
                                        <h6><div class="txt-color-blueLight"><i class="fa fa-fighter-jet fa-fw"></i> <?php echo $vMilitaryStatus;?></div></h6>
	                                    <?php $military=mysqli_fetch_assoc( mysqli_query($website ,"SELECT * FROM military_service_status WHERE  military_service_status = '".$row_Recordset1['military_service_status']."'") );?>
                                        <table width="90%" align="center" class="table table-striped table-forum">
                                            <tbody>
                                            <tr>
                                                <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vMilitaryStatus;?></b></td>
                                                <td colspan="3"><span class="nm"><?php if($_SESSION['language']=='AR') { echo $military['status_arabic'];}else{echo $military['status_english'] ;}?></span></td>
                                            </tr>
                                            <tr>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php  echo $vStart;?></b></td>
                                                <td width="38%"><?php echo $row_Recordset1['military_exemption_end_date'];?></td>
                                                <td <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vEnd;?></b></td>
                                                <td width="27%"><?php echo $row_Recordset1['military_exemption_end_date'];?></td>
                                            </tr>
                                            <tr>
                                                <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vMilitaryCardNumber;?></b></td>
                                                <td colspan="3"><span class="nm"><?php echo $military['status_arabic'];?></span></td>
                                            </tr>
                                            <tr>
                                                <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vJournalMemo;?></b></td>
                                                <td colspan="3"><span class="nm"><?php echo $row_Recordset1['military_service_detail'];?></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end military-->
                                    <!--start educational-->
                                    <div class="padding-10 tab-pane" id="tab-educational">
                                        <h1> <?php echo $vBasicBata;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fa fa-graduation-cap fa-fw"></i> <?php echo $vEducationalCertificates;?></div></h6>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo '<i class="fas fa-graduation-cap fa-fw"></i> '.$vEducationalCertificates;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vCertifitateName;?></th>
                                                        <th><?php echo $vCertificateLevel;?></th>
                                                        <th><?php echo $vCertificateGrade;?></th>
                                                        <th><?php echo $vYearObtained;?></th>
                                                        <th><?php echo $vMajorAndCollege;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end educational-->
                                    <!--start visa-->
                                    <div class="padding-10 tab-pane" id="tab-visa">
                                        <h1> <?php echo $vBasicBata;?> <a href="#"><i class="fa fa-edit fa-fw"></i></a> </h1>
                                        <h6><div class="txt-color-blueLight"><i class="fa fa-star fa-fw"></i> <?php echo $vVisasAndWorPerms;?></div></h6>
                                        <table width="90%" align="center" class="table table-striped table-forum">
                                            <tbody>
                                                <tr>
                                                    <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                    else{ echo 'align="left" class="text-left"';} ?>>
                                                        <b><?php echo $vVisaData;?></b></td>
                                                    <td colspan="3"><span class="nm"><?php echo $row_Recordset1[''];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                    else{ echo 'align="left" class="text-left"';} ?>>
                                                        <b><?php echo $vVisaType;?></b></td>
                                                    <td colspan="3"><span class="nm"><?php echo $row_Recordset1[''];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                    else{ echo 'align="left" class="text-left"';} ?>>
                                                        <b><?php echo $vVisaNumber;?></b></td>
                                                    <td colspan="3"><span class="nm"><?php echo $row_Recordset1[''];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%"<?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                    else{ echo 'align="left" class="text-left"';} ?>>
                                                        <b><?php echo $vVisaIssueDate;?></b></td>
                                                    <td colspan="3"><span class="nm"><?php echo $row_Recordset1[''];?></span></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%"<?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                    else{ echo 'align="left" class="text-left"';} ?>>
                                                        <b><?php echo $vVisaValidDate;?></b></td>
                                                    <td colspan="3"><span class="nm"><?php echo $row_Recordset1[''];?></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end visa-->
                                    <!-- end tab for basic data-->
                                    <!-- start tab for occupational-->
                                    <!-- start occupational-->
                                    <div class="padding-10 tab-pane" id="tab-occupational">
                                        <h1 ><?php echo $vOccupationalData;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-bookmark fa-fw"></i>  <?php echo $vOccupyingDate;?></div></h6>
                                        <table width="90%" align="center" class="table table-striped table-forum">
                                            <tbody>
                                            <tr>
                                                <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?> ><b><?php echo $vSectorJoinDate?></b></td>
                                                <td colspan="3"><?php echo $row_Recordset1['sector_join_date'];?></td>
                                            </tr>
                                            <tr>
                                                <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vDateOfJoinCompany?></b></td>
                                                <td colspan="3"><?php echo $row_Recordset1['company_join_date'];?></td>
                                            </tr>
                                            <tr>
                                                <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vCompanyHireDate?></b></td>
                                                <td colspan="3"><?php echo $row_Recordset1['cp_member_start_date'];?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-pencil-alt fa-fw"></i>  <?php echo $vTotalExperience;?></div></h6>
                                        <table width="90%" align="center" class="table table-striped table-forum">
                                            <tbody>
                                                <tr>
                                                    <td width="20%" <?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                    else{ echo 'align="left" class="text-left"';} ?>>
                                                        <b><?php echo $vDefaultExperienceDate?></b></td>
                                                    <td colspan="3"><?php echo $row_Recordset1['cp_member_start_date'];?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end occupational-->
                                    <!-- start CareerDevelopmentData-->
                                    <div class=" padding-10 tab-pane" id="tab-CareerDevelopmentData">
                                        <h1><?php echo $vOccupationalData;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-briefcase fa-fw"></i>  <?php echo $vCareerDevelopmentData;?></div></h6>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vInternalJobs;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vJobGroup;?></th>
                                                        <th><?php echo $vJobOccupyingTypes;?></th>
                                                        <th><?php echo $vDept.' '.$vLocation;?></th>
                                                        <th><?php echo $vFrom.' | '.$vTo;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vPriorEmployment;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vJobGroup;?></th>
                                                        <th><?php echo $vJobOccupyingTypes;?></th>
                                                        <th><?php echo $vDept.' '.$vLocation;?></th>
                                                        <th><?php echo $vFrom.' | '.$vTo;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end CareerDevelopmentData-->
                                    <!-- start endingServing-->
                                    <div class="padding-10 tab-pane" id="tab-endingServing">
                                        <h1 ><?php echo $vOccupationalData;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-unlink fa-fw"></i>  <?php echo $vEndingService;?></div></h6>
                                        <table width="90%" align="center" class="table table-striped table-forum">
                                            <tbody>
                                            <tr>
                                                <td width="20%"<?php if($_SESSION['language']=='AR'){ echo 'align="right" class="text-right"';}
                                                else{ echo 'align="left" class="text-left"';} ?>>
                                                    <b><?php echo $vEndingService?></b></td>
                                                <td colspan="3"><?php if ( !empty($row_Recordset1['retire_date']) ){ echo $row_Recordset1['retire_date'];}?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end endingServing-->
                                    <!-- end tab for occupational-->
                                    <!-- start tab for leaves-->
                                    <!-- start leaves-->
                                    <div class="padding-10 tab-pane" id="tab-leaves">
                                        <h1 ><?php echo $vLeavesSystem;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-umbrella fa-fw"></i>  <?php echo $vLeavesValidBalances;?></div></h6>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vLeavesValidBalances;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vLeavesTypes;?></th>
                                                        <th><?php echo $vLeaveBalance;?></th>
                                                        <th><?php echo $vValidTill;?></th>
                                                        <th><?php echo $vLeavesConsumed;?></th>
                                                        <th><?php echo $vLeavesRemaining;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end leaves-->
                                    <!-- start leavesInvalid-->
                                    <div class="padding-10 tab-pane" id="tab-leavesInvalid">
                                        <h1><?php echo $vLeavesSystem;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-umbrella fa-fw"></i>  <?php echo $vLeavesInvalidBalances;?></div></h6>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vLeavesInvalidBalances;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vLeavesTypes;?></th>
                                                        <th><?php echo $vLeaveBalance;?></th>
                                                        <th><?php echo $vValidTill;?></th>
                                                        <th><?php echo $vLeavesConsumed;?></th>
                                                        <th><?php echo $vLeavesRemaining;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end leavesInvalid-->
                                    <!-- end tab for leaves-->
                                    <!-- start tab for timeControl-->
                                    <!-- start timeControl-->
                                    <div class="padding-10 tab-pane" id="tab-timeControl">
                                        <h1><?php echo $vTimeControl;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-puzzle-piece fa-fw"></i>  <?php echo $vPermissions;?></div></h6>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vPermissions;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vJobGroup;?></th>
                                                        <th><?php echo $vJobOccupyingTypes;?></th>
                                                        <th><?php echo $vDept.' '.$vLocation;?></th>
                                                        <th><?php echo $vFrom.' | '.$vTo;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end timeControl-->
                                    <!-- start checkInOut-->
                                    <div class="padding-10 tab-pane" id="tab-checkInOut">
                                        <h1><?php echo $vTimeControl;?></h1>
                                        <h6><div class="txt-color-blueLight"><i class="fas fa-exchange-alt fa-fw"></i>  <?php echo $vCheckInOut;?></div></h6>
                                        <form method="get" target="">
                                            <div>
                                                <div class=" col-sm-6 col-md-6 col-lg-6">
                                                    <?php echo $vFrom?>
                                                    <input name="ts_from" type="date" class="datepicker form-control hasDatepicker" id="date" placeholder="dd/mm/yyyy" tabindex="3" size="20" data-dateformat="dd/mm/yy">
                                                </div>

                                                <div class=" col-sm-6 col-md-6 col-lg-6">
                                                    <?php echo $vTo?><input name="ts_to" type="date" class="datepicker form-control hasDatepicker" id="date2" placeholder="dd/mm/yyyy" tabindex="3" size="20" data-dateformat="dd/mm/yy">
                                                </div>

                                                <div class=" col-sm-12 col-md-12 col-lg-12" style="margin: 5px 0 0 0;">
                                                    <button tabindex="5" class="btn btn-primary wrap btn-block">
                                                        <?php echo $vView;?>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end checkInOut-->
                                    <!-- end tab for timeControl-->
                                    <!-- start tab for salary-->
                                    <!-- start salary-->
                                    <div class="padding-10 tab-pane" id="tab-salary">
                                        <h5 class="filled-title padding-5" style="text-align: center;"><?php echo $vBasicSalaryIncrements;?></h5>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vBasicSalaryIncrements;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vAmount;?></th>
                                                        <th><?php echo $vFrom;?></th>
                                                        <th><?php echo $vTo;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vAnotherBasicSalaryItems;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vItem;?></th>
                                                        <th><?php echo $vAmount;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end salary-->
                                    <!-- start bestPerformanceIncrease-->
                                    <div class="padding-10 tab-pane" id="tab-salary">
                                        <h5 class="filled-title padding-5" style="text-align: center;"><?php echo $vBestPerformanceIncrease;?></h5>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vBestPerformanceIncrease;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vAmount;?></th>
                                                        <th><?php echo $vFactor;?></th>
                                                        <th><?php echo $vMoreDetails;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vAnotherBasicSalaryItems;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vItem;?></th>
                                                        <th><?php echo $vAmount;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end bestPerformanceIncrease-->
                                    <!-- end tab for salary-->
                                    <!-- start tab for penalties-->
                                    <!-- start penalties-->
                                    <div class="padding-10 tab-pane" id="tab-penalties">
                                        <h5 class="filled-title padding-5" style="text-align: center;"><?php echo $vBasicSalaryIncrements;?></h5>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vBasicSalaryIncrements;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vAmount;?></th>
                                                        <th><?php echo $vFrom;?></th>
                                                        <th><?php echo $vTo;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-color">
                                            <div class="table-responsive">
                                                <div class="panel-heading"><?php echo $vAnotherBasicSalaryItems;?></div>
                                                <table class="table table-hover" style="color: #000">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo $vItem;?></th>
                                                        <th><?php echo $vAmount;?></th>
                                                        <th><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vAdd ;?></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end penalties-->
                                    <!-- end tab for penalties-->
                                    <!-- start tab for reports-->
                                    <!-- start reports-->
                                    <div class="padding-10 tab-pane" id="tab-reports">
                                        <h1 ><?php echo $vSettings;?></h1>
                                        <ul id="myTab3" class="nav nav-tabs bordered  <?php if($_SESSION['language']=='AR') { echo 'tabs-pull-right'; }else{ echo 'tabs-pull-left'; }?>">
                                            <li class="active">
                                                <a href="#AddDocument" data-toggle="tab"><?php echo $vAddDocument ;?></a>
                                            </li>
                                            <li>
                                                <a href="#FindEmployee" data-toggle="tab"><?php echo $vFindEmployee ;?></a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent3" class="tab-content padding-10">
                                            <div class="tab-pane fade in active" id="AddDocument">
                                                <form method="get" action="index.php">
                                                    <label class="select">
                                                        <select>
                                                            <option value="0" disabled>Choose name</option>
                                                            <option value="1"><?php echo $vViewAll;?></option>
                                                            <option value="2"><?php if ($_SESSION['language']=='AR'){echo $vAttachments.' '.$vMail;}else{echo $vMail.' '.$vAttachments;}?></option>
                                                            <option value="3"><?php if ($_SESSION['language']=='AR'){echo $vAttachments.' '.$vJournal;}else{echo $vJournal.' '.$vAttachments;};?></option>
                                                            <option value="4"><?php echo $vPersonnelSystem;?></option>
                                                            <option value="5"><?php echo $vCorporateDocuments;?></option>
                                                        </select> <i></i> </label>
                                                    <label class="input">
                                                        <button name="submit" type="submit"><?php echo $vSearch; ?></button>
                                                    </label>
                                                </form>
                                                <form action="upload.php?id=<?php echo $_GET['id'];?>" class="dropzone" id="mydropzone"></form>
                                            </div>
                                            <div class="tab-pane fade" id="FindEmployee">

                                                <form >
                                                    <label class="input">
                                                        <input name="search" type="text" maxlength="10">
                                                    </label>
                                                    <label class="select">
                                                        <select>
                                                            <option value="0" disabled>Choose name</option>
                                                            <option value="1"><?php echo $vViewAll;?></option>
                                                            <option value="2"><?php if ($_SESSION['language']=='AR'){echo $vAttachments.' '.$vMail;}else{echo $vMail.' '.$vAttachments;}?></option>
                                                            <option value="3"><?php if ($_SESSION['language']=='AR'){echo $vAttachments.' '.$vJournal;}else{echo $vJournal.' '.$vAttachments;};?></option>
                                                            <option value="4"><?php echo $vPersonnelSystem;?></option>
                                                            <option value="5"><?php echo $vCorporateDocuments;?></option>
                                                        </select> <i></i> </label>
                                                    <label class="input">
                                                        <button name="submit" type="submit"><?php echo $vSearch; ?></button>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end reports-->
                                    <!-- end tab for reports-->
                                    <!-- start tab for settings-->
                                    <!-- start settings-->
                                    <div class="padding-10 tab-pane" id="tab-settings">
                                        <h1 ><?php echo $vSettings;?></h1>
                                        <ul id="myTab3" class="nav nav-tabs bordered  <?php if($_SESSION['language']=='AR') { echo 'tabs-pull-right'; }else{ echo 'tabs-pull-left'; }?>">
                                            <li class="active">
                                                <a href="#AddDocument" data-toggle="tab"><?php echo $vAddDocument ;?></a>
                                            </li>
                                            <li>
                                                <a href="#FindEmployee" data-toggle="tab"><?php echo $vFindEmployee ;?></a>
                                            </li>
                                        </ul>
                                        <div id="myTabContent3" class="tab-content padding-10">
                                            <div class="tab-pane fade in active" id="AddDocument">
                                                <p>
                                                    My therapist told me the way to achieve true inner peace is to finish what I start. So far I’ve finished two bags of M&Ms and a chocolate cake. I feel better already.
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="FindEmployee">
                                                <form >
                                                    <label class="input">
                                                        <input name="search" type="text" maxlength="10">
                                                    </label>
                                                    <label class="input">
                                                        <button name="submit" type="submit"><?php echo $vSearch; ?></button>
                                                    </label>
                                                    <label class="select">
                                                        <select>
                                                            <option value="0">Choose name</option>
                                                            <option value="1">Alexandra</option>
                                                            <option value="2">Alice</option>
                                                            <option value="3">Anastasia</option>
                                                            <option value="4">Avelina</option>
                                                        </select> <i></i> </label>
                                                    <label class="input">
                                                        <button name="submit" type="submit"><?php echo $vSearch; ?></button>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end settings-->
                                    <!-- end tab for settings-->
                                </div>
                                <!--end tab-->
                            </div>
                            <div class="row">


                            </div>
                        </div>
                        <!-- end widget content -->


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
                        });
                        $("#inbox-table .inbox-data-from").click(function() {
                            $this = $(this);
                            getMail($this);
                        });
                        function getMail($this) {
                            //console.log($this.closest("tr").attr("id"));
                            loadURL("ajax/email-opened.html", $('#inbox-content > .table-wrap'));
                        }


                        $('.inbox-table-icon input:checkbox').click(function() {
                            enableDeleteButton();
                        });

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

                <!-- End Content -->


            </section>

            <!-- PAGE RELATED PLUGIN(S) -->
            <script src="../../../../../assets/smart_theme/js/plugin/dropzone/dropzone.min.js"></script>

            <script type="text/javascript">

                // DO NOT REMOVE : GLOBAL FUNCTIONS!

                $(document).ready(function() {

                    //enable / disable
                    $('#enable').click(function () {
                        $('#user .editable').editable('toggleDisabled');
                    });
                    pageSetUp();

                    Dropzone.autoDiscover = false;
                    $("#mydropzone").dropzone({
                        //url: "/file/post",
                        addRemoveLinks : true,
                        maxFilesize: 0.5,
                        dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
                        dictResponseError: 'Error uploading file!'
                    });

                })
                // myDropzone is the configuration for the element that has an id attribute
                // with the value my-dropzone (or myDropzone)
                Dropzone.options.myDropzone = {
                    init: function() {
                        this.on("addedfile", function(file) {

                            // Create the remove button
                            var removeButton = Dropzone.createElement("<button>Remove file</button>");


                            // Capture the Dropzone instance as closure.
                            var _this = this;

                            // Listen to the click event
                            removeButton.addEventListener("click", function(e) {
                                // Make sure the button click doesn't submit the form:
                                e.preventDefault();
                                e.stopPropagation();

                                // Remove the file preview.
                                _this.removeFile(file);
                                // If you want to the delete the file on the server as well,
                                // you can do the AJAX request here.
                            });

                            // Add the button to the file preview element.
                            file.previewElement.appendChild(removeButton);
                        });
                    }
                };
            </script>




        </section>
    </main>
</section>
<?php
include('../../../../../assets/footer_smart.php');
?>
</body>
</html>
