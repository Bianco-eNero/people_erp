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
$table='sp_percentages';
$id_field='sp_percentages_id';

//// FK for sub table ////
$fkey='sp_percentages';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(title,percentage)
VALUES
(
"'.$_GET['vtitle'].'",
"'.$_GET['vpercentage'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(title_en,percentage)
VALUES
(
"'.$_GET['vtitle'].'",
"'.$_GET['vpercentage'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
title="'.$_GET['vtitle'].'",
percentage="'.$_GET['vpercentage'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
title_en="'.$_GET['vtitle'].'",
percentage="'.$_GET['vpercentage'].'"
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