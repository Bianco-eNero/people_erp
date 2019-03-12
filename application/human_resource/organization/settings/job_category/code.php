<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='81';
$table='a_category';
$id_field='cat_id';

//// FK for sub table ////
$fkey='med_drugs_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(cat_name)
VALUES
(
"'.$_GET['vcat_name'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(cat_name_en)
VALUES
(
"'.$_GET['vcat_name_en'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
cat_name="'.$_GET['vcat_name'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
cat_name_en="'.$_GET['vcat_name'].'"
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