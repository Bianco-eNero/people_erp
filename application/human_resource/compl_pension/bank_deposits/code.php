<?php
$id=$_GET['id'];
$case_id='74';
$table='cp_deposit';
$id_field='cp_deposit_id';

//// FK for sub table ////
$fkey='cp_deposit_id';

/// only for popup pages //// to hide the header

$this_is_pop='0';

/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(cp_deposit_bank, treasury_bill_purchasing_amount_le , treasury_bill_face_value_le, cp_deposit_cycle, cp_deposit_amount_le, cp_deposit_end_date, cp_deposit_percentage, cp_deposit_type)
VALUES
(
"'.$_GET['vcp_deposit_bank'].'",
"'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
"'.$_GET['vtreasury_bill_face_value_le'].'",
"'.$_GET['vcp_deposit_cycle'].'",
"'.$_GET['vcp_deposit_amount_le'].'",
"'.$_GET['vcp_deposit_end_date'].'",
"'.$_GET['vcp_deposit_percentage'].'",
"'.$_GET['vcp_deposit_type'].'"
)';

//// englis insert ////
$insertSQL2='INSERT INTO '.$table.'
(cp_deposit_bank, treasury_bill_purchasing_amount_le , treasury_bill_face_value_le, cp_deposit_cycle, cp_deposit_amount_le, cp_deposit_end_date, cp_deposit_percentage, cp_deposit_type)
VALUES
(
  "'.$_GET['vcp_deposit_bank'].'",
  "'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
  "'.$_GET['vtreasury_bill_face_value_le'].'",
"'.$_GET['vcp_deposit_cycle'].'",
"'.$_GET['vcp_deposit_amount_le'].'",
"'.$_GET['vcp_deposit_end_date'].'",
"'.$_GET['vcp_deposit_percentage'].'",
"'.$_GET['vcp_deposit_type'].'"
)';




//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
cp_deposit_bank="'.$_GET['vcp_deposit_bank'].'",
treasury_bill_purchasing_amount_le="'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
treasury_bill_face_value_le="'.$_GET['vtreasury_bill_face_value_le'].'",
cp_deposit_cycle="'.$_GET['vcp_deposit_cycle'].'",
cp_deposit_amount_le="'.$_GET['vcp_deposit_amount_le'].'",
cp_deposit_end_date="'.$_GET['vcp_deposit_end_date'].'",
cp_deposit_percentage="'.$_GET['vcp_deposit_percentage'].'",
cp_deposit_type="'.$_GET['vcp_deposit_type'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
cp_deposit_bank="'.$_GET['vcp_deposit_bank'].'",
treasury_bill_purchasing_amount_le="'.$_GET['vtreasury_bill_purchasing_amount_le'].'",
treasury_bill_face_value_le="'.$_GET['vtreasury_bill_face_value_le'].'",
cp_deposit_cycle="'.$_GET['vcp_deposit_cycle'].'",
cp_deposit_amount_le="'.$_GET['vcp_deposit_amount_le'].'",
cp_deposit_end_date="'.$_GET['vcp_deposit_end_date'].'",
cp_deposit_percentage="'.$_GET['vcp_deposit_percentage'].'",
cp_deposit_type="'.$_GET['vcp_deposit_type'].'"
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
$insertSQL6='SELECT * FROM cp_deposit, cp_deposit_type WHERE cp_deposit.cp_deposit_type=cp_deposit_type.cp_deposit_type_id';
}


//// View Current Record for form //// ok done
$id=$_GET['id'];
$insertSQL7='SELECT * FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


?>
