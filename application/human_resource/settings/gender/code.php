<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='88';
$table='genders';
$id_field='gender';

//// FK for sub table ////
$fkey='gender';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(gender_name)
VALUES
(
"'.$_GET['vgender_name'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(gender_name_en)
VALUES
(
"'.$_GET['vgender_name'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
gender_name="'.$_GET['vgender_name'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
gender_name_en="'.$_GET['vgender_name'].'"
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