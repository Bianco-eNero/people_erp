<?php
$id=$_GET['id'];
$case_id='54';
$table='ben_benefits';
$id_field='ben_benefit_id';

//// FK for sub table ////
$fkey='ben_benefit_id';

/// only for popup pages //// to hide the header
$this_is_pop='0';


/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(ben_benefit_ar)
VALUES
(
"'.$_GET['vben_benefit'].'",
"'.$_GET['vben_benefits_sub_id'].'"
)';

//// englis insert ////
$insertSQL2='INSERT INTO '.$table.'
(ben_benefits_sub_sub_en, ben_benefits_gsub_id )
VALUES
(
"'.$_GET['vben_benefits_sub_sub'].'",
"'.$_GET['vben_benefits_sub_id'].'"
)';




//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
ben_benefits_sub_sub_ar="'.$_GET['vben_benefits_sub_sub'].'",
ben_benefits_sub_id="'.$_GET['vben_benefits_sub_id'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
ben_benefits_sub_sub_en="'.$_GET['vben_benefits_sub_sub'].'",
ben_benefits_sub_id="'.$_GET['vben_benefits_sub_id'].'"
WHERE '.$id_field.'="'.$id.'"';



//// delete //// ok done
$id=$_GET['id'];
$insertSQL5='DELETE FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


//// Table View //// ok done
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
$case_filter=$_GET['case_filter'];
$insertSQL6='SELECT * FROM '.$table.' WHERE ben_benefit_id="'.$case_filter.'"';
}
else
{
///// vew for table
$insertSQL6='SELECT * FROM '.$table.'';
}


//// View Current Record for form //// ok done
$id=$_GET['id'];
$insertSQL7='SELECT * FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


?>
