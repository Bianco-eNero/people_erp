<?php
//// include config script ////
include('../../../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
    include ('../../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
    include ('../../../assets/languages/english.php');
}
//// End Language ////


$use_bootstrap='1';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    //// include header script ////
    include('../../../assets/header.php');
    include('../../../assets/header_smart.php');
    //// end of header script ////
    ?>


    <style>
        *{font-weight: 100}
    </style>
</head>
<body style="height:100%" <?php if($_SESSION['language']=='AR') { ?>class="smart-rtl" <?php } ?>>
<section class="employees">
    <header class="header">
        <nav class="sections">
            <a href="<?php echo $server; ?>application/" style="height: 100%;">
                <figure style="height: 100%;">
                    <i class="fas fa-th"></i>
                </figure>
            </a>
            <a href="<?php echo $server; ?>application/medical/doctor">
                <h1 style="height: 100%;"><?php echo $vMedicalSystem; ?></h1>
            </a>
            <ul>
                <?php
                //// include compl pnsion header ////
                include('../../../assets/menus/header/medical.php')
                ?>
            </ul>
        </nav>
        <section class="account">
            <ul>
                <?php
                $select_company=0;$smart=1;
                include('../../../assets/menus/user_account.php');
                ?>
            </ul>
        </section>

        <div class="clear"></div>
    </header>
    <main class="main" style="height:82%">
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

        </section>
        <section class="body" style="height:100%">




            <section>
                <div class="container_">
                    <!-- Start Content -->



                    <!-- End Content -->
                    <br><br><br><br><br><br><br><br><br>

                </div>

            </section>

        </section>
    </main>
</section>
<?php
include('../../../assets/footer_smart.php');
?>
</body>
</html>
