<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='89';
$table='marital_status';
$id_field='marital_status';

//// FK for sub table ////
$fkey='marital_status';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(status_desc)
VALUES
(
"'.$_GET['vstatus_desc'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(status_desc_en)
VALUES
(
"'.$_GET['vstatus_desc'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
status_desc="'.$_GET['vstatus_desc'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
status_desc_en="'.$_GET['vstatus_desc'].'"
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