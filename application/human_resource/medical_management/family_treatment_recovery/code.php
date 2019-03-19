<?php
$id=$_GET['id'];
$case_id='71';
$table='employee_family_member';
$id_field='family_id';

//// FK for sub table ////
$fkey='family_id';

$this_is_pop='1';


/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(relation_type, birth_date ,  family_name, national_id_number, education, emp_id , job)
VALUES
(
"'.$_GET['vrelation_type'].'",
"'.$_GET['vbirth_date'].'",
"'.$_GET['vfamily_name'].'",
"'.$_GET['vnational_id_number'].'",
"'.$_GET['veducation'].'",
"'.$_GET['vemp_id'].'",
"'.$_GET['vjob'].'"
)';

//// englis insert ////
$insertSQL2='INSERT INTO '.$table.'
(relation_type, birth_date ,  family_name, national_id_number, education, emp_id, job)
VALUES
(
  "'.$_GET['vrelation_type'].'",
  "'.$_GET['vbirth_date'].'",
  "'.$_GET['vfamily_name_en'].'",
  "'.$_GET['vnational_id_number'].'",
  "'.$_GET['veducation'].'",
  "'.$_GET['vemp_id'].'",
  "'.$_GET['vjob'].'"
)';




//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
relation_type="'.$_GET['vrelation_type'].'",
birth_date="'.$_GET['vbirth_date'].'",
family_name="'.$_GET['vfamily_name'].'",
national_id_number="'.$_GET['vnational_id_number'].'",
education="'.$_GET['veducation'].'",
emp_id="'.$_GET['vemp_id'].'",
job="'.$_GET['vjob'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
relation_type="'.$_GET['vrelation_type'].'",
birth_date="'.$_GET['vbirth_date'].'",
family_name_en="'.$_GET['vfamily_name'].'",
national_id_number="'.$_GET['vnational_id_number'].'",
education="'.$_GET['veducation'].'",
emp_id="'.$_GET['vemp_id'].'",
job="'.$_GET['vjob'].'"
WHERE '.$id_field.'="'.$id.'"';



//// delete //// ok done
$id=$_GET['id'];
$insertSQL5='DELETE FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


//// Table View //// ok done
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
    $case_filter=$_GET['case_filter'];
    $insertSQL6='SELECT * FROM employee_family_member, relation_type WHERE relation_type.relation_type_id=employee_family_member.relation_type AND emp_id="'.$case_filter.'"';
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
