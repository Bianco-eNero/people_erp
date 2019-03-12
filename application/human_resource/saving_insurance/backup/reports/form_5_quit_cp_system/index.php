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


///// Include news records ////
$search=$_GET['search'];

 mysqli_select_db($website,$database_website );
  $query_Recordset1ss = "SELECT * FROM cp_settings";
  $Recordset1ss = $website->query($query_Recordset1ss);
  $row_Recordset1ss = mysqli_fetch_assoc($Recordset1ss);


if(isset($_GET['emp_id']))
{
  $id=$_GET['emp_id'];
  mysqli_select_db($website,$database_website );
  $query_Recordset1 = "SELECT * FROM employee WHERE employee_id='$id'";
  $Recordset1 = $website->query($query_Recordset1);
  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
}
else {
  mysqli_select_db($website,$database_website );
  $query_Recordset1 = "SELECT * FROM employee WHERE organization='$organization' LIMIT 400";
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

.style1 {font-size: 16px}
.style7 {font-size: 10px}
.style8 {
	font-size: 10px;
	font-weight: bold;
}
.style12 {font-size: 10px; font-weight:200; line-height:20px}
.style13 {font-weight: bold; font-size: 12px; font-weight:bold; line-height:20px }
.style19 {font-size: 18px; font-weight: bold; }

        </style>
</head>
	<body style="">
		<section class="employees">

			<main class="main">

				<section class="">
<section class="">
<div  style="border-style:groove; border-width:2px; border-color:#000000; margin:0px">
<div class="table-responsive_" style="border-style:groove; border-width:1px; border-color:#000000; margin:1px">

	<div align="center" style="text-align:center; margin:20px">
	  <table width="100%" border="0" cellspacing="2" cellpadding="2" dir="ltr" style="direction:ltr">
        <tr>
          <td width="45%" style="text-align:left"><span class="style8 arabic" style="text-align: center;"><strong>نموذج رقم (٥)</strong></span><span class="style8"><br>
          
          مذكرة صرف الدفعة الواحدة
          <br>
لحالات الاعتذار عن الاستمرار فى النظام
</span></td>
          <td width="15%">&nbsp;</td>
          <td width="40%"><div align="right">شركة خالدة للبترول<br>
          الشئون الادارية / الشئون المالية<br>
          نظام المعاش التكميلي بشركة خالدة للبترول</div></td>
        </tr>
      </table>
      <hr>
	</div>

<div <?php if($_SESSION['language']=='AR') { ?> style="rtl" <?php } ?>>

	 <?php






     ?>
<div align="center" style="text-align:center; margin:20px">
	<table width="100%" border="0" cellspacing="2" cellpadding="2" style="direction:ltr; font-size:10px" class="" >

  <tr>
    <td height="24" colspan="4" bgcolor="#f3f3f3"><u>
      <div align="right" class="style19">أولا - البيانات الأساسية:</div></u></td>
    </tr>
  <tr>
    <td colspan="3"><div align="right"><span class="style12"><?php echo $_GET['employee_name']; ?></span></div></td>
    <td width="25%"><div align="right" class="style13">
        <div align="right" class="style7">الاسم </div>
    </div></td>
  </tr>
  <tr>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style12">
        
          <?php echo $_GET['company_code']; ?>      </div>
    </div></td>
    <td width="25%"><span class="style12"><strong>كود رقم </strong></span></td>
    <td width="25%" align="left"><div align="right" class="style12"><?php echo $_GET['cp_number']; ?></div></td>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style7"><strong>رقم العضوية في النظام </strong></div>
    </div></td>
    </tr>
  <tr>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style12"><?php echo $_GET['company_name_ar']; ?></div>
    </div></td>
    <td width="25%"><strong>شركة </strong></td>
    <td width="25%"><div align="right" class="style12"><?php echo $_GET['address']; ?></div></td>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style7">العنوان </div>
    </div></td>
  </tr>
  <tr>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style12"></div>
    </div></td>
    <td width="25%"><span class="style12"><strong>المستوى  </strong></span></td>
    <td width="25%" align="left" class="style12"><div align="right"><?php echo $_GET['emp_id']; ?></div></td>
    <td width="25%">
	<div align="right" class="style13">
      <div align="right" class="style7">رقم العامل فى جهة العمل </div>
    </div>	</td>
    </tr>
  
  <tr>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style12"><?php echo $_GET['membership_start']; ?></div>
    </div></td>
    <td width="25%"><span class="style12"><strong>تاريخ اشتراك العامل فى النظام</strong></span></td>
    <td width="25%" align="left" class="style12"><div align="right"><span class="style12"></span><?php echo $_GET['sector_join_date']; ?></div></td>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style7">تاريخ بداية الخدمة بالقطاع </div>
    </div></td>
    </tr>
  <tr>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style12"></div>
    </div></td>
    <td width="25%">&nbsp;</td>
    <td width="25%" align="left" class="style12"><div align="right"><span class="style12"></span><?php echo $_GET['end_date']; ?></div></td>
    <td width="25%"><div align="right" class="style13">
      <div align="right" class="style7">تاريخ الاعتذار عن الاستمرار فى النظام</div>
    </div></td>
    </tr>
  
  <tr>
    <td colspan="3" valign="top"><div align="right" class="style13" dir="rtl">
      <div align="right" class="style12" dir="rtl"> <?php echo $_GET['account_balance']; ?> (مرفق تفاصيل الرصيد) </div>
    </div></td>
    <td width="25%" valign="top"><div align="right" class="style13">
      <div align="right" class="style7">رصيد الحساب الشخصي </div>
    </div></td>
  </tr>
  <tr>
    <td colspan="4" valign="top">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="4" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="24" colspan="4" valign="center" bgcolor="#f3f3f3"><u>
      <div align="right" class="style19">ثانيا - المكافأة المستحقة:</div></u></td>
  </tr>
  <tr>
    <td colspan="4" valign="top">
      <table  width="100%" height="40" border="0" align="center" cellpadding="2" cellspacing="2" style="margin:20px; direction:ltr " s>
      <tr>
        <td width="54%" height="16" class="style13"><div align="center" class="style7">
          <div align="right">جنيه</div>
        </div></td>
        <td width="16%" class="style13"><div align="center" class="style7">
          <div align="right" class="style7"><?php echo $_GET['vTotalAllowedAmount']; ?></div>
        </div></td>
        <td width="25%" class="style13"><div align="center" class="style7">
          <div align="right">قيمة المكافأة</div>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3" dir="rtl">
      <tbody>
        
        
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="30%">&nbsp;</td>
          <td>&nbsp;</td>
          <td width="30%"><div align="center" class="style1" style="text-align: center; border-top-color:#000000; border-top-style:solid; border-top-width:1px; font-size: 14px"><strong> رئيس مجلس ادارة الشركة </strong></div></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="4" valign="top">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="24" colspan="4" valign="center" bgcolor="#f3f3f3"><div align="right"><u><span class="style19">ثالثا -  موافقة اللجنة الرئيسية :</span></u></div></td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><div align="right" class="style7">وافقت اللجنة الرئيسية بلجنتها رقم ....................... بتاريخ ........ / ....... / ............. على صرف قيمة المكافأة المستحقة 
   
     للمذكور أعلاه بمبلغ ......................... جنيه ( فقط ........................................................ جنيه لا غير)</div></td>
  </tr>
  <tr>
    <td colspan="4" valign="top">

		<table width="100%" border="0" cellspacing="2" cellpadding="0" class= >
  <tr>  </tr>
    </table>    </td>
</tr>
</table>
</div>
<div align="center" style="text-align:center; margin:20px"><br>
  <table width="100%" border="0" cellspacing="3" cellpadding="3" dir="rtl">
        <tbody>
          <tr>
            <td width="34%">&nbsp;</td>
            <td width="36%">&nbsp;</td>
            <td width="30%"><div align="center" class="style1" style="text-align: center; border-top-color:#000000; border-top-style:solid; border-top-width:1px; font-size: 14px"><strong> رئيس اللجنة </strong></div></td>
          </tr>
          
          <tr>
            <td width="34%"><div align="center" class="style1" style="text-align: center; border-top-color:#000000; border-top-style:solid; border-top-width:1px; font-size: 14px"><strong> أعضاء اللجنة </strong></div></td>
            <td>&nbsp;</td>
            <td width="30%">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      </div>
</div>
    </div>
    </div>

			  
		</section>
        </main>
        </section>
	</body>
</html>
