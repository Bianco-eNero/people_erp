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
$query_Recordset1 = "SELECT * FROM employee WHERE (cp_member_type_id=2 || cp_member_type_id=6) AND organization='$organization' AND employee_id LIKE '%$search%' AND organization='$cooo' AND employee_id='$id' ORDER BY employee_id";
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
        function MM_jumpMenu(targ,selObj,restore){ //v3.0
            eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
            if (restore) selObj.selectedIndex=0;
        }
        //-->
    </script>
    <style>
        ul{list-style: none}
        hr{margin: 0}
        .tab-color{background: #e3e3e3;color: #666666;}
        .filled-title { font-size: large;font-weight: bold;color: #000000;}
        .data-show{display: none;}
        .display-block{display: block}
    </style>
    <script>
        $(document).ready(function(){
            $(".tab").click(function(){
                $('#'+$(this).data('value')).toggleClass("display-block",200);
                $(this).parent().siblings().find('.data-show').removeClass("display-block");
            });
            $(".tab-link").click(function(){
                $("this").parent().removeClass("active");
                $("this").find(".data-hover").siblings().find(".tab-link").removeClass("active");
                $("this").find(".data-hover").siblings().find(".tab-link").children().attr("aria-expanded","false");
            });
        });
    </script>
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
                <h1><span class="root"><?php echo $vEmployees; ?></span></h1>

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
                            <div class="row">
                                <div class="col-md-2" style="<?php if($_SESSION['language']=='AR') { echo 'float:right;'; }?>">
                                    <img src="../../../../../../assets/images/emp_pics/<?php echo $row_Recordset1['employee_id']; ?>.bmp" width="120" height="135" alt="<?php echo $row_Recordset1['name_english']?>" class="thumbnail" style="display: block;margin: auto"/>
                                </div>
                                <div class="col-md-6" style="<?php if($_SESSION['language']=='AR') { echo 'float:right;'; }?>">
                                    <h1 style="font-family: inherit;font-weight: bolder;"><?php echo $vBasicBata;?></h1>
                                    <p style="margin: auto 10px;"><i class="fas fa-info fa-fw"></i> <?php echo $vGeneralData;?></p>
                                    <p style="margin: auto 10px;"><i class="fas fa-puzzle-piece fa-fw"></i> <?php echo $vPersonalData2;?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3" style="<?php if($_SESSION['language']=='AR') { echo 'float:right;'; }?>">
                                    <p style="text-align: center;"><?php if($_SESSION['language']=='AR') { echo '<span>'.$vName.'</span>: '.$row_Recordset1['name_arabic']; }else{ echo '<span>'.$vName.'</span>: '.$row_Recordset1['name_english']; } ?></p>
                                    <p style="text-align: center;"><?php if($_SESSION['language']=='AR') { echo '<span>'.$vTitle.'</span>: '.$row_Recordset1['job_title_ar']; }else{ echo '<span>'.$vTitle.'</span>: '.$row_Recordset1['job_title_en']; } ?></p>
                                </div>
                                <div>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-list-ul fa-fw"></i> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:void(0);"><i class="far fa-comment fa-fw"></i> <?php echo $vChat; ?></a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);"><i class="far fa-envelope fa-fw"></i> <?php echo $vSendMessage; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--start side navbar-->
                            <div>

                                <div role="content">

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body">

                                        <div class="<?php if ($_SESSION['language']=='AR'){ echo 'tabs-right';}else{echo 'tabs-left';}?>">
                                            <ul class="nav nav-tabs tabs-left" style="background: #d2d2d2;width: 230px;padding: 0;" id="demo-pill-nav">
                                                <!-- start sidenav for basic data -->
                                                <li class="data-hover">
                                                    <a href="#" class="tab" data-value="basic"  style="color: #000!important;"><?php echo $vBasicBata ;?> <i class="fas fa-sort-down fa-fw"></i></a>
                                                    <ul class="data-show" id="basic">
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-basic" data-toggle="tab" style="color: #000!important;"><i class="fas fa-puzzle-piece fa-fw"></i> <?php echo $vPersonalData2 ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-basic" data-toggle="tab" style="color: #000!important;"><?php echo $vIdCardNumber ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-familymember" data-toggle="tab" style="color: #000!important;"><i class="fas fa-user fa-fw"></i> <?php echo  $vFamilymember;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-military" data-toggle="tab" style="color: #000!important;"><?php echo  $vMilitaryStatus;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-educational" data-toggle="tab" style="color: #000!important;"><i class="fas fa-graduation-cap fa-fw"></i> <?php echo  $vEducationalCertificates;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-r6" data-toggle="tab" style="color: #000!important;"><i class="fas fa-phone fa-fw"></i> <?php echo  $vContactBata;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-visa" data-toggle="tab" style="color: #000!important;"><i class="fas fa-star fa-fw"></i> <?php echo  $vVisasAndWorPerms;?></a></li>
                                                    </ul>
                                                </li>
                                                <!-- end sidenav for basic data -->
                                                <hr>
                                                <!-- start sidenav for occupational-->
                                                <li class="data-hover">
                                                    <a href="#" class="tab" data-value="occupational" style="color: #000!important;"><?php echo $vBasicOccupationalData ;?> <i class="fas fa-sort-down fa-fw"></i></a>
                                                    <ul class="data-show" id="occupational">
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-occupational" data-toggle="tab" style="color: #000!important;"><i class="fas fa-bookmark fa-fw"></i> <?php echo $vOccupyingDate ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-CareerDevelopmentData" data-toggle="tab" style="color: #000!important;"><i class="fas fa-briefcase fa-fw"></i> <?php echo $vCareerDevelopmentData ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-endingServing" data-toggle="tab" style="color: #000!important;"><i class="fas fa-unlink fa-fw"></i> <?php echo  $vEndingService;?></a></li>
                                                    </ul>
                                                </li>
                                                <!-- end sidenav for occupational-->
                                                <hr>
                                                <!-- start sidenav for leaves-->
                                                <li>
                                                    <a href="#" class="tab" data-value="leaves" style="color: #000!important;"><?php echo $vLeaves ;?> <i class="fas fa-sort-down fa-fw"></i></a>
                                                    <ul class="data-show" id="leaves">
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-leaves" data-toggle="tab" style="color: #000!important;"><i class="fas fa-umbrella fa-fw"></i> <?php echo $vLeavesValidBalances ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-leavesInvalid" data-toggle="tab" style="color: #000!important;"><i class="fas fa-umbrella fa-fw"></i> <?php echo $vLeavesInvalidBalances ;?></a></li>
                                                    </ul>
                                                </li>
                                                <!-- end sidenav for leaves-->
                                                <hr>
                                                <!-- start sidenav for time control-->
                                                <li>
                                                    <a  href="#" class="tab" data-value="timeControl" style="color: #000!important;"><?php echo $vTimeControl ;?> <i class="fas fa-sort-down fa-fw"></i></a>
                                                    <ul class="data-show" id="timeControl">
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-timeControl" data-toggle="tab" style="color: #000!important;"><i class="fas fa-puzzle-piece fa-fw"></i> <?php echo $vPermissions ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-" data-toggle="tab" style="color: #000!important;"><i class="fa fa-sun-o fa-fw"></i> <?php echo $vExecusses ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-" data-toggle="tab" style="color: #000!important;"><i class="fas fa-exchange-alt fa-fw"></i> <?php echo  $vCheckInOut;?></a></li>
                                                    </ul>
                                                </li>
                                                <!-- end sidenav for time control-->
                                                <hr>
                                                <!-- start sidenav for salary-->
                                                <li>
                                                    <a href="#" class="tab" data-value="salary" style="color: #000!important;"><?php echo $vSalary.' & '.$vBenefits ;?> <i class="fas fa-sort-down fa-fw"></i></a>
                                                    <ul class="data-show" id="salary">
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-salary" data-toggle="tab" style="color: #000!important;"><i class="fas fa-money-bill-wave fa-fw"></i> <?php echo $vPayrollBasics ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-" data-toggle="tab" style="color: #000!important;"><i class="fa fa-file-invoice-dollar fa-fw"></i> <?php echo $vPayrollItems ;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-" data-toggle="tab" style="color: #000!important;"><?php echo $vSalaryRecords;?></a></li>
                                                        <li class="tab-link" style="padding: 4px;"><a href="#tab-" data-toggle="tab" style="color: #000!important;"><?php echo $vBenefits;?></a></li>
                                                    </ul>
                                                </li>
                                                <!-- end sidenav for salary-->
                                                <hr>
                                                <!-- start sidenav for documents-->
                                                <li>
                                                    <a href="#tab-r6" data-toggle="tab" style="color: #000!important;"><?php echo $vDocumentManagement ;?></a>
                                                </li>
                                                <!-- end sidenav for documents-->
                                                <hr>
                                                <!-- start sidenav for medical-->
                                                <li>
                                                    <a href="#tab-r7" data-toggle="tab" style="color: #000!important;"><?php echo $vMedicalSystem.' '.$vJDDetails ;?></a>
                                                </li>
                                                <!-- end sidenav for medical-->
                                                <hr>
                                                <!-- start sidenav for penalties-->
                                                <li>
                                                    <a href="#tab-r8" data-toggle="tab" style="color: #000!important;"><?php echo $vPenalties ;?></a>
                                                </li>
                                                <!-- end sidenav for penalties-->
                                                <hr>
                                                <!-- start sidenav for training-->
                                                <li>
                                                    <a href="#tab-r9" data-toggle="tab" style="color: #000!important;"><?php echo $vTraining.' '.$vDevelopment ;?></a>
                                                </li>
                                                <!-- end sidenav for training-->
                                                <hr>
                                                <!-- start sidenav for reports-->
                                                <li>
                                                    <a href="#tab-r10" data-toggle="tab" style="color: #000!important;"><?php echo $vReports ;?></a>
                                                </li>
                                                <!-- end sidenav for reports-->
                                                <hr>
                                                <!-- start sidenav for settings-->
                                                <li>
                                                    <a href="#tab-r11" data-toggle="tab" style="color: #000!important;"><?php echo $vSettings ;?></a>
                                                </li>
                                                <!-- end sidenav for settings-->
                                            </ul>
                                            <div class="tab-content">
                                                <!-- start tab for basic data-->
                                                <div class="tab-pane active" id="tab-basic">
                                                    <div class="tab-color">
                                                        <p><?php echo '<span class="filled-title">'.$vPayroll.'</span> : '.$row_Recordset1['employee_id'];?></p>
                                                        <p><?php if($_SESSION['language']=='AR') { echo '<span class="filled-title">'.$vEmployeeName.'</span> : '.$row_Recordset1['name_arabic'];}else{ echo '<span class="filled-title">'.$vEmployeeName.'</span> : '.$row_Recordset1['name_english']; }?></p>
                                                    </div>
                                                    <div class="tab-color">
                                                        <p><?php if($_SESSION['language']=='AR') { echo '<span class="filled-title">'.$vEmployeeShortName.'</span> : '.$row_Recordset1['name_arabic']; }else{ echo '<span class="filled-title">'.$vEmployeeShortName.'</span> : '.$row_Recordset1['name_english']; }?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vDateOfBirth.'</span> : '.$row_Recordset1['birth_date'];?></p>
                                                        <p><?php if ($row_Recordset1['gender'] == 0 ){echo '<span class="filled-title">'.$vGender.'</span> : <i class="fas fa-male fa-fw"></i> '.$vMale;}else{echo '<span class="filled-title">'.$vGender.'</span> : <i class="fas fa-female fa-fw"></i> '.$vFemale;}?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vNationality.'</span> : '.$row_Recordset1['national_id_card_type'];?></p>
                                                    </div>
                                                    <div class="tab-color">
                                                        <p>
                                                            <?php
                                                            if ( !empty($row_Recordset1['phone_1_office']) || !empty($row_Recordset1['phone_2_home']) || !empty($row_Recordset1['phone_3_mobile']) || !empty($row_Recordset1['phone_4_fax']) ){
                                                                if ( !empty($row_Recordset1['phone_1_office']) ){ echo $vMobilePhone.' '.$vDirectPhone.' : <i class="fas fa-briefcase fa-fw"></i> '.$row_Recordset1['phone_1_office'].'<br>';}
                                                                if ( !empty($row_Recordset1['phone_2_home']) ){ echo $vMobilePhone.' '.$vHomePhone.' : <i class="fas fa-home fa-fw"></i> '.$row_Recordset1['phone_2_home'].'<br>';}
                                                                if ( !empty($row_Recordset1['phone_3_mobile']) ){ echo $vMobilePhone.' : <i class="fas fa-phone fa-fw"></i> '.$row_Recordset1['phone_3_mobile'].'<br>';}
                                                                if ( !empty($row_Recordset1['phone_4_fax']) ){ echo $vFax.' : <i class="fas fa-fax fa-fw"></i> '.$row_Recordset1['phone_4_fax'];}
                                                            }else{
                                                                echo '<span class="filled-title">'.$vMobilePhone.'</span> : <i class="fas fa-phone fa-fw"></i> '.$vNull;
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="tab-color">
                                                        <p><?php echo '<span class="filled-title">'.$vIdCardData.'</span> : '.$row_Recordset1['national_id_card_no'];?></p>
                                                        <p><?php if($_SESSION['language']=='AR') {  echo '<span class="filled-title">'.$vAddress.'</span> : '.$row_Recordset1['address_ar']; }else{ echo $vAddress.' : '.$row_Recordset1['address']; }?></p>
                                                    </div>
                                                    <div class="tab-color">
                                                        <div class="row" style="height: 110px">
                                                            <div class="col-md-5" style="padding: 0;float: right">
                                                                <p><?php echo '<span class="filled-title">'.$vSocialStatus.'</span> : ';?></p>
                                                                <p><?php echo '<span class="filled-title">'.$vExtension.'</span> : ';?></p>
                                                            </div>
                                                            <div class="col-md-4" style="padding: 0;">
                                                                <p><?php echo '<span class="filled-title">'.$vNoChildren.'</span> : ';?></p>
                                                                <p><?php echo '<span class="filled-title">'.$vDirectPhone.'</span> : '.$row_Recordset1['job_title_ar'];?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-familymember">
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
                                                <div class="tab-pane" id="tab-military">
                                                    <div class="tab-color">
                                                        <?php $military=mysqli_fetch_assoc( mysqli_query($website ,"SELECT * FROM military_service_status WHERE  military_service_status = '".$row_Recordset1['military_service_status']."'") );?>
                                                        <p><?php if($_SESSION['language']=='AR') { echo '<span class="filled-title">'.$vMilitaryStatus.'</span> : '.$military['status_arabic'];}else{echo '<span class="filled-title">'.$vMilitaryStatus.'</span> : '.$military['status_english'];}?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vStart.'</span> : '.$row_Recordset1['military_exemption_end_date'].'&nbsp<span class="filled-title">'.$vEnd.'</span> : '.$row_Recordset1['military_exemption_end_date'];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vMilitaryCardNumber.'</span> : '.$military['status_arabic'];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vJournalMemo.'</span> : '.$row_Recordset1['military_service_detail'];?></p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-educational">
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
                                                <div class="tab-pane" id="tab-visa">
                                                    <div class="tab-color">
                                                        <p><?php echo '<span class="filled-title">'.$vVisaData.'</span> : '.$row_Recordset1[''];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vVisaType.'</span> : '.$row_Recordset1[''];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vVisaNumber.'</span> : '.$row_Recordset1[''];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vVisaIssueDate.'</span> : '.$row_Recordset1[''];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vVisaValidDate.'</span> : '.$row_Recordset1[''];?></p>
                                                    </div>
                                                </div>
                                                <!-- end tab for basic data-->
                                                <!-- start tab for occupational-->
                                                <div class="tab-pane" id="tab-occupational">
                                                    <div class="tab-color">
                                                        <p><?php echo '<span class="filled-title">'.$vSectorJoinDate.'</span> : '.$row_Recordset1['sector_join_date'];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vDateOfJoinCompany.'</span> : '.$row_Recordset1['company_join_date'];?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vCompanyHireDate.'</span> : '.$row_Recordset1['cp_member_start_date'];?></p>
                                                    </div>
                                                    <div class="tab-color">
                                                        <p><?php echo '<i class="fas fa-pencil-alt fa-fw"></i> '.$vTotalExperience;?></p>
                                                        <p><?php echo '<span class="filled-title">'.$vDefaultExperienceDate.'</span> : ';?></p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-CareerDevelopmentData">
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
                                                <div class="tab-pane" id="tab-endingServing">
                                                    <div class="tab-color">
                                                        <p><?php if ( !empty($row_Recordset1['retire_date']) ){ echo '<span class="filled-title">'.$vEndingService.'</span> '.$row_Recordset1['retire_date'];} ?></p>
                                                    </div>
                                                </div>
                                                <!-- end tab for occupational-->
                                                <!-- start tab for leaves-->
                                                <div class="tab-pane" id="tab-leaves">
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
                                                <div class="tab-pane" id="tab-leavesInvalid">
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
                                                <!-- end tab for leaves-->
                                                <!-- start tab for timeControl-->
                                                <div class="tab-pane" id="tab-timeControl">
                                                    <div class="tab-color">
                                                        <div class="table-responsive">
                                                            <div class="panel-heading"><?php echo $vTimeControl;?></div>
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
                                                <!-- end tab for timeControl-->
                                                <!-- start tab for salary-->
                                                <div class="tab-pane" id="tab-salary">
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
                                                <!-- end tab for salary-->
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end widget content -->

                                </div>

                            </div>
                            <!--end side navbar-->
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
include('../../../../../assets/footer_smart.php');
?>
</body>
</html>
