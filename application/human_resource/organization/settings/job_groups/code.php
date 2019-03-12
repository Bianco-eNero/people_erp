<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='15';
$table='a_job_groups';
$id_field='g_id';

//// FK for sub table ////
$fkey='med_drugs_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(g_name)
VALUES
(
"'.$_GET['vg_name'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(g_name_en)
VALUES
(
"'.$_GET['vg_name_en'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
g_name="'.$_GET['vg_name'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
g_name_en="'.$_GET['vg_name_en'].'"
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