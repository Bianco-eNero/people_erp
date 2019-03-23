<?php
$id=$_GET['id'];
$case_id='51';
$table='employee';
$id_field='emp_id';

//// FK for sub table ////
$fkey='emp_id';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(employee_id, name_arabic ,  birth_date)
VALUES
(
"'.$_GET['vemployee_id'].'",
"'.$_GET['vname'].'",
"'.$_GET['vbirth_date'].'"
)';

//// englis insert ////
$insertSQL2='INSERT INTO '.$table.'
(employee_id, name_english ,  birth_date)
VALUES
(
"'.$_GET['vemployee_id'].'",
"'.$_GET['vname'].'",
"'.$_GET['vbirth_date'].'"
)';




//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
employee_id="'.$_GET['vemployee_id'].'",
birth_date="'.$_GET['vbirth_date'].'",
name_arabic="'.$_GET['vname'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
employee_id="'.$_GET['vemployee_id'].'",
birth_date="'.$_GET['vbirth_date'].'",
name_english="'.$_GET['vname'].'"
WHERE '.$id_field.'="'.$id.'"';



//// delete //// ok done
$id=$_GET['id'];
$insertSQL5='DELETE FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


//// Table View //// ok done
if(isset($_GET['case_filter']) && $_GET['case_filter']<>"")
{
$case_filter=$_GET['case_filter'];
$insertSQL6="SELECT * FROM $table WHERE organization='$cooo' AND $fkey='$case_filter' LIMIT $page,$limit";
$insertSQLNo="SELECT count($id_field) as numberEmpolyee FROM $table WHERE organization='$cooo' AND $fkey='$case_filter'  ";
}
else
{
///// vew for table
$insertSQL6="SELECT * FROM $table WHERE organization='$cooo' LIMIT $page,$limit";
$insertSQLNo="SELECT count($id_field) as numberItem FROM $table WHERE organization='$cooo' ";

}


//// View Current Record for form //// ok done
$id=$_GET['id'];
$insertSQL7='SELECT * FROM '.$table.' WHERE '.$id_field.'="'.$id.'"';


?>