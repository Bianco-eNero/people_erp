<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='86';
$table='penalty_type';
$id_field='penalty_type';

//// FK for sub table ////
$fkey='penalty_type';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(penalty_type_ar)
VALUES
(
"'.$_GET['vpenalty_type'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(penalty_type_en)
VALUES
(
"'.$_GET['vpenalty_type'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
penalty_type_ar="'.$_GET['vpenalty_type'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
penalty_type_en="'.$_GET['vpenalty_type'].'"
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