<?php
//// include config script ////
include('../../config.php');
//// end of config script ////

//// Include Language ////
include('../../languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../languages/english.php');
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
	include('../../header.php');
        include('../../header_smart.php');
	//// end of header script ////
		?>

			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
										<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
										<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
										<!------ Include the above in your HEAD tag ---------->

										<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


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
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" style="width:50%" >
						<h1 style="height: 100%;"><?php echo $vComplementaryPension; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../menus/header/compl_pension.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="../../../application/human_resource/compl_pension/create" style="display:none">
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
										<div class="container_">
										<!-- Start Content -->
<div id="content">

				<div class="inbox-nav-bar no-content-padding">

					<h1 class="page-title txt-color-blueDark hidden-tablet"><i class="fa fa-fw fa-inbox"></i> Inbox &nbsp;
						<span class="btn-group">
							<a href="#" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">Separated link</a>
								</li>
							</ul>
						</span>
					</h1>

					<div class="btn-group hidden-desktop visible-tablet">
						<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							Inbox <i class="fa fa-caret-down"></i>
						</button>
						<ul class="dropdown-menu pull-left">
							<li>
								<a href="javascript:void(0);" class="inbox-load">Inbox <i class="fa fa-check"></i></a>
							</li>
							<li>
								<a href="javascript:void(0);">Sent</a>
							</li>
							<li>
								<a href="javascript:void(0);">Trash</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);">Spam</a>
							</li>
						</ul>

					</div>

					<div class="inbox-checkbox-triggered">

						<div class="btn-group">
							<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Mark Important" class="btn btn-default"><strong><i class="fa fa-exclamation fa-lg text-danger"></i></strong></a>
							<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Move to folder" class="btn btn-default"><strong><i class="fa fa-folder-open fa-lg"></i></strong></a>
							<a href="javascript:void(0);" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete" class="deletebutton btn btn-default"><strong><i class="fa fa-trash-o fa-lg"></i></strong></a>
						</div>

					</div>

					<a href="javascript:void(0);" id="compose-mail-mini" class="btn btn-primary pull-right hidden-desktop visible-tablet"> <strong><i class="fa fa-file fa-lg"></i></strong> </a>

					<div class="btn-group pull-right inbox-paging">
						<a href="javascript:void(0);" class="btn btn-default btn-sm"><strong><i class="fa fa-chevron-left"></i></strong></a>
						<a href="javascript:void(0);" class="btn btn-default btn-sm"><strong><i class="fa fa-chevron-right"></i></strong></a>
					</div>
					<span class="pull-right"><strong>1-30</strong> of <strong>3,452</strong></span>

				</div>

				<div id="inbox-content" class="inbox-body no-content-padding">

					<div class="inbox-side-bar">

						<a href="javascript:void(0);" id="compose-mail" class="btn btn-primary btn-block"> <strong>Compose</strong> </a>

						<h6> Folder <a href="javascript:void(0);" rel="tooltip" title="" data-placement="right" data-original-title="Refresh" class="pull-right txt-color-darken"><i class="fa fa-refresh"></i></a></h6>

						<ul class="inbox-menu-lg">
							<li class="active">
								<a class="inbox-load" href="javascript:void(0);"> Inbox (14) </a>
							</li>
							<li>
								<a href="javascript:void(0);">Sent</a>
							</li>
							<li>
								<a href="javascript:void(0);">Draft</a>
							</li>
							<li>
								<a href="javascript:void(0);">Trash</a>
							</li>
						</ul>

						<h6> Quick Access <a href="javascript:void(0);" rel="tooltip" title="" data-placement="right" data-original-title="Add Another" class="pull-right txt-color-darken"><i class="fa fa-plus"></i></a></h6>

						<ul class="inbox-menu-sm">
							<li>
								<a href="javascript:void(0);"> Images (476)</a>
							</li>
							<li>
								<a href="javascript:void(0);">Documents (4)</a>
							</li>
						</ul>

						<div class="air air-bottom inbox-space">

							3.5GB of <strong>10GB</strong><a href="javascript:void(0);" rel="tooltip" title="" data-placement="top" data-original-title="Empty Spam" class="pull-right txt-color-darken"><i class="fa fa-trash-o fa-lg"></i></a>

							<div class="progress progress-micro">
								<div class="progress-bar progress-primary" style="width: 34%;"></div>
							</div>
						</div>

					</div>

					<div class="table-wrap custom-scroll animated fast fadeInRight" style="opacity: 1; width:100%"><table id="inbox-table" class="table table-striped table-hover">
	<tbody>

		<tr id="msg1" class="unread">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Alex Jones
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span><span class="label bg-color-orange">WORK</span> Karjua Marou</span> New server for datacenter needed
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>
					<a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="FILES: rocketlaunch.jpg, timelogs.xsl" class="txt-color-darken"><i class="fa fa-paperclip fa-lg"></i></a>
				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg2" class="unread">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Sadi Orlaf
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span><span class="label bg-color-teal">HOME</span> SmartAdmin.com</span> Sed ut perspiciatis unde....
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>
					<a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="rocketlaunch.jpg, timelogs.xsl" class="txt-color-darken"><i class="fa fa-paperclip fa-lg"></i></a>
				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg3">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Arik Lamora
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Facebook.com</span> Sed ut perspiciatis unde omnis iste natus error...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg4">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Robin Hood
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>10 Jobs</span> Sed ut perspiciatis unde omnis iste natus error...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg5">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					John Limar
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Project Date</span> Sed ut perspiciatis unde omnis iste natus...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>
					<a href="javascript:void(0);" rel="tooltip" data-placement="left" data-original-title="payscale-changes.pdf" class="txt-color-darken"><i class="fa fa-paperclip fa-lg"></i></a>
				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg6">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Jeff Hopkin <span class="text-danger">Draft</span>
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Hey John!</span> Sed ut perspiciatis unde omnis...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg7">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Toronto News
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Mayor Rod Fierd!</span> Sed ut perspiciatis unde sit...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg8">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Michael Bleigh
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Past due</span> Sed ut perspiciatis unde omnis iste na
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg9">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Me, Navin
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span><span class="label bg-color-teal">HOME</span> John!</span> Sed ut perspiciatis...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg10">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Trello Laka
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Project development</span> @Sed ut perspiciatis unde omnis...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg11">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Doug Baird
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Pora korta casta ricka?</span> Sed ut perspiciatis unde omnis iste...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg12">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Michael Ray, P. Eng
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>John, please add me to your linkedin</span> Linked in request pending.
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg13">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Doug Baird
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Pora korta casta ricka?</span> Sed ut perspiciatis unde omnis iste...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg14">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Doug Baird
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Pora korta casta ricka?</span> Sed ut perspiciatis unde omnis iste...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg15" class="unread">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					<i class="fa fa-warning text-warning"></i> System Email
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span><span class="label bg-color-orange">WORK</span> Sustem Update</span> 2:00PM to 2PM
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg16">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Amazon.ca
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Baby deal of the week!</span> Two new items on your cart...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg17">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					New server for datacenter needed New server for datacenter ne...
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Header blha blah</span> New server for datacenter needed
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg18">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					New server for datacenter needed New server for datacenter ne...
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Header blha blah</span> New server for datacenter needed
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg19">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg20">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg21">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg22">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg23">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Sunny
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Important question!</span> Hey John, I hope you are okay...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg24">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg25">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					Dogue Biryrd
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>Hey whats up?</span> Just checking up on ya...
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>


		<tr id="msg26">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg27">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg28">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg29">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

		<tr id="msg30">
			<td class="inbox-table-icon">
				<div class="checkbox">
					<label>
						<input type="checkbox" class="checkbox style-2">
						<span></span> </label>
				</div>
			</td>
			<td class="inbox-data-from hidden-xs hidden-sm">
				<div>
					System
				</div>
			</td>
			<td class="inbox-data-message">
				<div>
					<span>SmartAdmin</span> You have a new friend request!
				</div>
			</td>
			<td class="inbox-data-attachment hidden-xs">
				<div>

				</div>
			</td>
			<td class="inbox-data-date hidden-xs">
				<div>
					10:23 am
				</div>
			</td>
		</tr>

	</tbody>
</table>

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

				</section>
			</main>
		</section>
        <?php
         include('../../footer_smart.php');
        ?>
	</body>
</html>
