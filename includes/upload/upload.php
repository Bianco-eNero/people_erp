<?php
//// include config script ////
include('../../assets/config.php');
//    //Name of our directory


$ds = DIRECTORY_SEPARATOR;  //1

if ( !empty($_FILES) && isset($_SESSION['table']) ) {


    $record_id = $_SESSION['record_id']; $control_id = $_SESSION['control_id']; $object_id = $_SESSION['object_id'];
    $table = $_SESSION['table']; $field = $_SESSION['field']; $id_field = $_SESSION['id_field'];

    $storeFolder = ($control_id == '9999') ? 'images' : 'documents';   //2
    /*
        //Create our directory if it does not exist
        if (!is_dir($storeFolder)) { mkdir($storeFolder); }
    */
    $tempFile = $_FILES['file']['tmp_name'];          //3
    $nameFile = $_FILES['file']['name'];

    $imgALLowed = array("jpeg", "jpg", "png", "gif");
    $img_type = strtolower(end(explode('.', $nameFile)));
    if (in_array($img_type, $imgALLowed)) {

//        $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4
        $targetPath = realpath(dirname(__FILE__) . '/..'. '/..'). $ds . 'assets/images/logos' . $ds;  //4

        $targetFile = $targetPath . $nameFile;  //5

        move_uploaded_file($tempFile, $targetFile); //6

        mysqli_select_db($website, $database_website);
        $query_insert_file = 'UPDATE ' . $table . ' SET ' . $field . '="' . $nameFile . '"WHERE ' . $id_field . '="' . $object_id . '"';
        $insert_file = mysqli_query($website, $query_insert_file) or die(mysqli_error($website));

        unset($_SESSION['record_id']); unset($_SESSION['control_id']);
        unset($_SESSION['object_id']); unset($_SESSION['field']);
        unset($_SESSION['table']); unset($_SESSION['id_field']);
        echo' <script  type="text/javascript"> window.close(); self.close(); web_window.close(); </script>';
    }
}
?>
<!--- See more at: http://www.startutorial.com/articles/view/how-to-build-a-file-upload-form-using-dropzonejs-and-php#sthash.APTCQ8nP.dpuf-->
