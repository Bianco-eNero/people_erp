<?php
$id=$_GET['id'];
$case_id='55';
$table='med_records';
$id_field='med_records_id';

//// FK for sub table ////
$fkey='med_records_id';

/// only for popup pages //// to hide the header

$this_is_pop='0';

/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(med_records_date, complaint , investigation, diagnoses, emp_id, remarks)
VALUES
(
"'.$_GET['vmed_records_date'].'",
"'.$_GET['vcomplaint'].'",
"'.$_GET['vinvestigation'].'",
"'.$_GET['vdiagnoses'].'",
"'.$_GET['vemp_id'].'",
"'.$_GET['vremarks'].'"
)';

//// englis insert ////
$insertSQL2='INSERT INTO '.$table.'
(med_records_date, complaint , investigation, diagnoses, emp_id, remarks)
VALUES
(
"'.$_GET['vmed_records_date'].'",
"'.$_GET['vcomplaint'].'",
"'.$_GET['vinvestigation'].'",
"'.$_GET['vdiagnoses'].'",
"'.$_GET['vemp_id'].'",
"'.$_GET['vremarks'].'"
)';




//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
med_records_date="'.$_GET['vben_benefits_sub_sub'].'",
complaint="'.$_GET['vcomplaint'].'",
investigation="'.$_GET['vinvestigation'].'",
diagnoses="'.$_GET['vdiagnoses'].'",
emp_id="'.$_GET['vemp_id'].'",
remarks="'.$_GET['vremarks'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
ed_records_date="'.$_GET['vben_benefits_sub_sub'].'",
complaint="'.$_GET['vcomplaint'].'",
investigation="'.$_GET['vinvestigation'].'",
diagnoses="'.$_GET['vdiagnoses'].'",
emp_id="'.$_GET['vemp_id'].'",
remarks="'.$_GET['vremarks'].'"
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
$insertSQL6='SELECT * FROM med_records, employee WHERE employee.emp_id=med_records.emp_id ORDER BY med_records_date';
}


//// View Current Record for form //// ok done
$id=$_GET['id'];
$insertSQL7='SELECT * FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


?>
