<?php

$id=$_GET['id'];
$curr=$_GET['id'];
$index='index.php';
$photo_field='photo';
$document_field='document';

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////// Start Preparation ////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$case_id='28';
$table='university_school';
$id_field='university_school';

//// FK for sub table ////
$fkey='university_school';



/// arabic insert ///
$insertSQL1='INSERT INTO '.$table.'
(university_school_arabic)
VALUES
(
"'.$_GET['vuniversity_school'].'"
)';

//// english insert ////
$insertSQL2='INSERT INTO '.$table.'
(university_school_english)
VALUES
(
"'.$_GET['vuniversity_school'].'"
)';






//// arabic update ////
$insertSQL3='UPDATE '.$table.' SET
university_school_arabic="'.$_GET['vuniversity_school_arabic'].'"
WHERE '.$id_field.'="'.$id.'"';





//// english update ////
$insertSQL4='UPDATE '.$table.' SET
university_school_english="'.$_GET['vuniversity_school_arabic'].'"
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