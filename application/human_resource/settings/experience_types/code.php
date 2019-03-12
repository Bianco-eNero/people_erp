<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='83';
$table='exp_type';
$id_field='exp_type_code';

//// FK for sub table ////
$fkey='exp_type_code';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(exp_type_name)
VALUES
(
"'.$_GET['vexp_type_name'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(exp_type_name_en)
VALUES
(
"'.$_GET['vexp_type_name'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
exp_type_name="'.$_GET['vexp_type_name'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
exp_type_name_en="'.$_GET['vexp_type_name'].'"
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