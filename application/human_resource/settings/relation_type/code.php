<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='85';
$table='relation_type';
$id_field='relation_type_id';

//// FK for sub table ////
$fkey='relation_type_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(relation_name)
VALUES
(
"'.$_GET['vrelation_name'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(relation_name_en)
VALUES
(
"'.$_GET['vrelation_name'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
relation_name="'.$_GET['vrelation_name'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
relation_name_en="'.$_GET['vrelation_name'].'"
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