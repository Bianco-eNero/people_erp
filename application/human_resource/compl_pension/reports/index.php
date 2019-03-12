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
	//// end of header script ////
		?>

	</head>
	<body>
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/">
						<figure style="height:100%">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/reports/">
						<h1 style="height:100%"><?php echo $vComplementaryPension ; ?></h1>
					</a>
						<ul>
              <?php
              include('../../../../assets/menus/header/compl_pension.php');
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
			<main class="main">
				<section class="control">
					<section class="action">
						<h1><?php echo $vReports; ?></h1>
						<form method="post" action="create">
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
								 <button class="active" id="thumbnails-large">
                   <i class="fas fa-th-large"></i>
                 </button>
                 <button id="list">
                   <i class="fas fa-list-ul">
                   </i>
                 </button>
                 <button id="thumbnails">
                   <i class="fas fa-th">
                   </i>
                 </button>
                 <button id="thumbnails">
                   <a onclick="window.history.back()">
                   <i class="fas fa-arrow-circle-up">
                   </i>
                 </a>
                 </button>



							 </span>
						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body">

          <section class="grid">

                      <a href="personal_account_detailed/?report=1" target="_blank">
          							<article class="employee" style="padding:10px; margin:10px; height:55px">
          								<figure>
                            <i class="fa fa-file fa-2x"></i>

          								</figure>
          								<span style="font-size:20px">حسابات شخصية تفصيلي</span>
          								<div class="clear"></div>
          							</article>
                      </a>
          						</section>



				</section>
			</main>
		</section>
	</body>
</html>
