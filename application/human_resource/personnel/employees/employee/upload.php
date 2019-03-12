<?php
$ds = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads/'.$_GET['id'];   //2
//Name of our directory

//Check if the directory with the name already exists
if (!is_dir($storeFolder )) {
//Create our directory if it does not exist
    mkdir($storeFolder );

}
if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    move_uploaded_file($tempFile,$targetFile); //6

}
?>
<!--- See more at: http://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php#sthash.APTCQ8nP.dpuf-->