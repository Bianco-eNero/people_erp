<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='4';
$table='contract_type';
$id_field='contract_type';

//// FK for sub table ////
$fkey='contract_type';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(contract_type_arabic,contract_category)
VALUES
(
"'.$_GET['vContractType'].'",
"'.$_GET['vContractGroup'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(contract_type_english,contract_category)
VALUES
(
"'.$_GET['vContractType'].'",
"'.$_GET['vContractGroup'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
contract_type_arabic="'.$_GET['vContractType'].'",
contract_category="'.$_GET['vContractGroup'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
contract_type_english="'.$_GET['vContractType'].'",
contract_category="'.$_GET['vContractGroup'].'",
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