<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='77';
$table='cp_settings';
$id_field='cp_settings_id';

//// FK for sub table ////
$fkey='med_drugs_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(maximum_of_basic_and_excluded_inc ,  maximum_of_basic_and_excluded_inc_and_days ,  maximum_of_10_perc_of_production, max_of_mandatory_period, max_of_social_salary_le, days_count_from_date, sign_1_name_ar, sign_1_name_ar,sign_1_title_ar, sign_2_title_ar )
VALUES
(
"'.$_GET['vmaximum_of_basic_and_excluded_inc'].'",
"'.$_GET['vmaximum_of_basic_and_excluded_inc_and_days'].'",
"'.$_GET['vmaximum_of_10_perc_of_production'].'",
"'.$_GET['vmax_of_mandatory_period'].'",
"'.$_GET['vmax_of_social_salary_le'].'",
"'.$_GET['vdays_count_from_date'].'",
"'.$_GET['vsign_1_name_ar'].'",
"'.$_GET['vsign_2_name_ar'].'",
"'.$_GET['vsign_1_title_ar'].'",
"'.$_GET['vsign_2_title_ar'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(maximum_of_basic_and_excluded_inc ,  maximum_of_basic_and_excluded_inc_and_days ,  maximum_of_10_perc_of_production, max_of_mandatory_period, max_of_social_salary_le, days_count_from_date, sign_1_name_ar, sign_1_name_ar,sign_1_title_ar, sign_2_title_ar )
VALUES
(
"'.$_GET['vmaximum_of_basic_and_excluded_inc'].'",
"'.$_GET['vmaximum_of_basic_and_excluded_inc_and_days'].'",
"'.$_GET['vmaximum_of_10_perc_of_production'].'",
"'.$_GET['vmax_of_mandatory_period'].'",
"'.$_GET['vmax_of_social_salary_le'].'",
"'.$_GET['vdays_count_from_date'].'",
"'.$_GET['vsign_1_name_en'].'",
"'.$_GET['vsign_2_name_en'].'",
"'.$_GET['vsign_1_title_en'].'",
"'.$_GET['vsign_2_title_en'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
maximum_of_basic_and_excluded_inc="'.$_GET['vmaximum_of_basic_and_excluded_inc'].'",
maximum_of_basic_and_excluded_inc_and_days="'.$_GET['vmaximum_of_basic_and_excluded_inc_and_days'].'",
maximum_of_10_perc_of_production="'.$_GET['vmaximum_of_10_perc_of_production'].'",
max_of_mandatory_period="'.$_GET['vmax_of_mandatory_period'].'",
max_of_social_salary_le="'.$_GET['vmax_of_social_salary_le'].'",
days_count_from_date="'.$_GET['vdays_count_from_date'].'",
sign_1_name_ar="'.$_GET['vsign_1_name_ar'].'",
sign_2_name_ar="'.$_GET['vsign_2_name_ar'].'",
sign_1_title_ar="'.$_GET['vsign_1_title_ar'].'",
sign_2_title_ar="'.$_GET['vsign_2_title_ar'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
maximum_of_basic_and_excluded_inc="'.$_GET['vmaximum_of_basic_and_excluded_inc'].'",
maximum_of_basic_and_excluded_inc_and_days="'.$_GET['vmaximum_of_basic_and_excluded_inc_and_days'].'",
maximum_of_10_perc_of_production="'.$_GET['vmaximum_of_10_perc_of_production'].'",
max_of_mandatory_period="'.$_GET['vmax_of_mandatory_period'].'",
max_of_social_salary_le="'.$_GET['vmax_of_social_salary_le'].'",
days_count_from_date="'.$_GET['vdays_count_from_date'].'",
sign_1_name_en="'.$_GET['vsign_1_name_en'].'",
sign_2_name_en="'.$_GET['vsign_2_name_en'].'",
sign_1_title_en="'.$_GET['vsign_1_title_en'].'",
sign_2_title_en="'.$_GET['vsign_2_title_en'].'"
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