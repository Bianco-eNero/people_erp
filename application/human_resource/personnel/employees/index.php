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

			
        <script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
        </script>
        
        <style>
            .employee-name{background-color: #875a7b;color: #fff;font-size: 16px;padding: 5px 6px;text-align: center;padding: 7px;}
            .middle{transition: .5s ease;opacity: 0;position: absolute;bottom: 0;left: 0;transform: translate(0, 0);-ms-transform: translate(0, 0);text-align: center;width: 100%}
            .employee-icon:hover .employee-img{  opacity: 0.6; }
            .employee-icon:hover .middle{ opacity: 1; }
            *{font-weight: 100}

        </style>
        

	</head>
	<body style="height:100%" <?php if($_SESSION['language']=='AR') { echo 'class="smart-rtl"';}?> >
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/personnel/" >
						<h1 style="height:100%;width: 110px;"><?php echo str_replace('ال', '', $vEmployees); ?></h1>
					</a>
						<ul>
							<?php
                                //// include compl pnsion header ////
							    include('../../../../assets/menus/header/personnel.php')
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
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="../../compl_pension/create" style="display:none">
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
				<section class="body" style="height:100%">




										<section>
										<div class="container_">
										<!-- Start Content -->
<div id="content" >
                                <?php
                                if(!isset($_GET['id'])){
                                    $limit=96;
                                    $page=( isset($_GET['page']) )? (($_GET['page']-1)*$limit) : 0;


                                    ///// Include news records ////
                                    $search=$_GET['search'];

                                    $cooo=$_SESSION['current_company'];

                                    mysqli_select_db($website,$database_website );
                                    $query_Recordset1 = "SELECT * FROM employee WHERE (cp_member_type_id=2 || cp_member_type_id=6) AND organization='$organization' AND employee_id LIKE '%$search%' AND organization='$cooo' ORDER BY employee_id LIMIT $page,$limit";
                                    $Recordset1 = mysqli_query($website ,$query_Recordset1) or die(mysqli_error($Recordset1));
                                    $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
                                    //// End of include the settings table ///

                                    mysqli_select_db($website,$database_website );
                                    $query_no_of_employee = "SELECT count(employee_id) as numberEmpolyee FROM employee WHERE (cp_member_type_id=2 || cp_member_type_id=6) AND organization='$organization' AND organization='$cooo' AND employee_id LIKE '%$search%' ";
                                    $no_of_employee = $website->query($query_no_of_employee);
                                    $row_no_of_employee = mysqli_fetch_assoc($no_of_employee);
                                    if ($row_no_of_employee['numberEmpolyee'] == 1){
                                        header('Location: http://people.benegypt.com/application/human_resource/personnel/employees/employee/?id='.$search);
                                        exit();
                                    }
                                    ?>
                                    <nav aria-label="Page navigation" class="dont_print_me" style="display: block;margin: auto;width: max-content;">
                                        <ul class="pagination">
                                            <?php
                                            $count=10;
                                            $last_page=ceil($row_no_of_employee['numberEmpolyee']/$limit);
                                            if(isset($_GET['page']) && $_GET['page']!=1 ) {
                                                echo'<li><a href="?page=1&search='.$search.'">First</a></li>';
                                                echo '<li><a href="#" disabled tabindex="-1" >...</a></li>';
                                            }
                                            for ( $i=( isset($_GET['page'])&& $_GET['page']>5 )? $_GET['page']-5 : 1 ; ($i<$last_page && $count!=0) ; $i++){
                                                echo'<li><a href="?page='.$i.'&search='.$search.'">'.$i.'</a></li>';
                                                $count--;
                                            }
                                            if( $_GET['page']!=$last_page && $last_page!= 1 ) {
                                                echo '<li><a href="#" disabled tabindex="-1" >...</a></li>';
                                                echo '<li><a href="?page=' . $last_page . '&search='.$search.'">last</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                <?php } ?>


                                <!-- widget grid -->
                                <section id="widget-grid" class="">



                                    <!-- row -->
                                    <div class="row">

                                        <!-- NEW WIDGET START -->
                                        <article class="col-sm-12">

                                            <!-- Widget ID (each widget will need unique ID)-->
                                            <div class="jarviswidget jarviswidget-color" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false">
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
                                                <header >
                                                    <h2><?php echo $vEmployees; ?>
                                                    </h2>
                                                </header>

                                                <!-- widget div-->
                                                <div style="padding: 0;">

                                                    <!-- widget edit box -->
                                                    <div class="jarviswidget-editbox">
                                                        <!-- This area used as dropdown edit box -->

                                                    </div>
                                                    <!-- end widget edit box -->

                                                    <!-- widget content -->
                                                    <div class="widget-body">

                                                        <ul class="bs-glyphicons row" style="margin: 0;padding: 0;">
                                                            <?php do{ ?>
                                                            <li  class="employee-icon col-sm-4 col-md-3 col-lg-2" style="/*width: 16.666%;*/margin: 0;height: 185px;position: relative; border-color: #FFFFFF;  ">
                                                                <a href="employee?id=<?php echo $row_Recordset1['employee_id'];?>">
                                                                    <span class="glyphicon-class employee-img position-relative">
                                                                        <img src="../../../../../../assets/images/emp_pics/<?php echo $row_Recordset1['employee_id']; ?>.bmp"  onerror="this.src='avatar1.png';"  width="100" height="105" alt="<?php echo $row_Recordset1['name_english']?>" class="thumbnail" style="display: block;margin:10px auto">
                                                                        <!--<img src="../../../../../assets/images/emp_pics/--><?php //echo $row_Recordset1['employee_id']; ?><!--.bmp" onerror="this.src='avatar1.png';" width="120" height="160" alt="--><?php //echo $row_Recordset1['name_english']?><!--" style="transition: .5s ease;backface-visibility: hidden;"/>-->
                                                                        <kbd style="position: absolute;right: 10px;bottom: 10px;font-size: 14px;"><?php echo $row_Recordset1['employee_id']; ?></kbd>
                                                                    </span>
                                                                    <div class="middle">
                                                                        <div class="employee-name"><?php if($_SESSION['language']=='AR') { $name=explode(' ', trim($row_Recordset1['name_arabic']) );}else{$name=explode(' ',trim($row_Recordset1['name_english']) );}
                                                                            echo $name[0].' '.$name[1];?></div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php }while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1))?>
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

                                    <!-- end row -->

                                    <!-- row -->

                                    <div class="row">

                                    </div>

                                    <!-- end row -->

                                </section>
                                <!-- end widget grid -->


                            </div>
										<!-- End Content -->
										</div>

										</section>
                    <br><br><br><br><br><br>
				</section>
			</main>
		</section>
        
        <?php
         include('../../../../assets/footer_smart.php');
        ?>
	</body>
</html>
