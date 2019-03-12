<?php
//// include config script ////
include('../../../../../assets/config.php');
//// end of config script ////

//// Include Language ////
include('../../../../../assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('../../../../../assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('../../../../../assets/languages/english.php');
}
//// End Language ////


$use_bootstrap='1';

//// End of include the settings table ///


 $cur_time =date("Y-m-d H:i:s",strtotime('+7 Hours'));

 //$workingDay=$_POST['workingDay'];
 //$_SESSION['workinDay']=$workingDay;

 $co_id=$_SESSION['MM_CompanyIdAcc'];

$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'files';   //2

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

echo $filename.'        '.$extension;

	 $doc_file_name=$rrt.'.'.$extension;;//$_SESSION['rto'].'.'.$extension;

    $targetFile =  $targetPath. $doc_file_name;  //5

    move_uploaded_file($tempFile,$targetFile); //6

	chmod($targetFile, 0777);

	 ////

$size=filesize($_FILES['file']['tmp_name']);
$size=$size/1024/1024;
	////


$_SESSION['uploaded_file']=$doc_file_name;
$_SESSION['patch_code']=$timeo;

	 $sql = "insert into import_employees_data (import_employees_data_id, file_name) values ('$timeo' ,' $doc_file_name')";

     $result = mysqli_query($website , $sql) or die ("Could not insert data into DB: " . mysqli_error($website));





//$filename=mktime().'_'.$_FILES['import']['name'];

  //    $path='files/'.$filename;


	//	mysql_query("load data local infile '".$path."' INTO TABLE tbl_customer FIELDS TERMINATED BY ',' enclosed by '\"' LINES TERMINATED BY '\n' IGNORE 1 LINES")

?>
<script>
		 window.location.href = "";

    exit();
		</script>

<?php /*
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
	//// include header script ////
	include('../../../../../assets/header.php');
	//// end of header script ////
		?>

			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
										<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
										<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
										<!------ Include the above in your HEAD tag ---------->

										<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


		<script src="../../../../../assets/js/dropzone.js"></script>



	</head>
	<body style="height:100%">
		<section class="employees">
			<header class="header">
				<nav class="sections">
					<a href="<?php echo $server; ?>application/" style="height: 100%;">
						<figure style="height: 100%;">
							<i class="fas fa-th"></i>
						</figure>
					</a>
					<a href="<?php echo $server; ?>application/human_resource/compl_pension/" >
						<h1 style="height: 100%;"><?php echo $vComplementaryPension; ?></h1>
					</a>
						<ul>
							<?php
							//// include compl pnsion header ////
							include('../../../../../assets/menus/header/compl_pension.php')
							?>
						</ul>
				</nav>
        <section class="account">
          <ul>
						<?php
						include('../../../../../assets/menus/user_account.php');
						?>
          </ul>
        </section>

				<div class="clear"></div>
			</header>
			<main class="main" style="height:100%">
				<section class="control">
					<section class="action">
						<h1><?php echo $vHome; ?></h1>
						<form method="post" action="../../create" style="display:none">
							<fieldset>
								<input type="submit" name="create" id="create" value="CREATE" class="focus" />
								<input type="submit" name="import" id="import" value="IMPORT" class="no-focus" />
							</fieldset>
						</form>
					</section>
					<section style="<?php if($_SESSION['language']=='AR') { ?>left: 0%;float:left <?php } else { ?>right: 0%;float:right  <?php } ?>;position: absolute;z-index: 1; padding-right: 20px;padding-left: 20px; ">
			    <img src="<?php echo $server; ?>assets/images/logos/<?php echo $row_current_company['photo']; ?>" width="129" height="84" alt=""> </section>
					
<section class="navigation" style="<?php if($_SESSION['language']=='AR') { ?>float:left ; margin-right:400px <?php } ?>">
						<fieldset class="search">
							<input class="arabic" type="text" id="search" placeholder="<?php echo $vSearch ; ?>..." />

						</fieldset>
						<fieldset class="refine" <?php if($_SESSION['language']=='AR') { ?>style="margin-left:0px <?php } ?> ">
							<span style="font-size: 14px"><?php echo  $row_crud_case['case_code']; ?> </span>  &nbsp
							
<button id="filters"><i class="fas fa-filter"></i>Filters<i class="fas fa-caret-down"></i></button>
							<button id="group-by"><i class="fas fa-bars"></i>Group By<i class="fas fa-caret-down"></i></button>
							<button id="favourites"><i class="fas fa-star"></i>Favourites<i class="fas fa-caret-down"></i></button>
						</fieldset>
						<fieldset class="view">
							 <span class="count">1-1 / 1</span>
							 <span class="directions">
								 <button id="right"><i class="fas fa-chevron-right"></i></button>
								 <button id="left"><i class="fas fa-chevron-left"></i></button>
							</span>
							 <span class="layout">
								 <button class="active" id="thumbnails-large"><i class="fas fa-th-large"></i></button><button id="list"><i class="fas fa-list-ul"></i></button><button id="thumbnails"><i class="fas fa-th"></i></button>
							 </span>
						</fieldset>
						<div class="clear"></div>
					</section>
					<div class="clear"></div>
				</section>
				<section class="body" style="height:100%">




										<section>
										<div class="container">
										<!-- Start Content -->




										<!-- End Content -->
										</div>

										</section>

				</section>
			</main>
		</section>
	</body>
</html>

*/?>
