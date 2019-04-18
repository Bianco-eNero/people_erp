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
        .pagination>.active>a{color:#000;}
        .pagination>.active>a:hover,.pagination>.active>a:active,.pagination>.active>a:focus{color:#875a7b;}
        .dataTables_info{display: none}
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

                    <div id="content" >
                        <form class="row" action="index.php" method="get">
                            <fieldset class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vClinics;?></label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="select-1">
                                            <option>Amsterdam</option>
                                            <option>Miami</option>
                                            <option>Minneapolis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vPatient;?></label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="select-1">
                                            <option>Amsterdam</option>
                                            <option>Miami</option>
                                            <option>Minneapolis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vDoctors;?></label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="select-1">
                                            <option>Amsterdam</option>
                                            <option>Miami</option>
                                            <option>Minneapolis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vFiles;?></label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="select-1">
                                            <option>Amsterdam</option>
                                            <option>Miami</option>
                                            <option>Minneapolis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><input type="checkbox"> <?php echo $vChronicDiseace;?> </label>
                                    <div class="col-md-9">
                                        <input class="form-control" placeholder="Medicine" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?php echo $vUploadDocument;?> </label>
                                    <div class="col-md-9">
                                        <a href="#" onclick="popupCenter('<?php echo $server; ?>includes/upload/?record_id=<?php echo $_GET['id']; ?>&control_id=<?php echo $row_add['crud_add_form_id'] ; ?>&object_id=<?php echo $_GET['id']; ?>&field=files&table=any', 'myPop1',600,500);" class="droid-arabic-kufi btn btn-success" style="color:white">
                                            <i class="fa fa-plus" style="color: white"></i>
                                            <?php echo $vUpload ; ?>
                                        </a>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-info"><?php echo $vSubmit;?></button>
                            </fieldset>
                            <fieldset class="col-md-6" style="border: 1px solid #875a7b;padding: 5px;">
                                <legend><?php echo $vPreMeasurements;?></legend>
                                <div class="form-group" style="margin: 0">
                                    <label class="col-md-2 control-label"><?php echo $vPressure;?></label>
                                    <div class="col-md-4">
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vTemperature;?></label>
                                    <div class="col-md-4">
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vWeight;?></label>
                                    <div class="col-md-4">
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vLength;?></label>
                                    <div class="col-md-4">
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vSugar;?></label>
                                    <div class="col-md-4">
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"><?php echo $vPulseRate;?></label>
                                    <div class="col-md-4">
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <hr>
                        <h4 style="color: #875a7b;"><?php echo $vOnHoldCases;?></h4>
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th data-hide="phone">#</th>
                                <th data-class="expand"><?php echo $vCode;?></th>
                                <th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> <?php echo $vName;?></th>
                                <th data-hide="phone,tablet"><?php echo $vClinic;?></th>
                                <th data-hide="phone,tablet"><?php echo $vDoctors;?></th>
                                <th data-hide="phone,tablet"><?php echo $vMeasurement;?></th>
                                <th data-hide="phone,tablet"><?php echo $vFiles;?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Jennifer</td>
                                <td>1-342-463-8341</td>
                                <td>Et Rutrum Non Associates</td>
                                <td>35728</td>
                                <td>Fogo</td>
                                <td>03/04/14</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Clark</td>
                                <td>1-516-859-1120</td>
                                <td>Nam Ac Inc.</td>
                                <td>7162</td>
                                <td>Machelen</td>
                                <td>03/23/13</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Brendan</td>
                                <td>1-724-406-2487</td>
                                <td>Enim Commodo Limited</td>
                                <td>98611</td>
                                <td>Norman</td>
                                <td>02/13/14</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Warren</td>
                                <td>1-412-485-9725</td>
                                <td>Odio Etiam Institute</td>
                                <td>10312</td>
                                <td>Sautin</td>
                                <td>01/01/13</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Rajah</td>
                                <td>1-849-642-8777</td>
                                <td>Neque Ltd</td>
                                <td>29131</td>
                                <td>Glovertown</td>
                                <td>02/16/13</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Demetrius</td>
                                <td>1-470-329-9627</td>
                                <td>Euismod In Ltd</td>
                                <td>1883</td>
                                <td>Kapolei</td>
                                <td>03/15/13</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Keefe</td>
                                <td>1-188-191-2346</td>
                                <td>Molestie Industries</td>
                                <td>2211BM</td>
                                <td>Modena</td>
                                <td>07/08/13</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Leila</td>
                                <td>1-663-655-8904</td>
                                <td>Est LLC</td>
                                <td>75286</td>
                                <td>Hondelange</td>
                                <td>12/09/12</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Fritz</td>
                                <td>1-598-234-7837</td>
                                <td>Et Ultrices Posuere Institute</td>
                                <td>2324</td>
                                <td>Monte San Pietrangeli</td>
                                <td>12/29/12</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Cassady</td>
                                <td>1-212-965-8381</td>
                                <td>Vitae Erat Vel Company</td>
                                <td>5898</td>
                                <td>Huntly</td>
                                <td>10/07/13</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Rogan</td>
                                <td>1-541-654-9030</td>
                                <td>Iaculis Incorporated</td>
                                <td>6464JN</td>
                                <td>Carson City</td>
                                <td>05/30/13</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Candice</td>
                                <td>1-153-708-6027</td>
                                <td>Pellentesque Company</td>
                                <td>8565</td>
                                <td>Redruth</td>
                                <td>02/25/14</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Brittany</td>
                                <td>1-987-452-6038</td>
                                <td>Suspendisse Inc.</td>
                                <td>4031</td>
                                <td>Carapicuíba</td>
                                <td>10/13/13</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Baxter</td>
                                <td>1-281-147-5085</td>
                                <td>Nulla Donec Non Associates</td>
                                <td>53067</td>
                                <td>Yellowknife</td>
                                <td>08/14/14</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Vaughan</td>
                                <td>1-940-231-1787</td>
                                <td>Metus Facilisis Lorem Incorporated</td>
                                <td>26530-046</td>
                                <td>Guarapuava</td>
                                <td>11/17/12</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>Ivan</td>
                                <td>1-314-209-1223</td>
                                <td>Posuere Vulputate Inc.</td>
                                <td>KX3W 1OI</td>
                                <td>Bienne-lez-Happart</td>
                                <td>03/04/14</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>Marah</td>
                                <td>1-348-582-4041</td>
                                <td>Feugiat Ltd</td>
                                <td>2128</td>
                                <td>Nîmes</td>
                                <td>11/29/12</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Kiara</td>
                                <td>1-570-428-6681</td>
                                <td>Et Euismod Et Corp.</td>
                                <td>70483</td>
                                <td>Meeuwen</td>
                                <td>03/28/13</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>Brielle</td>
                                <td>1-216-787-0056</td>
                                <td>Quis Massa Mauris Institute</td>
                                <td>19913</td>
                                <td>Mombaruzzo</td>
                                <td>12/17/12</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>Kennedy</td>
                                <td>1-997-154-9340</td>
                                <td>Quis Diam Pellentesque Institute</td>
                                <td>3092FI</td>
                                <td>Edmundston</td>
                                <td>02/26/13</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

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
