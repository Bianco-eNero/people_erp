<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='82';
$table='cp_end_server_type';
$id_field='cp_end_server_type_id';

//// FK for sub table ////
$fkey='cp_end_server_type_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(cp_end_server_type_a)
VALUES
(
"'.$_GET['vcp_end_server_type'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(cp_end_server_type_e)
VALUES
(
"'.$_GET['vcp_end_server_type'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
cp_end_server_type_a="'.$_GET['vcp_end_server_type'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
cp_end_server_type_e="'.$_GET['vcp_end_server_type'].'"
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