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


$use_bootstrap='1';

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../../assets/header.php');
	//// end of header script ////
		?>

	</head>
	<body>
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" >
						<h1 style="height: 100%;"><?php echo $vComplementaryPension; ?></h1>
					</a>
						<ul>
							<a href="members/"><li><?php echo $vMembers ; ?></li></a>
							<a href=""><li><?php echo $vSavingInstallments ; ?></li></a>
              <a href=""><li><?php echo $vInvReturn ; ?></li></a>
              <a href=""><li><?php echo $vPayments ; ?></li></a>
              <a href=""><li><?php echo $vSettings ; ?></li></a>
              <a href=""><li><?php echo $vReports ; ?></li></a>
						</ul>
				</nav>
        <section class="account">
          <ul>
            <li style="display:none" id="activities"><i class="far fa-clock"></i></li>
            <li style="display:none" id="conversations"><i class="fas fa-comments"></i><i class="circle">1</i></li>
            <li style="display:none" id="customization"><img src="../img/settings-small.png" /><i class="fas fa-caret-down"></i></li>
            <li id="avatar">
                <section class="dropdown" id="avatar-menu">
                  <ul style="">
                    <li><a href="">Documentation</a></li>
                    <li><a href="">Support</a></li>
                    <li><a href="">Shortcuts</a></li>
                  </ul>
                  <hr />
                  <ul>
                    <?php
                    if($_SESSION['language']=='AR')
                    {
                     ?>
                    <li><a href="<?php echo $english_link; ?>">English Language</a></li>
                  <?php } ?>
                  <?php
                  if($_SESSION['language']=='EN')
                  {
                   ?>

                    <li><a href="<?php echo $arabic_link; ?>">اللغة العربية</a></li>
                  <?php } ?>
                    <li><a href="<?php echo $server; ?>index.php">Log out</a></li>
                  </ul>
                </section>
                <img src="<?php echo $server; ?>assets/images/avatar.png" />Hamdi Belal<i class="fas fa-caret-down"></i>
            </li>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main">
				<section class="control">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="create">
							<fieldset>
								<input type="submit" name="create" id="create" value="CREATE" class="focus" />
								<input type="submit" name="import" id="import" value="IMPORT" class="no-focus" />
							</fieldset>
						</form>
					</section>
					<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left <?php } ?>">
						<fieldset class="search">
							<input class="arabic" type="text" id="search" placeholder="<?php echo $vSearch ; ?>..." />

						</fieldset>
						<fieldset class="refine">
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
				<section class="body">

          <section class="employee-create">
          						<header>
          							<button id="active"><i class="fas fa-archive"></i>Active</button>
          							<div class="clear"></div>
          						</header>
          						<section class="title">
          							<figure>
          								<img src="../../img/placeholder.png">
          							</figure>
          							<fieldset>
          								<label for="name">Name</label><br>
          								<input type="text" id="name" placeholder="Employee's Name"><br>
          								<input type="text" id="part-time" placeholder="e.g. Part Time"><i class="fas fa-caret-down"></i>
          							</fieldset>
          							<div class="clear"></div>
          						</section>
          						<section class="information">
          							<header>
          								<h2 class="active">Work Information</h2><h2>Private Information</h2><h2>HR Settings</h2>
          							</header>
          							<main>
          								<section class="left">
          									<h3>Contact Information</h3>
          									<fieldset>

          										<label for="work-address">Work Address</label><input type="text" id="work-address" value="Bianco"><i class="fas fa-caret-down"></i><button id="work-address-btn"><i class="fa fa-external-link-alt"></i></button><br>

          										<label for="work-address">Work Location</label><input type="text" id="work-address" value=""><br>

          										<label for="work-email">Work Email</label><input type="text" id="work-email" value=""><br>

          										<label for="work-mobile">Work Mobile</label><input type="text" id="work-mobile" value=""><br>

          										<label for="work-phone">Work Phone</label><input type="text" id="work-phone" value="">

          									</fieldset>
          								</section>
          								<section class="right">
          									<h3>Position</h3>
          									<fieldset>

          										<label for="department">Department</label>

                              <select class="form-control col-md-8" id="exampleSelect1" placeholder="Matching">
                              <option>Matching</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              </select>


                              <br>

          										<label for="job-position">Job Position</label><input type="text" id="job-position" value=""><i class="fas fa-caret-down"></i><br>

          										<label for="job-title">Job Title</label><input type="text" id="job-title" value=""><i class="fas fa-caret-down"></i><br>

          										<label for="manager">Manager</label><input type="text" id="manager" value=""><i class="fas fa-caret-down"></i><br>

          										<label for="coach">Coach</label><input type="text" id="coach" value=""><i class="fas fa-caret-down"></i>

          									</fieldset>
          								</section>





          								<section class="other">
          									<fieldset>
          										<textarea id="other-info" placeholder="Other Information ..."></textarea>
          									</fieldset>
          								</section>
          							</main>
          						</section>
          					</section>


				</section>
			</main>
		</section>
	</body>
</html>
