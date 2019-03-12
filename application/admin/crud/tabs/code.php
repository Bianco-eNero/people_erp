<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='49';
$table='crud_add_form_tab';
$id_field='crud_add_form_tab_id';

//// FK for sub table ////
$fkey='crud_case_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(crud_case_id ,  crud_add_form_tab_title_ar ,  crud_add_form_tab_asc)
VALUES
(
"'.$_GET['vcrud_case_id'].'",
"'.$_GET['vcrud_add_form_tab_title'].'",
"'.$_GET['vcrud_add_form_tab_asc'].'"
)';

//// englis insert ////
$insertSQL2='INSERT INTO '.$table.'
(crud_case_id ,  crud_add_form_tab_title_en ,  crud_add_form_tab_asc )
VALUES
(
"'.$_GET['vcrud_case_id'].'",
"'.$_GET['vcrud_add_form_tab_title'].'",
"'.$_GET['vcrud_add_form_tab_asc'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
crud_add_form_tab_title_ar="'.$_GET['vcrud_add_form_tab_title'].'",
crud_add_form_tab_asc="'.$_GET['vcrud_add_form_tab_asc'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
crud_add_form_tab_title_en="'.$_GET['vcrud_add_form_tab_title'].'",
crud_add_form_tab_asc="'.$_GET['vcrud_add_form_tab_asc'].'"
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