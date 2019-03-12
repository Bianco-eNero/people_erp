<?php

//// include connection ////
include ('../connections/tamakon.php');
//// end of connection ////

//// include setup ////
include('../includes/setup.php'); 
//// end of setup ////



 
if (!empty($_FILES) && (isset($_POST['time']))) {
     
   
	
	
	 
	
	
if(isset($_POST['time'])){
	
	//// upload ///
	
 $cur_time =date("Y-m-d H:i:s",strtotime('+7 Hours'));
 
 //$workingDay=$_POST['workingDay'];
 //$_SESSION['workinDay']=$workingDay;
 
 $co_id=$_SESSION['MM_CompanyIdAcc'];

$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'files/';   //2

$rrt=$_POST['time'];
////
	$timeo=time();
 

///

	
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}


 $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
	 $filename = stripslashes($_FILES['file']['name']);
//get the extension of the file in a lower case format
$extension = getExtension($filename);
	 
	 $doc_file_name=$_SESSION['rto'].'.'.$extension;
	 
    $targetFile =  $targetPath. $doc_file_name;  //5
	
    move_uploaded_file($tempFile,$targetFile); //6
	
	chmod($targetFile, 0777);
	
	 ////
	 
$size=filesize($_FILES['file']['tmp_name']);
$size=$size/1024/1024;
	////
	
	$_SESSION['time_file']=$targetFile;

$doc_title=$row_added_by23['object_type_e'].' '.$object_id.' | '.$_FILES['file']['name'];

	
	
	$fgo=$_FILES['file']['name'];
	$co_id=$_SESSION['MM_CompanyIdAcc'];
	
	$tag=$value;
	
	
	$doc_file_name2=$_SESSION['rto'];
	
	$desc=$_POST['desc'];
	
	 $sql = "insert into cp_patch_employee_salary (national_id_card_no, cp_basic_salary_total_last_july , total_excluded_increases_le , current_production_inc_le ) values ('$timeo' ,'$doc_file_name2','$desc', '$co_id')";
 
    $result = mysqli_query($eogm , $sql) or die ("Could not insert data into DB: " . mysqli_error($eogm));
	
	


///
?>
<?php
///////
	
}

	



 
 ////
 
} // close while loop

	////


	
  //  mail($to,$subject,$message,$headers);



	      




?>