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
$search=$_GET['search'];

$cooo=$_SESSION['current_company'];

mysqli_select_db($website,$database_website );
$query_Recordset1 = "SELECT * FROM employee WHERE (cp_member_type_id=2 || cp_member_type_id=6) AND organization='$organization' AND employee_id LIKE '%$search%' AND organization='$cooo' ORDER BY employee_id";
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
                <a href="<?php echo $server; ?>application/human_resource/compl_pension/">
                    <h1 style="height:100%"><?php echo $vComplementaryPension; ?></h1>
                </a>
                <ul>
                    <?php
                    //// include compl pnsion header ////
                    include('../../../../assets/menus/header/compl_pension.php')
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
                    <h1><span class="root"><?php echo $vMembers; ?></span></h1>

                    <fieldset>
                        <a class="focus" href="add/" style="text-decoration:none;"><input type="submit" name="create"
                                                                                          id="create"
                                                                                          value="<?php echo $vAdd; ?>"
                                                                                          class="focus"/></a>

                        <a class="focus" href="update_salary_data/" style="text-decoration:none;"><input type="submit"
                                                                                                         name="create"
                                                                                                         id="create"
                                                                                                         value="<?php echo $vUpdateTheSalary; ?>"
                                                                                                         class="focus"/></a>

                        <a class="focus" href="import_employees_data/" style="text-decoration:none;"><input
                                    type="submit" name="create" id="create" value="<?php echo $vImportEmployeesData; ?>"
                                    class="focus"/></a>

                        <a class="focus" href="update_salary_data/" style="text-decoration:none; display: none"><input
                                    type="submit" name="create" id="create" value="<?php echo $vUpdateTheSalary; ?>"
                                    class="focus"/></a>


                    </fieldset>

                </section>
                <section
                        style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
                    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>"
                         width="129" height="84" alt=""></section>

                <section class="navigation"
                         style="<?php if ($_SESSION['language'] == 'AR') { ?>float:left ; margin-right:400px <?php } ?>">
                    <fieldset class="search">
                        <form target="_self" method="get">
                            <input autofocus="autofocus" onfocus="this.select()"
                                   value="<?php if (isset($_GET['search'])) {
                                       echo $_GET['search'];
                                   } ?>" class="arabic" name="search" type="text" id="search"
                                   placeholder="<?php echo $vSearchByPayroll; ?>"/>
                        </form>
                    </fieldset>
                    <fieldset class="refine"
                              <?php if ($_SESSION['language'] == 'AR') { ?>style="margin-left:0px <?php } ?> ">
                        <span style="font-size: 14px"><?php echo $row_crud_case['case_code']; ?> </span> &nbsp

                        <button id="filters"><i class="fas fa-filter"></i>Filters<i class="fas fa-caret-down"></i>
                        </button>
                        <button id="group-by"><i class="fas fa-bars"></i>Group By<i class="fas fa-caret-down"></i>
                        </button>
                        <button id="favourites"><i class="fas fa-star"></i>Favourites<i class="fas fa-caret-down"></i>
                        </button>
                    </fieldset>
                    <fieldset class="view">
                        <span class="count">1-1 / 1</span>
                        <span class="directions">
								 <button id="right"><i class="fas fa-chevron-right"></i></button>
								 <button id="left"><i class="fas fa-chevron-left"></i></button>
							</span>
                        <span class="layout">
								 <button class="active" id="thumbnails-large"><i class="fas fa-th-large"></i></button><button
                                    id="list"><i class="fas fa-list-ul"></i></button><button id="thumbnails"><i
                                        class="fas fa-th"></i></button>
							 </span>
                        <span class="print">
								<a href="<?php echo $server; ?>application/human_resource/compl_pension/reports/members/?report=1"
                                   target="_blank">
								 <button class="" id=""><i class="fas fa-print"></i></button>
							 </a>
							 </span>
                    </fieldset>
                    <div class="clear"></div>
                </section>
                <div class="clear"></div>
            </section>
            <section class="body" style="height:100%">
                <section class="employee-create">
                    <div class="table-responsive">
                        <table class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
                            <thead>
                            <tr>

                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vCompanyCode; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vMemberNumber; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vPayroll; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vName; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vDateOfBirth; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vBasicSalary; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vExcludedSpInc; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo $vProductionIncentive; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo ''; ?></th>
                                <th class="o_column_sortable"
                                    <?php if ($_SESSION['language'] == 'AR') { ?>style="text-align:right" <?php } ?>><?php echo ''; ?></th>
                                <th class="o_column_sortable"></th>
                            </tr>

                            </thead>

                            <tbody class="ui-sortable">

                            <?php do { ?>
                                <tr class="o_data_row">

                                    <td class="o_data_cell"><?php echo $row_Recordset1['cp_company_code']; ?></td>
                                    <td class="o_data_cell"><?php echo $row_Recordset1['cp_number']; ?></td>
                                    <td class="o_data_cell"><?php echo $row_Recordset1['employee_id']; ?></td>
                                    <td class="o_data_cell"><?php
                                        if ($_SESSION['language'] == 'AR') {
                                            echo $row_Recordset1['name_arabic'];
                                        }
                                        if ($_SESSION['language'] == 'EN') {
                                            echo $row_Recordset1['name_english'];
                                        }
                                        ?></td>
                                    <td class="o_data_cell"><?php echo $row_Recordset1['birth_date']; ?></td>
                                    <td class="o_data_cell"><?php echo $row_Recordset1['cp_basic_salary_total_last_july']; ?></td>
                                    <td class="o_data_cell"><?php echo $row_Recordset1['total_excluded_increases_le']; ?></td>
                                    <td class="o_data_cell"><?php echo $row_Recordset1['current_production_inc_le']; ?></td>
                                    <td class="o_data_cell">

                                        <a href="../../../../application/human_resource/compl_pension/reports/personal_account_detailed/?id=<?php echo $row_Recordset1['employee_id']; ?>&report=1" target="_blank">
                                            <i class="fas fa-file" title="<?php echo $vPersonalAccountDetailed; ?>"></i>
                                        </a>
                                        &nbsp &nbsp

                                        <a href="../../../../application/human_resource/personnel/employees/employee/?funds=1&id=<?php echo $row_Recordset1['employee_id']; ?>"
                                           target="_blank">
                                            <i class="fas fa-glasses fa-fw" title="<?php echo $vEmployeeData; ?>"></i>
                                        </a>
                                        &nbsp &nbsp

                                        <a href="edit/?id=<?php echo $row_Recordset1['employee_id']; ?>">
                                            <i class="fas fa-edit" title="<?php echo $vEdit; ?>"></i>
                                        </a>

                                        &nbsp &nbsp

                                        <a onclick="return confirm('<?php echo $vDeleteMessage; ?>');" href="delete/?id=<?php echo $row_Recordset1['employee_id']; ?>">
                                            <i class="fas fa-times" title="<?php echo $vDelete; ?>"></i>
                                        </a>


                                    </td>
                                    <td class="o_data_cell"></td>
                                    <td class="o_data_cell"></td>
                                </tr>


                            <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>


                            </tbody>
                        </table>
                    </div>

                </section>
            </section>
        </main></body>
</html>
