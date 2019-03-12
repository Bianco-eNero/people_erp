<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='95';
$table='obs_sub_category';
$id_field='obs_sub_category';

//// FK for sub table ////
$fkey='obs_sub_category';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(obs_sub_category, obs_main_category_id)
VALUES
(
"'.$_GET['vobs_sub_category'].'",
"'.$_GET['vobs_main_category_id'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(obs_sub_category_en, obs_main_category_id)
VALUES
(
"'.$_GET['vobs_sub_category'].'",
"'.$_GET['vobs_main_category_id'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
obs_sub_category="'.$_GET['vobs_sub_category'].'",
obs_sub_category_id="'.$_GET['vobs_sub_category_id'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
obs_sub_category_en="'.$_GET['vobs_sub_category'].'",
obs_sub_category_id="'.$_GET['vobs_sub_category_id'].'"
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