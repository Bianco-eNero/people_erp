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



/// insert ///
$insertSQL1='INSERT INTO '.$table.'
(obs_title , obs_description , obs_conversation , obs_status , obs_add_by , obs_site , obs_location , obs_category	)
VALUES
(
"'.$_GET['vobs_title'].'",
"'.$_GET['vobs_description'].'",
"'.$_GET['vobs_conversation'].'",
"'.$_GET['vobs_status'].'",
"'.$_SESSION['emp_id'].'",
"'.$_GET['vobs_site'].'",
"'.$_GET['vobs_location'].'",
"'.$_GET['vobs_category'].'"
)';

//// update ////
$insertSQL3='UPDATE '.$table.' SET
obs_title="'.$_GET['vobs_title'].'",
obs_description="'.$_GET['vobs_description'].'",
obs_conversation="'.$_GET['vobs_conversation'].'",
obs_status="'.$_GET['vobs_status'].'",
obs_site="'.$_GET['vobs_site'].'",
obs_location="'.$_GET['vobs_location'].'",
obs_category="'.$_GET['vobs_category'].'"
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