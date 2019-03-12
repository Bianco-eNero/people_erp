<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='31';
$table='organization';
$id_field='organization';

//// FK for sub table ////
$fkey='organization';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(organization, organization_arabic, organization_arabic_name, holding_company_id, photo, registered, sys_hr_main, sys_cp_main, sys_meetings_main, sys_documents_main, sys_hse_main, sys_website_main)
VALUES
(
"'.$_GET['v'].'",
"'.$_GET['vorganization'].'",
"'.$_GET['vorganization2'].'",
"'.$_GET['vholding_company_id'].'",
"'.$_GET['vphoto'].'",
"'.$_GET['vregistered'].'",
"'.$_GET['vsys_hr_main'].'",
"'.$_GET['vsys_cp_main'].'",
"'.$_GET['vsys_meetings_main'].'",
"'.$_GET['vsys_documents_main'].'",
"'.$_GET['vsys_hse_main'].'",
"'.$_GET['vsys_website_main'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(organization, organization_english, organization_english_name, holding_company_id, photo, registered, sys_hr_main, sys_cp_main, sys_meetings_main, sys_documents_main, sys_hse_main, sys_website_main)
VALUES
(
"'.$_GET['v'].'",
"'.$_GET['vorganization'].'",
"'.$_GET['vorganization2'].'",
"'.$_GET['vholding_company_id'].'",
"'.$_GET['vphoto'].'",
"'.$_GET['vregistered'].'",
"'.$_GET['vsys_hr_main'].'",
"'.$_GET['vsys_cp_main'].'",
"'.$_GET['vsys_meetings_main'].'",
"'.$_GET['vsys_documents_main'].'",
"'.$_GET['vsys_hse_main'].'",
"'.$_GET['vsys_website_main'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
organization="'.$_GET['v'].'",
organization_arabic="'.$_GET['vorganization'].'",
organization_arabic_name="'.$_GET['vorganization2'].'",
holding_company_id="'.$_GET['vholding_company_id'].'",
photo="'.$_GET['vphoto'].'",
registered="'.$_GET['vregistered'].'",
sys_hr_main="'.$_GET['vsys_hr_main'].'",
sys_cp_main="'.$_GET['vsys_cp_main'].'",
sys_meetings_main="'.$_GET['vsys_meetings_main'].'",
sys_documents_main="'.$_GET['vsys_documents_main'].'",
sys_hse_main="'.$_GET['vsys_hse_main'].'",
sys_website_main="'.$_GET['vsys_website_main'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
organization="'.$_GET['v'].'",
organization_english="'.$_GET['vorganization'].'",
organization_english_name="'.$_GET['vorganization2'].'",
holding_company_id="'.$_GET['vholding_company_id'].'",
photo="'.$_GET['vphoto'].'",
registered="'.$_GET['vregistered'].'",
sys_hr_main="'.$_GET['vsys_hr_main'].'",
sys_cp_main="'.$_GET['vsys_cp_main'].'",
sys_meetings_main="'.$_GET['vsys_meetings_main'].'",
sys_documents_main="'.$_GET['vsys_documents_main'].'",
sys_hse_main="'.$_GET['vsys_hse_main'].'",
sys_website_main="'.$_GET['vsys_website_main'].'"
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