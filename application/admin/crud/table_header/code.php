<?php
////// START /////

$id=$_GET['id'];
/// arabic insert ///
$insertSQL1='INSERT INTO crud_table_header (col_asc, col_title_ar, col_width, crud_case_id) VALUES ("'.$_GET['vcol_asc'].'", "'.$_GET['vcol_title'].'","'.$_GET['vcol_width'].'", "'.$_GET['vcrud_case_id'].'")';	

//// englis insert ////
$insertSQL2='INSERT INTO crud_table_header (col_asc, col_title_en, col_width, crud_case_id) VALUES ("'.$_GET['vcol_asc'].'","'.$_GET['vcol_title'].'","'.$_GET['vcol_width'].'", "'.$_GET['vcrud_case_id'].'")';


//// arabic update ////
$insertSQL3='UPDATE crud_table_header SET col_asc="'.$_GET['vcol_asc'].'",col_title_ar="'.$_GET['vcol_title'].'", col_width="'.$_GET['vcol_width'].'", crud_case_id="'.$_GET['vcrud_case_id'].'"  WHERE crud_table_header_id="'.$id.'"';

//// english update ////
$insertSQL4='UPDATE crud_table_header SET col_asc="'.$_GET['vcol_asc'].'",col_title_en="'.$_GET['vcol_title'].'", col_width="'.$_GET['vcol_width'].'", crud_case_id="'.$_GET['vcrud_case_id'].'"  WHERE crud_table_header_id="'.$id.'"';


//// delete //// ok
$insertSQL5='DELETE FROM crud_table_header WHERE crud_table_header_id="'.$id.'"';


//// Table View //// ok
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
$case_filter=$_GET['case_filter'];	
$insertSQL6='SELECT * FROM crud_table_header, crud_case WHERE crud_case.crud_case_id=crud_table_header.crud_case_id AND crud_case.crud_case_id LIKE"'.$case_filter.'" ORDER BY col_asc';
}
else
{
$insertSQL6='SELECT * FROM crud_table_header, crud_case WHERE crud_case.crud_case_id=crud_table_header.crud_case_id ORDER BY col_asc';	
}

//// View Current Record //// ok
$insertSQL7='SELECT * FROM crud_table_header WHERE crud_table_header_id="'.$id.'"';


?>