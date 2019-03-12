<?php
//// include config script ////
include('../../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../assets/languages/english.php');
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
	include('../../assets/header.php');
    include('../../assets/header_smart.php');
	//// end of header script ////
		?>
		
		<style>
            *{font-weight: 100}
			.tabs-below > .nav-tabs,
.tabs-right > .nav-tabs,
.tabs-left > .nav-tabs {
    border-bottom: 0;
}

.tab-content > .tab-pane,
.pill-content > .pill-pane {
	display: none;
}

.tab-content > .active,
.pill-content > .active {
	display: block;
}

.tabs-below > .nav-tabs {
	border-top: 1px solid #ddd;
}

.tabs-below > .nav-tabs > li {
	margin-top: -1px;
	margin-bottom: 0;
}

.tabs-below > .nav-tabs > li > a {
	-webkit-border-radius: 0 0 4px 4px;
		 -moz-border-radius: 0 0 4px 4px;
					border-radius: 0 0 4px 4px;
}

.tabs-below > .nav-tabs > li > a:hover,
.tabs-below > .nav-tabs > li > a:focus {
	border-top-color: #ddd;
	border-bottom-color: transparent;
}

.tabs-below > .nav-tabs > .active > a,
.tabs-below > .nav-tabs > .active > a:hover,
.tabs-below > .nav-tabs > .active > a:focus {
	border-color: transparent #ddd #ddd #ddd;
}

.tabs-left > .nav-tabs > li,
.tabs-right > .nav-tabs > li {
	float: none;
}

.tabs-left > .nav-tabs > li > a,
.tabs-right > .nav-tabs > li > a {
	min-width: 74px;
	margin-right: 0;
	margin-bottom: 3px;
}

.tabs-left > .nav-tabs {
	float: left;
	margin-right: 19px;
	border-right: 1px solid #ddd;
}

.tabs-left > .nav-tabs > li > a {
	margin-right: -1px;
	-webkit-border-radius: 4px 0 0 4px;
	   -moz-border-radius: 4px 0 0 4px;
			border-radius: 4px 0 0 4px;
}

.tabs-left > .nav-tabs > li > a:hover,
.tabs-left > .nav-tabs > li > a:focus {
	border-color: #eeeeee #dddddd #eeeeee #eeeeee;
}

.tabs-left > .nav-tabs .active > a,
.tabs-left > .nav-tabs .active > a:hover,
.tabs-left > .nav-tabs .active > a:focus {
	border-color: #ddd transparent #ddd #ddd;
	*border-right-color: #ffffff;
}

.tabs-right > .nav-tabs {
	float: right;
	margin-left: 19px;
	border-left: 1px solid #ddd;
}

.tabs-right > .nav-tabs > li > a {
	margin-left: -1px;
	-webkit-border-radius: 0 4px 4px 0;
		 -moz-border-radius: 0 4px 4px 0;
					border-radius: 0 4px 4px 0;
}

.tabs-right > .nav-tabs > li > a:hover,
.tabs-right > .nav-tabs > li > a:focus {
	border-color: #eeeeee #eeeeee #eeeeee #dddddd;
}

