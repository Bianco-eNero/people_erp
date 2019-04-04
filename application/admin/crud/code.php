<?php
$id=$_GET['id'];
$case_icon=str_replace('"></i>', '', str_replace('<i class="', '', $_GET['vcase_icon']) );
/// arabic insert ///
$insertSQL1='INSERT INTO crud_case (just_link_case, has_tabs, open_sub_in_popup, crud_case_title, edit_add_table, id_field, records_per_page, case_link,case_main_id,  case_code, has_sub_cases ,case_icon) VALUES ("'.$_GET['vjust_link_case'].'", "'.$_GET['vhas_tabs'].'", "'.$_GET['vopen_sub_in_popup'].'","'.$_GET['vcrud_case_title'].'", "'.$_GET['vedit_add_table'].'", "'.$_GET['vid_field'].'", "'.$_GET['vrecords_per_page'].'", "'.$_GET['vcase_link'].'","'.$_GET['vmain_case_id'].'", "'.$_GET['vcase_code'].'","'.$_GET['vhas_sub_cases'].'", "'.$case_icon.'")';

//// englis insert ////
$insertSQL2='INSERT INTO crud_case (just_link_case, has_tabs, open_sub_in_popup, crud_case_title_en, edit_add_table, id_field, records_per_page, case_link,case_main_id, case_code, has_sub_cases ,case_icon) VALUES ("'.$_GET['vjust_link_case'].'", "'.$_GET['vhas_tabs'].'", "'.$_GET['vopen_sub_in_popup'].'", "'.$_GET['vcrud_case_title'].'", "'.$_GET['vedit_add_table'].'", "'.$_GET['vid_field'].'", "'.$_GET['vrecords_per_page'].'", "'.$_GET['vcase_link'].'","'.$_GET['vmain_case_id'].'", "'.$_GET['vcase_code'].'", "'.$_GET['vhas_sub_cases'].'", "'.$case_icon.'")';


//// arabic update ////
$insertSQL3='UPDATE crud_case SET just_link_case="'.$_GET['vjust_link_case'].'", has_tabs="'.$_GET['vhas_tabs'].'", open_sub_in_popup="'.$_GET['vopen_sub_in_popup'].'", crud_case_title="'.$_GET['vcrud_case_title'].'",
edit_add_table="'.$_GET['vedit_add_table'].'",
id_field="'.$_GET['vid_field'].'",
records_per_page="'.$_GET['vrecords_per_page'].'",
case_code="'.$_GET['vcase_code'].'",
case_main_id="'.$_GET['vmain_case_id'].'",
has_sub_cases="'.$_GET['vhas_sub_cases'].'",
case_link="'.$_GET['vcase_link'].'",
case_icon="'.$case_icon.'"
WHERE crud_case_id="'.$id.'"';




//// english update ////
$insertSQL4='UPDATE crud_case SET just_link_case="'.$_GET['vjust_link_case'].'", has_tabs="'.$_GET['vhas_tabs'].'",  open_sub_in_popup="'.$_GET['vopen_sub_in_popup'].'", crud_case_title_en="'.$_GET['vcrud_case_title'].'",
edit_add_table="'.$_GET['vedit_add_table'].'",
id_field="'.$_GET['vid_field'].'",
records_per_page="'.$_GET['vrecords_per_page'].'",
case_code="'.$_GET['vcase_code'].'",
case_main_id="'.$_GET['vmain_case_id'].'",
has_sub_cases="'.$_GET['vhas_sub_cases'].'",
case_link="'.$_GET['vcase_link'].'",
case_icon="'.$case_icon.'"
WHERE crud_case_id="'.$id.'"';


//// delete //// ok
$insertSQL5='DELETE FROM crud_case WHERE crud_case_id="'.$id.'"';

//// Table View //// ok

if(isset($_GET['search']))
{
  $search=$_GET['search'];
  $insertSQL6="SELECT * FROM crud_case WHERE case_code LIKE '%$search%' ORDER BY case_code";
}
else {
  $insertSQL6='SELECT * FROM crud_case ORDER BY case_code';
}



//// View Current Record //// ok
$insertSQL7='SELECT * FROM crud_case WHERE crud_case_id="'.$id.'"';

?>
