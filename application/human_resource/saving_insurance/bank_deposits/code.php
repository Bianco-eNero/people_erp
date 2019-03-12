<?php
$id=$_GET['id'];
$case_id='74';
$table='sp_deposit';
$id_field='sp_deposit_id';

//// FK for sub table ////
$fkey='sp_deposit_id';

/// only for popup pages //// to hide the header

$this_is_pop='0';

/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(sp_deposit_bank, treasury_bill_purchasing_amount_le , treasury_bill_face_value_le, sp_deposit_cycle, sp_deposit_amount_le, sp_deposit_end_date, sp_deposit_percentage, sp_deposit_type)
VALUES(
"'.$_GET['vsp_deposit_bank'].'",
"'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
"'.$_GET['vtreasury_bill_face_value_le'].'",
"'.$_GET['vsp_deposit_cycle'].'",
"'.$_GET['vsp_deposit_amount_le'].'",
"'.$_GET['vsp_deposit_end_date'].'",
"'.$_GET['vsp_deposit_percentage'].'",
"'.$_GET['vsp_deposit_type'].'"
)';

//// englis insert ////
$insertSQL2='INSERT INTO '.$table.'
(sp_deposit_bank, treasury_bill_purchasing_amount_le , treasury_bill_face_value_le, sp_deposit_cycle, sp_deposit_amount_le, sp_deposit_end_date, sp_deposit_percentage, sp_deposit_type)
VALUES(
  "'.$_GET['vsp_deposit_bank'].'",
  "'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
  "'.$_GET['vtreasury_bill_face_value_le'].'",
"'.$_GET['vsp_deposit_cycle'].'",
"'.$_GET['vsp_deposit_amount_le'].'",
"'.$_GET['vsp_deposit_end_date'].'",
"'.$_GET['vsp_deposit_percentage'].'",
"'.$_GET['vsp_deposit_type'].'"
)';




//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
sp_deposit_bank="'.$_GET['vsp_deposit_bank'].'",
treasury_bill_purchasing_amount_le="'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
treasury_bill_face_value_le="'.$_GET['vtreasury_bill_face_value_le'].'",
sp_deposit_cycle="'.$_GET['vsp_deposit_cycle'].'",
sp_deposit_amount_le="'.$_GET['vsp_deposit_amount_le'].'",
sp_deposit_end_date="'.$_GET['vsp_deposit_end_date'].'",
sp_deposit_percentage="'.$_GET['vsp_deposit_percentage'].'",
sp_deposit_type="'.$_GET['vsp_deposit_type'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
sp_deposit_bank="'.$_GET['vsp_deposit_bank'].'",
treasury_bill_purchasing_amount_le="'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
treasury_bill_face_value_le="'.$_GET['vtreasury_bill_face_value_le'].'",
sp_deposit_cycle="'.$_GET['vsp_deposit_cycle'].'",
sp_deposit_amount_le="'.$_GET['vsp_deposit_amount_le'].'",
sp_deposit_end_date="'.$_GET['vsp_deposit_end_date'].'",
sp_deposit_percentage="'.$_GET['vsp_deposit_percentage'].'",
sp_deposit_type="'.$_GET['vsp_deposit_type'].'"
WHERE '.$id_field.'="'.$id.'"';



//// delete //// ok done
$id=$_GET['id'];
$insertSQL5='DELETE FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


//// Table View //// ok done
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
$case_filter=$_GET['case_filter'];
$insertSQL6='SELECT * FROM '.$table.' WHERE emp_id="'.$case_filter.'"';
}
else
{
///// vew for table
$insertSQL6='SELECT * FROM sp_deposit, sp_deposit_type WHERE sp_deposit.sp_deposit_type=sp_deposit_type.sp_deposit_type_id';
}


//// View Current Record for form //// ok done
$id=$_GET['id'];
$insertSQL7='SELECT * FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


?>
