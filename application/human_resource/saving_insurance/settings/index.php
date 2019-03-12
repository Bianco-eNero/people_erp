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


mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT COUNT(employee_id) AS TOTAL_MEMBERS FROM employee WHERE (cp_member_type_id=2 || cp_member_type_id=6) AND organization='$organization'";
$Recordset1 = mysqli_query($website ,$query_Recordset1) or die(mysqli_error($Recordset1));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
//// End of include the settings table ///



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	//// include header script ////
	include('../../../../assets/header.php');
	include('../../../../assets/header_smart.php');
	//// end of header script ////
	?>

    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php if ($_SESSION['language']=='AR')
{ ?><style>.bs-glyphicons li{float: right}</style><?php } ?>
</head>
<body style="height:100%;font-weight: 100!important;">
<section class="employees">
    <header class="header">
        <nav class="sections">
            <a href="<?php echo $server; ?>application/" style="height: 100%;">
                <figure style="height: 100%;">
                    <i class="fas fa-th"></i>
                </figure>
            </a>
            <a href="<?php echo $server; ?>application/human_resource/saving_insurance/" >
                <h1 style="height: 100%;width: 129px;"><?php echo $vSavingInsurance; ?></h1>
            </a>
            <ul>
				<?php
				//// include training header ////
				include('../../../../assets/menus/header/saving_insurance.php')
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
                <h1><?php echo $vSettings?></h1>
                <form method="post" action="../create" style="display:none">
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
        <section class="body" style="height:80%" >




            <section>
                <div class="container_">
                    <!-- Start Content -->
                    <div class="row">

                        <!-- NEW WIDGET START -->
                        <article class="col-sm-12 sortable-grid ui-sortable">

                            <!-- Widget ID (each widget will need unique ID)-->
                            <div class="jarviswidget jarviswidget-color-purple jarviswidget-sortable" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" role="widget">
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
                                <header role="heading"><div class="jarviswidget-ctrls" role="menu">    <a style="display: none" href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> </div>
                                    <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

                                <!-- widget div-->
                                <div role="content" style="font-weight: 100;">

                                    <!-- widget edit box -->
                                    <div class="jarviswidget-editbox">
                                        <!-- This area used as dropdown edit box -->

                                    </div>
                                    <!-- end widget edit box -->

                                    <!-- widget content -->
                                    <div class="widget-body">

                                        <ul class="bs-glyphicons" style="padding: 10px;margin: 0">
                                            <li>
                                                <a href="earningPercentages/?case_id=95&case_filter=&ref=">
                                                    <i class="fas fa-folder fa-fw fa-5x"></i>
                                                    <span class="glyphicon-class"><?php echo $vEarningPer;?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="titlePer/?case_id=96&case_filter=&ref=">
                                                    <i class="fas fa-folder fa-fw fa-5x"></i>
                                                    <span class="glyphicon-class"><?php echo $vTitlePer;?></span>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- end widget content -->

                                </div>
                                <!-- end widget div -->

                            </div>
                            <!-- end widget -->

                        </article>
                        <!-- WIDGET END -->

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
include('../../../../assets/footer_smart.php');
?>


</body>
</html>
