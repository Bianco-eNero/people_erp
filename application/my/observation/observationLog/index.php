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
        <style>
            *{font-weight: 100}
            .row{margin: 0;padding: 0;}
            #content{ border: solid 1px #dadada; background: #fff; box-shadow: #eaeaea 4px 4px 20px 0; }
            .icon-bar{ height: 135px;background: #875a7b;position: relative; }
            .dot { height: 15px; width: 15px; background-color: #bbb; border-radius: 50%; display: inline-block; }
            .panel-heading{padding: 5px;margin: 0;}
            .panel{ margin: 20px; box-shadow: #e6e3e3 1px 1px 20px 0px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px; }
            .mybtn{ width: 50%; height: 40px; margin: 0 auto; display: block; }
        </style>

	    <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
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
                    <a href="<?php echo $server; ?>application/my/observation">
                        <h1 style="height:100%"><?php echo $vObservation; ?></h1>
                    </a>
                    <ul>
                        <?php
                        /*
                        include('../../../assets/menus/header/observer.php');
                        */
                        ?>
                    </ul>


                </nav>

                <?php
                $select_company=0;
                include('../../../../assets/menus/user_account.php');
                ?>

                <div class="clear"></div>
            </header>
			<main class="main">
                <section class="control">
                <section class="action" >
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

                <section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px ; margin-right:400px<?php } ?>">
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
				<section class="body" style="height: 100%">
                    <section>
                        <div class="container_">
                            <!-- Start Content -->
                            <div id="content" >

                                <div class="panel panel-default">
                                    <div class="panel-heading row">
                                        <div class="col-md-2" style="<?php if($_SESSION['language']=='AR') { echo 'float:right'; }else{ echo 'float:left'; }?>">
                                            <h1 class="text-center"><?php echo $vList;?></h1>
                                        </div>
                                        <div class="col-md-8" style="<?php if($_SESSION['language']=='AR') { echo 'float:right'; }else{ echo 'float:left'; }?>">
                                            <h1 class="text-center"><?php echo $vType.' :';?>
                                                <span style="margin: 15px;"><span class="dot" style="background: #900"></span> <?php echo $vUnSafeCondition;?> </span>
                                                <span style="margin: 15px;"><span class="dot" style="background: #cc6600"></span> <?php echo $vUnSafeAction;?> </span>
                                                <span style="margin: 15px;"><span class="dot" style="background: #0c6d96"></span> <?php echo $vOthers;?> </span>
                                            </h1>
                                        </div>
                                        <div class="col-md-2">
                                            <i class="fas fa-align-justify fa-fw fa-3x" style="display: block;margin: 0 auto;"></i>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row" style="border-left: #cc6600 1px solid;">
                                            <div class="col-md-8" style="<?php if($_SESSION['language']=='AR') { echo 'float:right'; }else{ echo 'float:left'; }?>">
                                                <h1><?php echo $vSubject.' :';?></h1>
                                                <h4><?php echo $vObserver.' :';?></h4>
                                                <h4><?php echo $vSite.' :';?></h4>
                                                <h4><?php echo $vDescription.' :';?></h4>
                                            </div>
                                            <div class="col-md-4" style="<?php if($_SESSION['language']=='AR') { echo 'float:right'; }else{ echo 'float:left'; }?>">
                                                <button class="btn btn-primary mybtn"><?php echo $vStatus;?></button>
                                                <p><?php echo $vObserverAt.' :';?></p>
                                                <p><?php echo $vDepartment.' :';?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>





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
            include('../../../../assets/footer_smart.php');
        ?>
	</body>
</html>
