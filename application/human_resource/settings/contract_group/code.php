<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='3';
$table='contract_category';
$id_field='contract_category';

//// FK for sub table ////
$fkey='contract_category';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(contract_category_arabic)
VALUES
(
"'.$_GET['vcontract_category'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(contract_category_english)
VALUES
(
"'.$_GET['vcontract_category'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
contract_category_arabic="'.$_GET['vcontract_category'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
contract_category_english="'.$_GET['vcontract_category'].'"
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