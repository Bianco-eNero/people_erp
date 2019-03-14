<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='97';
$table='sp_perc_title';
$id_field='sp_perc_title_id';

//// FK for sub table ////
$fkey='sp_perc_title_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(title,percentage,basic_Remuneration,special_guaranteed_premiums,special_unsecured_premiums)
VALUES
(
"'.$_GET['vtitle'].'",
"'.$_GET['vpercentage'].'",
"'.$_GET['vbasic_Remuneration'].'",
"'.$_GET['vspecial_guaranteed_premiums'].'",
"'.$_GET['vspecial_unsecured_premiums'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(title_en,percentage,basic_Remuneration,special_guaranteed_premiums,special_unsecured_premiums)
VALUES
(
"'.$_GET['vtitle'].'",
"'.$_GET['vpercentage'].'",
"'.$_GET['vbasic_Remuneration'].'",
"'.$_GET['vspecial_guaranteed_premiums'].'",
"'.$_GET['vspecial_unsecured_premiums'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
title="'.$_GET['vtitle'].'",
percentage="'.$_GET['vpercentage'].'",
basic_Remuneration="'.$_GET['vbasic_Remuneration'].'",
special_guaranteed_premiums="'.$_GET['vspecial_guaranteed_premiums'].'",
special_unsecured_premiums="'.$_GET['vspecial_unsecured_premiums'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
title_en="'.$_GET['vtitle'].'",
percentage="'.$_GET['vpercentage'].'",
basic_Remuneration="'.$_GET['vbasic_Remuneration'].'",
special_guaranteed_premiums="'.$_GET['vspecial_guaranteed_premiums'].'",
special_unsecured_premiums="'.$_GET['vspecial_unsecured_premiums'].'"
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