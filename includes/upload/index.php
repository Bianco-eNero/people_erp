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
/*
    if ( isset($_GET['control_id']) && isset($_GET['object_id']) && isset($_GET['table'])&& isset($_GET['field'])&& isset($_GET['id_field'])) {
        $_SESSION['record_id'] = $_GET['record_id'];
        $_SESSION['control_id'] = $_GET['control_id'];
        $_SESSION['object_id'] = $_GET['object_id'];
        $_SESSION['table'] = $_GET['table'];
        $_SESSION['field'] = $_GET['field'];
        $_SESSION['id_field'] = $_GET['id_field'];
    }
*/
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
        *{ font-weight:100;}
        .s2 { color: #D14; }
        .c1 { color: #998; font-style: italic; }
        .mi { color: #099; }
    </style>
</head>
<body style="height:100%" class="smart-rtl"  >
<section class="employees">

    <main class="main" style="height:82%">
        <section class="control">
            <section class="action">
                <h1><?php echo $vUpload; ?></h1>
            </section>
            <section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
                <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt="">
            </section>


        </section>
        <section class="body" style="height:100%">




            <section>
                <div class="container_">
                    <!-- Start Content -->

                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body">

                            <form action="upload.php" class="dropzone" id="mydropzone">
                                <input name="table" value="<?php echo $_GET['table'];?>" type="hidden">
                                <input name="record_id" value="<?php echo $_GET['record_id'];?>" type="hidden">
                                <input name="control_id" value="<?php echo $_GET['control_id'];?>" type="hidden">
                                <input name="object_id" value="<?php echo $_GET['object_id'];?>" type="hidden">
                                <input name="field" value="<?php echo $_GET['field'];?>" type="hidden">
                                <input name="id_field" value="<?php echo $_GET['id_field'];?>" type="hidden">
                                

                            </form>

                        </div>
                        <!-- end widget content -->

                    </div>

                    <!-- End Content -->
                    <br><br><br><br><br><br><br><br><br>

                </div>

            </section>

        </section>
    </main>
</section>

<?php
include('../../assets/footer_smart.php');
?>
<!-- PAGE RELATED PLUGIN(S) -->
<script src="../../assets/smart_theme/js/plugin/dropzone/dropzone.min.js"></script>


<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {
        pageSetUp();
        Dropzone.autoDiscover = false;
        $("#mydropzone").dropzone({
            //url: "/file/post",
            addRemoveLinks : true,
            maxFilesize: 10,
            dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
            dictResponseError: 'Error uploading file!'
        });
    });
</script>
<?php  if ( !isset($_GET['table']) || !isset($_GET['field']) ){?>
    <script  type="text/javascript">
        self.close();
    </script>
<?php } ?>

</body>
</html>