.tabs-right > .nav-tabs .active > a,
.tabs-right > .nav-tabs .active > a:hover,
.tabs-right > .nav-tabs .active > a:focus {
	border-color: #ddd #ddd #ddd transparent;
	*border-left-color: #ffffff;
}
<?php if($_SESSION['language']=='AR') { ?>
            .nav-tabs{border-left:none!important;}
            .nav-tabs li{border-left: 1px solid #ddd; }
            .nav-tabs li a{margin-bottom: 0!important; }
            .active{border-left:none!important; }
<?php }?>

		</style>

        <!--
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
										<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
										<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
										<!------ Include the above in your HEAD tag ---------->

        
        <!--
										<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        -->
        
	</head>
	<body style="height:100%" <?php if($_SESSION['language']=='AR') { ?>class="smart-rtl" <?php } ?>>
		<section class="employees">
			<header class="header">
				<nav class="sections" style="width: <?php if($_SESSION['language']=='EN') { echo '70%'; }else{ echo '53%'; }?>">
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/" style="width:30%" >
						<h1 style="height: 100%;"><?php echo $vHumanResource; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../assets/menus/header/human_resource.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../assets/menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main" style="height:82%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="compl_pension/create" style="display:none">
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
					
				</section>
				<section class="body" style="height:95%">




										<section>
										<div class="container_">
										<!-- Start Content -->
           
											
											<div class="row">
				
									<div class="col-sm-2">
				
										<div class="well well-sm bg-color-pinkDark txt-color-white text-center">
											
											
											<table width="100%" border="0" cellspacing="3" cellpadding="3">
    											<tbody>
													<tr>
														
														<td style="text-align: center">
															<i class="fa fa-3x fa-male"></i>
															<h5 style="text-align: center">342</h5>
														</td>
														
														<td style="text-align: center">
														
															<i class="fa fa-3x fa-female"></i>
											<h5 style="text-align: center">442</h5>
											
															
														</td>
													</tr>
												</tbody>
											</table>
											
											
											
											
											
											
											
											
											
										</div>
				
									</div>
				
									
									
												
												
				
								</div>
											
										
											
											<!-- widget div-->
								<div role="content">
				
									<!-- widget edit box -->
									
									
									
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body">
				
										<div class="col-md-12">	
			<!-- tabs left -->
			<div class="tabbable <?php if($_SESSION['language']=='EN') { ?> tabs-left <?php } else { ?> tabs-right <?php } ?>">
				<ul class="nav nav-tabs" style="width: 150px">
					
					<li class="active"><a  href="#a" data-toggle="tab"><?php echo $vOrganizationSystem; ?></a></li>
					
					<li ><a href="#b" data-toggle="tab"><?php echo $vEmployees ; ?></a></li>
					
					<li><a href="#c" data-toggle="tab">Twee</a></li>
					
				</ul>
				<div class="tab-content">
                    <div class="tab-pane active" id="a" style="font-weight: 100">
						
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5 sortable-grid ui-sortable">
						<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false" role="widget">
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
								<header role="heading">

									<h2>Bar Chart </h2>				
									
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

								<!-- widget div-->
								<div role="content">
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
										
										<!-- this is what the user will see -->
										<canvas id="barChart" height="428" width="1070" style="width: 535px; height: 214px;"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							</div>
							
							<div class="col-xs-12 col-sm-8 col-md-5 col-lg-5 sortable-grid ui-sortable">
						<div class="jarviswidget" id="wid-id-2" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-editbutton="false" data-widget-sortable="false" role="widget">
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
								<header role="heading">

									<h2>Bar Chart </h2>				
									
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

								<!-- widget div-->
								<div role="content">
									
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input class="form-control" type="text">	
									</div>
									<!-- end widget edit box -->
									
									<!-- widget content -->
									<div class="widget-body"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
										
										<!-- this is what the user will see -->
										<canvas id="barChart" height="428" width="1070" style="width: 535px; height: 214px;"></canvas>

									</div>
									<!-- end widget content -->
									
								</div>
								<!-- end widget div -->
								
							</div>
							</div>
						</div>
							
					
					</div>
                    <div class="tab-pane " id="b">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. Aliquam in felis sit amet augue.</div>
                    <div class="tab-pane" id="c">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae. </div>
				</div>
			</div>
			<!-- /tabs -->
		</div>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->

                                            
											
											<div class="container">
   
	
</div>
                                            <!-- End Content -->
                                             
										
										</div>

										</section>

				</section>
			</main>
		</section>
        <?php
         include('../../assets/footer_smart.php');
        ?>
		
		<script src="../../assets/js/plugin/moment/moment.min.js"></script>
		<script src="../../assets/js/plugin/chartjs/chart.min.js"></script>

		<script type="text/javascript">

			$(document).ready(function() {
			 	
				/* DO NOT REMOVE : GLOBAL FUNCTIONS!
				 *
				 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
				 *
				 * // activate tooltips
				 * $("[rel=tooltip]").tooltip();
				 *
				 * // activate popovers
				 * $("[rel=popover]").popover();
				 *
				 * // activate popovers with hover states
				 * $("[rel=popover-hover]").popover({ trigger: "hover" });
				 *
				 * // activate inline charts
				 * runAllCharts();
				 *
				 * // setup widgets
				 * setup_widgets_desktop();
				 *
				 * // run form elements
				 * runAllForms();
				 *
				 ********************************
				 *
				 * pageSetUp() is needed whenever you load a page.
				 * It initializes and checks for all basic elements of the page
				 * and makes rendering easier.
				 *
				 */
				
				 pageSetUp();
				 
				/*
				 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
				 * eg alert("my home function");
				 * 
				 * var pagefunction = function() {
				 *   ...
				 * }
				 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
				 * 
				 * TO LOAD A SCRIPT:
				 * var pagefunction = function (){ 
				 *  loadScript(".../plugin.js", run_after_loaded);	
				 * }
				 * 
				 * OR
				 * 
				 * loadScript(".../plugin.js", run_after_loaded);
				 */

				 // reference: http://www.chartjs.org/docs/


				var randomScalingFactor = function() {
		            return Math.round(Math.random() * 100);
		            //return 0;
		        };
		        var randomColorFactor = function() {
		            return Math.round(Math.random() * 255);
		        };
		        var randomColor = function(opacity) {
		            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
		        };

		        var LineConfig = {
		            type: 'line',
		            data: {
		                labels: ["January", "February", "March", "April", "May", "June", "July"],
		                datasets: [{
		                    label: "My First dataset",
		                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
		                    
		                }, {
		                    label: "My Second dataset",
		                    data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()],
		                }]
		            },
		            options: {
		                responsive: true,
		                tooltips: {
		                    mode: 'label'
		                },
		                hover: {
		                    mode: 'dataset'
		                },
		                scales: {
		                    xAxes: [{
		                        display: true,
		                        scaleLabel: {
		                            show: true,
		                            labelString: 'Month'
		                        }
		                    }],
		                    yAxes: [{
		                        display: true,
		                        scaleLabel: {
		                            show: true,
		                            labelString: 'Value'
		                        },
		                        ticks: {
		                            suggestedMin: 0,
		                            suggestedMax: 100,
		                        }
		                    }]
		                }
		            }
		        };

		        $.each(LineConfig.data.datasets, function(i, dataset) {
		            dataset.borderColor = 'rgba(0,0,0,0.15)';
		            dataset.backgroundColor = randomColor(0.5);
		            dataset.pointBorderColor = 'rgba(0,0,0,0.15)';
		            dataset.pointBackgroundColor = randomColor(0.5);
		            dataset.pointBorderWidth = 1;
		        });

		        // bar chart example

		        var barChartData = {
		            labels: ["January", "February", "March", "April", "May", "June", "July"],
		            datasets: [{
		                label: 'Dataset 1',
		                backgroundColor: "rgba(220,220,220,0.5)",
		                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
		            }, {
		                label: 'Dataset 2',
		                backgroundColor: "rgba(151,187,205,0.5)",
		                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
		            }, {
		                label: 'Dataset 3',
		                backgroundColor: "rgba(151,187,205,0.5)",
		                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
		            }]

		        };

		        // radar example

		        var RadarConfig = {
			        type: 'radar',
			        data: {
			            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
			            datasets: [{
			                label: "My First dataset",
			                backgroundColor: "rgba(220,220,220,0.2)",
			                pointBackgroundColor: "rgba(220,220,220,1)",
			                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
			            }, {
			                label: "My Second dataset",
			                backgroundColor: "rgba(151,187,205,0.2)",
			                pointBackgroundColor: "rgba(151,187,205,1)",
			                hoverPointBackgroundColor: "#fff",
			                pointHighlightStroke: "rgba(151,187,205,1)",
			                data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
			            },]
			        },
			        options: {
			            legend: {
			                position: 'top',
			            },
			            
			            scale: {
			              reverse: false,
			              ticks: {
			                beginAtZero: true
			              }
			            }
			        }
			    };

			    // doughnut example

			    var DoughtnutConfig = {
			        type: 'doughnut',
			        data: {
			            datasets: [{
			                data: [
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                ],
			                backgroundColor: [
			                    "#F7464A",
			                    "#46BFBD",
			                    "#FDB45C",
			                    "#949FB1",
			                    "#4D5360",
			                ],
			                label: 'Dataset 1'
			            }],
			            labels: [
			                "Red",
			                "Green",
			                "Yellow",
			                "Grey",
			                "Dark Grey"
			            ]
			        },
			        options: {
			            responsive: true,
			            legend: {
			                position: 'top',
			            }
			        }
			    };

			    // polar chart example 

			    var PolarConfig = {
			        data: {
			            datasets: [{
			                data: [
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                ],
			                backgroundColor: [
			                    "#F7464A",
			                    "#46BFBD",
			                    "#FDB45C",
			                    "#949FB1",
			                    "#4D5360",
			                ],
			                label: 'My dataset' // for legend
			            }],
			            labels: [
			                "Red",
			                "Green",
			                "Yellow",
			                "Grey",
			                "Dark Grey"
			            ]
			        },
			        options: {
			            responsive: true,
			            legend: {
			                position: 'top',
			            },
			            title: {
			                display: true,
			                text: 'Our Favorite Dataset'
			            },
			            scale: {
			              ticks: {
			                beginAtZero: true
			              },
			              reverse: false
			            },
			            animateRotate:false
			        }
			    };

			    // pie chart example
			    var PieConfig = {
			        type: 'pie',
			        data: {
			            datasets: [{
			                data: [
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                    randomScalingFactor(),
			                ],
			                backgroundColor: [
			                    "#F7464A",
			                    "#46BFBD",
			                    "#FDB45C",
			                    "#949FB1",
			                    "#4D5360",
			                ],
			            }],
			            labels: [
			                "Red",
			                "Green",
			                "Yellow",
			                "Grey",
			                "Dark Grey"
			            ]
			        },
			        options: {
			            responsive: true
			        }
			    };

				window.onload = function() {
		            window.myLine = new Chart(document.getElementById("lineChart"), LineConfig);
		            window.myBar = new Chart(document.getElementById("barChart"), {
		                type: 'bar',
		                data: barChartData,
		                options: {
		                    responsive: true,
		                }
		            });
		            window.myRadar = new Chart(document.getElementById("radarChart"), RadarConfig);
        			window.myDoughnut = new Chart(document.getElementById("doughnutChart"), DoughtnutConfig);
        			window.myPolarArea = Chart.PolarArea(document.getElementById("polarChart"), PolarConfig);
        			window.myPie = new Chart(document.getElementById("pieChart"), PieConfig);
		        };
			    
			})
		
		</script>
		
	</body>
</html>
