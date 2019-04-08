<?php
/*
 * version 2.00
 * make by mikhail
 *
 * */
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


///// Include news records ////
$search=$_GET['search'];

mysqli_select_db($website,$database_website );
$query_Recordset1ss = "SELECT * FROM cp_settings";
$Recordset1ss = $website->query($query_Recordset1ss);
$row_Recordset1ss = mysqli_fetch_assoc($Recordset1ss);


if(isset($_GET['id']))
{
    $id=$_GET['id'];
    mysqli_select_db($website,$database_website );
    $query_Recordset1 = "SELECT * FROM employee WHERE organization='$organization' AND employee_id='$id'";
    $Recordset1 = $website->query($query_Recordset1);
    $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
}




//// End of include the settings table ///

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    //// include header script ////
    include('../../../../../assets/header.php');
    //// end of header script ////
    ?>


    <style type="text/css">
        <!--
        .style1 {font-size: 24px}
        .style2 {font-weight: bold}
        .style3 {font-weight: bold}
        .style4 {font-weight: bold}
        .style5 {font-weight: bold}
        .style6 {font-weight: bold}
        -->
    </style>

</head>
<body style="">
<?php
if(!isset($_GET['id'])){
    $limit=100;
    $page=( isset($_GET['page']) )? (($_GET['page']-1)*$limit) : 0;

    mysqli_select_db($website, $database_website);
    $query_Recordset1 = "SELECT * FROM employee WHERE organization='$organization' LIMIT $page,$limit";
    $Recordset1 = $website->query($query_Recordset1);
    $row_Recordset1 = mysqli_fetch_assoc($Recordset1);

	mysqli_select_db($website,$database_website );
	$query_no_of_employee = "SELECT count(employee_id) as numberEmpolyee FROM employee WHERE organization='$organization'";
	$no_of_employee = $website->query($query_no_of_employee);
	$row_no_of_employee = mysqli_fetch_assoc($no_of_employee);
?>
<nav aria-label="Page navigation" style="position: fixed; " class="dont_print_me">
    <ul class="pagination">
        <?php
        $count=10;
        $last_page=ceil($row_no_of_employee['numberEmpolyee']/$limit);
        if(isset($_GET['page']) && $_GET['page']!=1 ) {
            echo'<li><a href="?report=1&page=1">First</a></li>';
            echo '<li><a href="#" disabled tabindex="-1" >...</a></li>';
        }
        for ( $i=( isset($_GET['page'])&& $_GET['page']>5 )? $_GET['page']-5 : 1 ; ($i<$last_page && $count!=0) ; $i++){
            echo'<li><a href="?report=1&page='.$i.'">'.$i.'</a></li>';
            $count--;
        }
        if( $_GET['page']!=$last_page ) {
            echo '<li><a href="#" disabled tabindex="-1" >...</a></li>';
            echo '<li><a href="?report=1&page=' . $last_page . '">last</a></li>';
        }
        ?>

    </ul>
</nav>
<?php } ?>
<section class="employees">

    <main class="main">

        <section class="">
            <section class="">
                <div class="table-responsive_">

                    <div <?php if($_SESSION['language']=='AR') { ?> style="rtl" <?php } ?>>

                        <?php
                        do {
                            ?>
                            <div align="center" style="text-align:center;">

                                <p class="style1 arabic" style="text-align: center;">
                                    <img src="../../../../../assets/images/logos/khalda.png" width="100" height="94" alt=""/>
                                    <br><span style="font-size:12px">نظام المعاش التكميلي للعاملين بشركة خالدة للبترول</span>
                                    <br>تقرير حساب شخصي - تفصيلي
                                </p>
                            </div>
                            <table width="100%" border="0" cellspacing="2" cellpadding="0" style="direction:ltr; font-size:10px" class="arabic table-condensed" >

                                <tr>
                                    <td><div align="right" class="style5">
                                            <div align="right"><?php echo $row_Recordset1['employee_id']; ?></div>
                                        </div></td>
                                    <td><div align="right" class="style3">
                                            <div align="right">رقم العامل</div>
                                        </div></td>
                                    <td width="100" rowspan="5" align="center" valign="top"><div align=""><img src="../../../../../assets/images/emp_pics/<?php echo $row_Recordset1['employee_id']; ?>.bmp" width="128" height="128" alt=""/></div></td>
                                </tr>
                                <tr>
                                    <td width="398"><div align="right" class="style5">
                                            <div align="right"><?php echo $row_Recordset1['name_arabic']; ?></div>
                                        </div></td>
                                    <td width="171"><div align="right" class="style3">
                                            <div align="right">الاسم</div>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><div align="right" class="style5">
                                            <?php


                                            $emp_dob=$row_Recordset1['sector_join_date'];


                                            if($row_Recordset1['emp_status']=='1')
                                            {
                                                $today_date=date('Y-m-d');
                                            }
                                            //	  else
                                            //	  {
                                            //		$today_date=  $row_Recordset1['date_end_service'];
                                            //	  }






                                            ?>
                                            <?php echo $row_Recordset1['sector_join_date']; ?></div></td>
                                    <td><div align="right" class="style3">
                                            <div align="right">تاريخ الالتحاق بالقطاع</div>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><div align="right" class="style5">
                                            <?php


                                            $emp_dob=$row_Recordset1['birth_date'];


                                            if($row_Recordset1['emp_status']=='1')
                                            {
                                                $today_date=date('Y-m-d');
                                            }
                                            //	  else
                                            //	  {
                                            //		$today_date=  $row_Recordset1['date_end_service'];
                                            //	  }




                                            ?>


                                            <?php echo $row_Recordset1['birth_date']; ?></div></td>
                                    <td><div align="right" class="style3">
                                            <div align="right">تاريخ الميلاد</div>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td valign="top"><div dir="rtl" align="right" class="style5">
                                            <div align="right" dir="rtl"><?php echo $row_Recordset1['retire_date']; ?></div>
                                        </div></td>
                                    <td valign="top"><div align="right" class="style3">
                                            <div align="right">تاريخ التقاعد</div>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td colspan="3" valign="top">

                                        <table width="100%" border="0" cellspacing="2" cellpadding="0" class= >
                                            <tr>

                                            </tr>

                                        </table>

                                        <h4 style="direction: rtl; text-align: right">رصيد منقول من شركات أخرى ( <?php echo $row_Recordset1['cp_transferred_from']; ?>  )</h4>
                                        <table width="100%" border="0" align="right" cellpadding="2" cellspacing="0" style="direction:ltr" class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
                                            <tr>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">اجمالي رصيد منقول</div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">
                                                            عائد حصة الشركة           </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">حصة الشركة</div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">
                                                            عائد حصة العامل           </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">حصة العامل</div>
                                                    </div></td>
                                            </tr>
                                            <?php

                                            $emp_portion_le='0';
                                            $inv_emp_portion_le='0';
                                            $co_portion_le='0';
                                            $inv_co_portion_le='0';

                                            $pi=$row_Recordset1['employee_id'];

                                            mysqli_select_db($website,$database_website );
                                            $query_emp_career = "SELECT * FROM cp_transaction, cp_installment_period  WHERE cp_installment_period.cp_installment_period_id=cp_transaction.cp_installment_period_id AND (cp_transaction.emp_portion_le+cp_transaction.co_portion_le) >'0' AND cp_transaction.employee_id='$pi' ORDER BY cp_installment_period.cp_installment_period_id";
                                            $emp_career = $website->query($query_emp_career);
                                            $row_emp_career = mysqli_fetch_assoc($emp_career);

                                            $end_balance_start='0';



                                            ?>
                                            <tr>
                                                <td width="80"><div align="right" class="style87" dir="rtl">
                                                        <div align="right" style="background-color: #CBC9C9">
                                                            <?php  echo number_format($row_Recordset1['cp_transferred_balance_emp_portion_le']+$row_Recordset1['cp_transferred_balance_emp_portion_inv_le']+$row_Recordset1['cp_transferred_balance_co_portion_le']+$row_Recordset1['cp_transferred_balance_co_portion_inv_le'], 2, '.', ',');

                                                            $total_transferred_balance=$row_Recordset1['cp_transferred_balance_emp_portion_le']+$row_Recordset1['cp_transferred_balance_emp_portion_inv_le']+$row_Recordset1['cp_transferred_balance_co_portion_le']+$row_Recordset1['cp_transferred_balance_co_portion_inv_le'];
                                                            ?>
                                                        </div>
                                                    </div></td>
                                                <td width="80"><div align="right" class="style87" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($row_Recordset1['cp_transferred_balance_co_portion_inv_le'], 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                                <td width="80"><div align="right" class="style87" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($row_Recordset1['cp_transferred_balance_co_portion_le'], 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                                <td width="80"><div align="right" class="style87" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($row_Recordset1['cp_transferred_balance_emp_portion_inv_le'], 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                                <td width="80"><div align="right" class="style87" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($row_Recordset1['cp_transferred_balance_emp_portion_le'], 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                            </tr>
                                        </table>


                                        <div style="height: 20px"></div>


                                        <table width="100%" border="0" align="right" cellpadding="2" cellspacing="0" style="direction:ltr" class="o_list_view table table-sm table-hover table-striped o_list_view_ungrouped table-responsive-sm table-condensed">
                                            <tr>
                                                <td width="140" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">رصيد آخر المدة</div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">العائد الكلي للفترة</div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">
                                                            عائد حصة الشركة تراكمي          </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">حصة الشركة</div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">
                                                            عائد حصة العامل تراكمي          </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">حصة العامل</div>
                                                    </div></td>
                                                <td width="150" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">رصيد أول المدة</div>
                                                    </div></td>
                                                <td width="200" bgcolor="#f3f3f3"><div align="center" class="style86 style108">
                                                        <div align="right">الفترة</div>
                                                    </div></td>
                                            </tr>
                                            <?php

                                            $emp_portion_le='0';
                                            $inv_emp_portion_le='0';
                                            $co_portion_le='0';
                                            $inv_co_portion_le='0';

                                            $pi=$row_Recordset1['employee_id'];

                                            mysqli_select_db($website,$database_website );
                                            $query_emp_career = "SELECT * FROM cp_transaction, cp_installment_period  WHERE cp_installment_period.cp_installment_period_id=cp_transaction.cp_installment_period_id AND (cp_transaction.emp_portion_le+cp_transaction.co_portion_le) >'0' AND cp_transaction.employee_id='$pi' ORDER BY cp_installment_period.cp_installment_period_id";
                                            $emp_career = $website->query($query_emp_career);
                                            $row_emp_career = mysqli_fetch_assoc($emp_career);

                                            $end_balance_start='0';

                                            $counter='1';

                                            do { ?>
                                                <tr>
                                                    <td width="140"><div align="right" class="style87" dir="rtl">
                                                            <div align="right">
                                                                <?php

                                                                if($counter=='1') {
                                                                    $end_balance=$row_emp_career['emp_portion_le']+$row_emp_career['inv_emp_portion_le']+$row_emp_career['co_portion_le']+$row_emp_career['inv_co_portion_le'];


                                                                    $next_start_balance=$row_emp_career['emp_portion_le']+$row_emp_career['inv_emp_portion_le']+$row_emp_career['co_portion_le']+$row_emp_career['inv_co_portion_le'];

                                                                }
                                                                else
                                                                {
                                                                    $end_balance=$next_start_balance+$row_emp_career['emp_portion_le']+$row_emp_career['inv_emp_portion_le']+$row_emp_career['co_portion_le']+$row_emp_career['inv_co_portion_le'];


                                                                    $next_start_balance=$next_start_balance+$row_emp_career['emp_portion_le']+$row_emp_career['inv_emp_portion_le']+$row_emp_career['co_portion_le']+$row_emp_career['inv_co_portion_le'];
                                                                }




                                                                echo number_format($end_balance, 2, '.', ',');

                                                                ?>          </div>
                                                        </div></td>
                                                    <td width="80"><div align="right" class="style87" dir="rtl">
                                                            <div align="right" style="background-color: #CBC9C9">
                                                                <?php  echo number_format($row_emp_career['inv_start_banace_le']+$row_emp_career['inv_emp_portion_le']+$row_emp_career['inv_co_portion_le'], 2, '.', ','); ?>
                                                            </div>
                                                        </div></td>
                                                    <td width="80"><div align="right" class="style87" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($row_emp_career['inv_co_portion_le'], 2, '.', ','); ?>
                                                            </div><?php $inv_co_portion_le= $inv_co_portion_le+$row_emp_career['inv_co_portion_le']; ?>
                                                        </div></td>
                                                    <td width="80"><div align="right" class="style87" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($row_emp_career['co_portion_le'], 2, '.', ','); ?>
                                                            </div><?php $co_portion_le= $co_portion_le+$row_emp_career['co_portion_le']; ?>
                                                        </div></td>
                                                    <td width="80"><div align="right" class="style87" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($row_emp_career['inv_emp_portion_le'], 2, '.', ','); ?>
                                                            </div><?php $inv_emp_portion_le= $inv_emp_portion_le+$row_emp_career['inv_emp_portion_le']; ?>
                                                        </div></td>
                                                    <td width="80"><div align="right" class="style87" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($row_emp_career['emp_portion_le'], 2, '.', ','); ?>
                                                            </div><?php $emp_portion_le= $emp_portion_le+$row_emp_career['emp_portion_le']; ?>
                                                        </div></td>
                                                    <td width="150"><div align="right" class="style87" dir="rtl"><?php

                                                            if($counter=='1')
                                                            {
                                                                echo number_format(0, 2, '.', ',');
                                                            }
                                                            else
                                                            {
                                                                echo number_format($next_start_balance-$row_emp_career['emp_portion_le']-$row_emp_career['inv_emp_portion_le']-$row_emp_career['co_portion_le']-$row_emp_career['inv_co_portion_le'], 2, '.', ',');
                                                            }



                                                            ?></div></td>
                                                    <td width="200"><div dir="rtl" align="right" class="style73"><span class="style5"><?php echo $row_emp_career['cp_installment_period_desc']; ?></span></div></td>
                                                </tr>



                                                <?php
                                                $counter++;
                                                ?>


                                            <?php } while ($row_emp_career = mysqli_fetch_assoc($emp_career)); ?>



                                            <tr>
                                                <td width="140" height="47"><div align="right" class="style87" dir="rtl">
                                                        <div align="right"></div>
                                                    </div></td>
                                                <td width="80" bgcolor="#CCCCCC" background="../../../../../assets/images/bg_1.jpg"><div align="right" class="style87 style2" dir="rtl" style="border-color:#CCCCCC; border-style:solid; border-width:1px; font-size:12px">
                                                        <div align="right" style="background-image: image(../../../../../assets/images/bg_1.jpg)"><b>
                                                                <?php  echo number_format($inv_co_portion_le+$co_portion_le+$emp_portion_le+$inv_emp_portion_le+$total_transferred_balance, 2, '.', ','); ?>
                                                            </b>
                                                        </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style3" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($inv_co_portion_le, 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style4" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($co_portion_le, 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style5" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($inv_emp_portion_le, 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                                <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style6" dir="rtl">
                                                        <div align="right">
                                                            <?php  echo number_format($emp_portion_le, 2, '.', ','); ?>
                                                        </div>
                                                    </div></td>
                                                <td width="150" style="background-color: #D5D0D1"><div align="right" class="style87" dir="rtl">
                                                        <div align="right" class="style87" dir="rtl">
                                                            <div align="right">
                                                                <div align="center" class="style86 style108" style="font-size:12px">
                                                                    <div align="right"><strong>الاجمالي</strong></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></td>
                                                <td width="200"><div dir="rtl" align="right" class="style73"></div></td>
                                            </tr>

                                            <?php if($row_Recordset1['cp_active']!= 0){?>
                                                <tr>
                                                    <td width="140" height="47"><div align="right" class="style87" dir="rtl">
                                                            <div align="right"></div>
                                                        </div></td>
                                                    <td width="80" bgcolor="#CCCCCC" background="../../../../../assets/images/bg_1.jpg"><div align="right" class="style87 style2" dir="rtl" style="border-color:#CCCCCC; border-style:solid; border-width:1px; font-size:12px">
                                                            <div align="right" style="background-image: image(../../../../../assets/images/bg_1.jpg)"><b>
                                                                    <?php  echo number_format($inv_co_portion_le+$co_portion_le+$emp_portion_le+$inv_emp_portion_le+$total_transferred_balance, 2, '.', ','); ?>
                                                                </b>
                                                            </div>
                                                        </div></td>
                                                    <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style3" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($inv_co_portion_le, 2, '.', ','); ?>
                                                            </div>
                                                        </div></td>
                                                    <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style4" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($co_portion_le, 2, '.', ','); ?>
                                                            </div>
                                                        </div></td>
                                                    <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style5" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($inv_emp_portion_le, 2, '.', ','); ?>
                                                            </div>
                                                        </div></td>
                                                    <td width="80" bgcolor="#f3f3f3"><div align="right" class="style87 style6" dir="rtl">
                                                            <div align="right">
                                                                <?php  echo number_format($emp_portion_le, 2, '.', ','); ?>
                                                            </div>
                                                        </div></td>
                                                    <td width="150" style="background-color: #D5D0D1"><div align="right" class="style87" dir="rtl">
                                                            <div align="right" class="style87" dir="rtl">
                                                                <div align="right">
                                                                    <div align="center" class="style86 style108" style="font-size:12px">
                                                                        <div align="right"><strong>التعويضات</strong></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div></td>
                                                    <td width="200"><div dir="rtl" align="right" class="style73"></div></td>
                                                </tr>
                                            <?php }?>

                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2"><div align="right">

                                        </div></td>
                                </tr>
                            </table><table width="100%" border="0" cellspacing="3" cellpadding="3" dir="rtl">
                                <tbody>
                                <tr>
                                    <td width="30%"><div align="center" style="text-align: center; border-top-color:#000000; border-top-style:solid; border-top-width:1px; font-size: 14px"><strong>

                                                <?php
                                                if($_SESSION['language']=='AR')
                                                {
                                                    echo $row_Recordset1ss['sign_1_title_ar'];

                                                }

                                                if($_SESSION['language']=='EN')
                                                {
                                                    echo $row_Recordset1ss['sign_1_title_en'];

                                                }
                                                ?>
                                            </strong></div></td>
                                    <td>&nbsp;</td>
                                    <td width="30%">&nbsp;</td>

                                    <td width="30%"><div align="center" style="text-align: center; border-top-color:#000000; border-top-style:solid; border-top-width:1px; font-size: 14px"><strong>

				                                <?php
				                                if($_SESSION['language']=='AR')
				                                {
					                                echo $row_Recordset1ss['sign_2_title_ar'];

				                                }

				                                if($_SESSION['language']=='EN')
				                                {
					                                echo $row_Recordset1ss['sign_2_title_en'];

				                                }
				                                ?>
                                            </strong></div></td>
                                </tr>

<!--                                <tr><td width="30%">&nbsp;</td><td>&nbsp;</td></tr>-->
                                </tbody>
                            </table>
                            <div style="page-break-before: always;"> </div>

                        <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>



                    </div>
                </div>
            </section>
    </main>
</section>
</body>
</html>
