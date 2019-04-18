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
        .table thead tr th{background-color: #ccc;}
    </style>
</head>
<body style="height:100%" <?php if($_SESSION['language']=='AR') { ?>class="smart-rtl" <?php } ?>>
<section class="employees">

    <main class="main" style="height:82%">
        <section class="body" style="height:100%">




            <section>
                <div class="container_">
                    <!-- Start Content -->
                    <div id="content">
                        <div>
                            <h4 style="text-align: center;background: #875a7b;color: #fff;margin: auto;width: fit-content;padding: 5px;border-radius: 10px;"><?php echo 'Required Labs from Oriental Wavers Company to Provider Name';?></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt="">
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-5"><h4><?php echo 'Clinic Name:';?></h4></div><div class="col-md-7"><p><?php echo 'test';?></p></div>
                                <div class="col-md-5"><h4><?php echo 'Employee ID:';?></h4></div><div class="col-md-7"><p><?php echo 'test';?></p></div>
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-5"><h4><?php echo 'Date:';?></h4></div><div class="col-md-7"><p><?php echo 'test';?></p></div>
                                <div class="col-md-5"><h4><?php echo 'Dr.';?></h4></div><div class="col-md-7"><p><?php echo 'name';?></p></div>
                                <div class="col-md-5"><h4><?php echo 'Invoice No:';?></h4></div><div class="col-md-7"><p><?php echo 'test';?></p></div>
                                <div class="col-md-5"><h4><?php echo 'Branch:';?></h4></div><div class="col-md-7"><p><?php echo 'test';?></p></div>
                                <div class="col-md-5"><h4><?php echo 'Employee Name:';?></h4></div><div class="col-md-7"><p><?php echo 'test';?></p></div>
                            </div>
                        </div>
                        <div style="border: 1px solid #000;background: linear-gradient(#fff, #e4e4e4);">
                            <div>
                                <h4 style="text-align: center;background: #875a7b;color: #fff;margin: auto;width: fit-content;padding: 2px;"><?php echo 'Lab Test';?></h4>
                            </div>

                            <table class="table table-striped table-bordered table-hover" style="width: 75%;margin: 18px auto">
                                <thead>
                                    <tr><th class="text-center"><?php echo 'Lab Test';?></th></tr>
                                </thead>
                                <tbody style="background-color: #fff;">
                                    <tr><td>test</td></tr>
                                    <tr><td>test</td></tr>
                                </tbody>
                            </table>

                            <div class="row" style="padding: 10px">
                                <div class="col-md-1"></div>
                                <label class="col-md-1 text-center"><?php echo 'Remarks:';?></label>
                                <div class="col-md-9" style="background-color: #fff;padding: 10px">aasdads</div>
                            </div>

                            <div><h4 class="text-center"><?php echo 'This Transfer is valid for Seven days';?><span style="float: right;padding-right: 18px;">Dr. name</span></h4></div>

                        </div>


                    </div>
                    <!-- End Content -->
                    <br><br><br><br><br><br><br><br><br>

                </div>

            </section>

        </section>
    </main>
</section>
<?php
include('../../../../assets/footer_smart.php');
?>
</body>
</html>
