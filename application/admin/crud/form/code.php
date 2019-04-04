<?php
////// START /////

$id=$_GET['id'];

/// arabic insert ///
$insertSQL1='INSERT INTO crud_add_form 
(field_asc, title_width, field_width, title_ar, crud_case_id, field_name, field_type,  select_table, select_table_id_field, select_table_ar_field, locked, table_field_ar, under_group, group_name_ar, crud_add_form_tab_id, note_ar) 
VALUES 
(
"'.$_GET['vfield_asc'].'", 
"'.$_GET['vtitle_width'].'",
"'.$_GET['vfield_width'].'", 
"'.$_GET['vtitle'].'", 
"'.$_GET['vcrud_case_id'].'",
"'.$_GET['vfield_name'].'",
"'.$_GET['vfield_type'].'",
"'.$_GET['vselect_table'].'",
"'.$_GET['vselect_table_id_field'].'",
"'.$_GET['vselect_table_field'].'",
"'.$_GET['vlocked'].'",
"'.$_GET['vtable_field'].'",
"'.$_GET['vunder_group'].'",
"'.$_GET['vunder_group_name'].'",
"'.$_GET['vcrud_add_form_tab_id'].'",
"'.$_GET['vnote'].'" 
)';

//// englis insert ////
$insertSQL2='INSERT INTO crud_add_form 
(field_asc, title_width, field_width, title_en, crud_case_id, field_name , field_type, select_table, select_table_id_field, select_table_en_field, locked,  table_field_en, under_group, group_name_en, crud_add_form_tab_id, note_en) 
VALUES 
(
"'.$_GET['vfield_asc'].'",
"'.$_GET['vtitle_width'].'",
"'.$_GET['vfield_width'].'", 
"'.$_GET['vtitle'].'", 
"'.$_GET['vcrud_case_id'].'",
"'.$_GET['vfield_name'].'",
"'.$_GET['vfield_type'].'",
"'.$_GET['vselect_table'].'",
"'.$_GET['vselect_table_id_field'].'",
"'.$_GET['vselect_table_field'].'",
"'.$_GET['vlocked'].'",
"'.$_GET['vtable_field'].'",
"'.$_GET['vunder_group'].'",
"'.$_GET['vunder_group_name'].'",
"'.$_GET['vcrud_add_form_tab_id'].'",
"'.$_GET['vnote'].'" 
)';




//// arabic update ////
$insertSQL3='UPDATE crud_add_form SET 
field_asc="'.$_GET['vfield_asc'].'",
title_width="'.$_GET['vtitle_width'].'", 
field_width="'.$_GET['vfield_width'].'",
title_ar="'.$_GET['vtitle'].'",
crud_case_id="'.$_GET['vcrud_case_id'].'",
field_name="'.$_GET['vfield_name'].'",
field_type="'.$_GET['vfield_type'].'",
select_table="'.$_GET['vselect_table'].'",
select_table_id_field="'.$_GET['vselect_table_id_field'].'",
select_table_ar_field="'.$_GET['vselect_table_field'].'",
locked="'.$_GET['vlocked'].'",
table_field_ar="'.$_GET['vtable_field'].'",
group_name_ar="'.$_GET['vunder_group_name'].'",
under_group="'.$_GET['vunder_group'].'",
crud_add_form_tab_id="'.$_GET['vcrud_add_form_tab_id'].'",
note_ar="'.$_GET['vnote'].'"
WHERE crud_add_form_id="'.$id.'"';


//// english update ////
$insertSQL4='UPDATE crud_add_form SET 
field_asc="'.$_GET['vfield_asc'].'",
title_width="'.$_GET['vtitle_width'].'", 
field_width="'.$_GET['vfield_width'].'",
title_en="'.$_GET['vtitle'].'",
crud_case_id="'.$_GET['vcrud_case_id'].'",
field_name="'.$_GET['vfield_name'].'",
field_type="'.$_GET['vfield_type'].'",
select_table="'.$_GET['vselect_table'].'",
select_table_id_field="'.$_GET['vselect_table_id_field'].'",
select_table_en_field="'.$_GET['vselect_table_field'].'",
locked="'.$_GET['vlocked'].'",
table_field_en="'.$_GET['vtable_field'].'",
group_name_en="'.$_GET['vunder_group_name'].'",
under_group="'.$_GET['vunder_group'].'",
crud_add_form_tab_id="'.$_GET['vcrud_add_form_tab_id'].'",
note_en="'.$_GET['vnote'].'"
WHERE crud_add_form_id="'.$id.'"';



//// delete //// ok
$insertSQL5='DELETE FROM crud_add_form WHERE crud_add_form_id="'.$id.'"';


//// Table View //// ok
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
$case_filter=$_GET['case_filter'];	
$insertSQL6='SELECT * FROM crud_add_form, crud_case WHERE crud_case.crud_case_id=crud_add_form.crud_case_id AND crud_case.crud_case_id LIKE"'.$case_filter.'" ORDER BY field_asc';
}
else
{
$insertSQL6='SELECT * FROM crud_add_form, crud_case WHERE crud_case.crud_case_id=crud_add_form.crud_case_id ORDER BY field_asc';	
}



//// View Current Record //// ok
$insertSQL7='SELECT * FROM crud_add_form WHERE crud_add_form_id="'.$id.'"';


///// END ////

?>