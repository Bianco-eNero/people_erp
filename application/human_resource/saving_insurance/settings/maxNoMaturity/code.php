<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='98';
$table='sp_max_mounth';
$id_field='sp_max_mounth_id';

//// FK for sub table ////
$fkey='sp_max_mounth_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(sp_max_month,month)
VALUES
(
"'.$_GET['vsp_max_month'].'",
"'.$_GET['vmonth'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(sp_max_month_en,month)
VALUES
(
"'.$_GET['vsp_max_month'].'",
"'.$_GET['vmonth'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
sp_max_month="'.$_GET['vsp_max_month'].'",
month="'.$_GET['vmonth'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
sp_max_month_en="'.$_GET['vsp_max_month'].'",
month="'.$_GET['vmonth'].'"
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