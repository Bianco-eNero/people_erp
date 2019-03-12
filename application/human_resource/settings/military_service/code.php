<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='24';
$table='military_service_status';
$id_field='military_service_status';

//// FK for sub table ////
$fkey='military_service_status';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(status_arabic)
VALUES
(
"'.$_GET['vstatus'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(status_english)
VALUES
(
"'.$_GET['vstatus'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
status_arabic="'.$_GET['vstatus'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
status_english="'.$_GET['vstatus'].'"
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