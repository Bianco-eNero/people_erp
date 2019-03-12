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


///// Include news records ////
mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT * FROM employee";
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
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" >
						<h1 style="height:100%"><?php echo $vPersonnelSystem; ?></h1>
					</a>
						<ul>
							<a href=""><li><?php echo $vEmployees ; ?></li></a>

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
						<h1><?php echo $vEmployees; ?></h1>

							<fieldset>
                <a href="add_employee/">
								<input type="submit" name="create" id="create" value="<?php echo $vAdd; ?>" class="focus" />
              </a>
								<input type="submit" name="import" id="import" value="IMPORT" class="no-focus" />
							</fieldset>
					
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
								 <button class="active" id="thumbnails-large"><i class="fas fa-th-large"></i></button><button id="list"><i class="fas fa-list-ul"></i></button><button id="thumbnails"><i class="fas fa-th"></i></button>
							 </span>
						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body">

<div class="table-responsive">
  <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm">
    <thead>
      <tr>
        <th width="1" class="o_list_record_selector">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" id="checkbox-86" class="custom-control-input">
            <label for="checkbox-86" class="custom-control-label">​
            </label>
          </div>
        </th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vPayroll; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vName; ?></th>
        <th class="o_column_sortable" <?php if($_SESSION['language']=='AR') { ?>style="text-align:right" <?php } ?>><?php echo $vDateOfBirth; ?></th>
        <th class="o_column_sortable">Department</th>
        <th class="o_column_sortable">Job Position</th>
        <th class="o_column_sortable">Manager</th>
      </tr></thead><tbody class="ui-sortable">

        <?php do { ?>
        <tr class="o_data_row">
          <td width="1" class="o_list_record_selector">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" id="checkbox-87" class="custom-control-input">
              <label for="checkbox-87" class="custom-control-label">​</label>
            </div>
          </td>
          <td class="o_data_cell">Hany Adel</td>
          <td class="o_data_cell"></td>
          <td class="o_data_cell">admin@example.com</td>
          <td class="o_data_cell"></td>
          <td class="o_data_cell"></td>
          <td class="o_data_cell"></td>
        </tr>


            <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>




        <tr><td colspan="7">&nbsp;</td>
        </tr><tr><td colspan="7">&nbsp;</td>
        </tr><tr><td colspan="7">&nbsp;</td>
        </tr>
      </tbody>
      </table>
    </div>

				</section>
			</main>
		</section>
	</body>
</html>
