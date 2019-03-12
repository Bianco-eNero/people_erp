<?php
////// START /////

$id=$_GET['id'];

/// arabic insert ///
$insertSQL1='INSERT INTO crud_table_rows 
(row_asc, row_field_ar, decimal_number, id_record, photo, document, crud_case_id) 
VALUES 
("'.$_GET['vrow_asc'].'", 
"'.$_GET['vrow_field'].'",
"'.$_GET['vdecimal_number'].'", 
"'.$_GET['vid_record'].'", 
"'.$_GET['vphoto'].'", 
"'.$_GET['vdocument'].'",
"'.$_GET['vcrud_case_id'].'")';	

//// englis insert ////
$insertSQL2='INSERT INTO crud_table_rows 
(row_asc, row_field_en, decimal_number, id_record, photo, document, crud_case_id) 
VALUES 
("'.$_GET['vrow_asc'].'",
"'.$_GET['vrow_field'].'",
"'.$_GET['vdecimal_number'].'", 
"'.$_GET['vid_record'].'",
"'.$_GET['vphoto'].'",
"'.$_GET['vdocument'].'",
"'.$_GET['vcrud_case_id'].'")';




//// arabic update ////
$insertSQL3='UPDATE crud_table_rows SET 
row_asc="'.$_GET['vrow_asc'].'",
row_field_ar="'.$_GET['vrow_field'].'", 
decimal_number="'.$_GET['vdecimal_number'].'",
id_record="'.$_GET['vid_record'].'",
photo="'.$_GET['vphoto'].'",
crud_case_id="'.$_GET['vcrud_case_id'].'",
document="'.$_GET['vdocument'].'"
WHERE crud_table_rows_id="'.$id.'"';

//// english update ////
$insertSQL4='UPDATE crud_table_rows SET 
row_asc="'.$_GET['vrow_asc'].'",
row_field_en="'.$_GET['vrow_field'].'", 
decimal_number="'.$_GET['vdecimal_number'].'",
id_record="'.$_GET['vid_record'].'",
photo="'.$_GET['vphoto'].'",
crud_case_id="'.$_GET['vcrud_case_id'].'",
document="'.$_GET['vdocument'].'"
WHERE crud_table_rows_id="'.$id.'"';



//// delete //// ok
$insertSQL5='DELETE FROM crud_table_rows WHERE crud_table_rows_id="'.$id.'"';


//// Table View //// ok
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
$case_filter=$_GET['case_filter'];	
$insertSQL6='SELECT * FROM crud_table_rows, crud_case WHERE crud_case.crud_case_id=crud_table_rows.crud_case_id AND crud_case.crud_case_id LIKE"'.$case_filter.'" ORDER BY row_asc';
}
else
{
$insertSQL6='SELECT * FROM crud_table_rows, crud_case WHERE crud_case.crud_case_id=crud_table_rows.crud_case_id ORDER BY row_asc';	
}

//// View Current Record //// ok
$insertSQL7='SELECT * FROM crud_table_rows WHERE crud_table_rows_id="'.$id.'"';


///// END ////

?>