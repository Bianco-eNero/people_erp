<?php
//// include config script ////
include('../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../assets/languages/english.php');
}
//// End Language ////

//// dont user bootstrap ///
$use_bootstrap='0';
//// end dont user bootsrrap ////

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../assets/header.php');
	//// end of header script ////
		?>
	</head>
	<body style="height:100%">
		<section class="main-menu">
			<header class="header menu-header" style="">
				<nav class="sections">
					<a onclick="goBack()">
						<figure class="back">
							<i class="fas fa-chevron-right"></i>
						</figure>
					</a>
				</nav>
				<?php
	      //// include the section ////
	      //// end include the section ////
	      ?>
				<div class="clear"></div>
			</header>
			<main class="main">
				<nav style="text-align:center">
                    
					<ul <?php if($_SESSION['language']=='AR') { ?>style="padding-left: 0px;
    padding-right: 0px;
    width: 2000px;
    height: 400px;" <?php } else { ?>style="padding-left: 0px;
    padding-right: 0px;
    width: 2000px;
    height: 400px;" <?php } ?> >
						<li><a href="<?php echo $server; ?>application/human_resource/" class="arabic"><img src="<?php echo $server; ?>assets/images/employees.png" /><br /><?php echo $vHumanResource; ?></a></li>
						<li style="display: none"><a href="<?php echo $server; ?>application/safety/" class="arabic"><img src="<?php echo $server; ?>assets/images/helmet.png" /><br /><?php echo $vSafety; ?></a></li>
						<li style="display: none"><a href="<?php echo $server; ?>application/my/" class="arabic"><img src="<?php echo $server; ?>assets/images/apps.png" /><br /><?php echo $v5adamaty; ?></a></li>
						<?php
                        if($_SESSION['system_admin']!=0) {?>
                            <li ><a href="<?php echo $server; ?>application/systemAdmin/" class="arabic"><img src="<?php echo $server; ?>assets/images/settings.png" /><br /><?php echo $vSystemAdmin; ?></a></li>
                        <?php }?>

                        <?php if($_SESSION['company_admin']!=0) {?>
                            <li ><a href="<?php echo $server; ?>application/companyAdmin/" class="arabic"><img src="<?php echo $server; ?>assets/images/settings.png" /><br /><?php echo $vCompanyAdmin; ?></a></li>
                        <?php }?>
                        <li style="display:none"><a href="../discuss"><img src="<?php echo $server; ?>assets/images/discuss.png" /><br />Discuss</a></li>
						<li style="display:none"><a href="../apps"><img src="<?php echo $server; ?>assets/images/apps.png" /><br />Apps</a></li>
						<li style="display:none"><a href="../settings"><img src="<?php echo $server; ?>assets/images/settings.png" /><br />Settings</a></li>
					</ul>
				</nav>
			</main>
			<footer>
				<figure>
					<img src="<?php echo $server; ?>assets/images/footer-logo.png" />
				</figure>
			</footer>
		</section>
	</body>
</html>
