<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='91';
$table='hse_observation';
$id_field='id';

//// FK for sub table ////
$fkey='id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(med_drugs_name ,  med_drug_price ,  med_no_of_units, med_drugs_def_qty, med_drugs_remarks, med_drugs_co )
VALUES
(
"'.$_GET['vmed_drugs_name'].'",
"'.$_GET['vmed_drug_price'].'",
"'.$_GET['vmed_no_of_units'].'",
"'.$_GET['vmed_drugs_def_qty'].'",
"'.$_GET['vmed_drugs_remarks'].'",
"'.$_GET['vmed_drugs_co'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(med_drugs_name ,  med_drug_price ,  med_no_of_units, med_drugs_def_qty, med_drugs_remarks, med_drugs_co )
VALUES
(
"'.$_GET['vmed_drugs_name'].'",
"'.$_GET['vmed_drug_price'].'",
"'.$_GET['vmed_no_of_units'].'",
"'.$_GET['vmed_drugs_def_qty'].'",
"'.$_GET['vmed_drugs_remarks'].'",
"'.$_GET['vmed_drugs_co'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
med_drugs_name="'.$_GET['vmed_drugs_name'].'",
med_drug_price="'.$_GET['vmed_drug_price'].'",
med_no_of_units="'.$_GET['vmed_no_of_units'].'",
med_drugs_def_qty="'.$_GET['vmed_drugs_def_qty'].'",
med_drugs_remarks="'.$_GET['vmed_drugs_remarks'].'",
med_drugs_co="'.$_GET['vmed_drugs_co'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
med_drugs_name="'.$_GET['vmed_drugs_name'].'",
med_drug_price="'.$_GET['vmed_drug_price'].'",
med_no_of_units="'.$_GET['vmed_no_of_units'].'",
med_drugs_def_qty="'.$_GET['vmed_drugs_def_qty'].'",
med_drugs_remarks="'.$_GET['vmed_drugs_remarks'].'",
med_drugs_co="'.$_GET['vmed_drugs_co'].'"
WHERE '.$id_field.'="'.$id.'"';



//// delete //// ok done
$insertSQL5='DELETE FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


//// Table View //// ok done
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
$case_filter=$_GET['case_filter'];
$insertSQL6='SELECT * FROM '.$table.' WHERE '.$fkey.'="'.$case_filter.'"';
}
else
{
///// vew for table
$insertSQL6='SELECT * FROM '.$table.'';
}


//// View Current Record for form //// ok done
$insertSQL7='SELECT * FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';



?>