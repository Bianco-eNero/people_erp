<?php
//// include config script ////
include('assets/config.php');
//// end of config script ////

//// Include Language ////
include('assets/languages/language_switch.php');

if ($_SESSION['language']=='AR')
{
include ('assets/languages/arabic.php');
}

if ($_SESSION['language']=='EN')
{
include ('assets/languages/english.php');
}
//// End Language ////
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<?php
//// include header script ////
include('assets/header.php');
//// end of header script ////


if ((isset($_POST["username"])) && ($_POST["username"] <> "")) {


//// start check duplicate ////

 $ggg=$_POST['username'];
$pppp=$_POST['password'];

$pino=base64_decode($_POST['t']);


mysqli_select_db($website,$database_website );
$query_current_user = "SELECT *,(employee.organization) AS organization1  FROM employee, organization WHERE organization.organization=employee.organization AND employee_id='$ggg' and password='$pppp'";
$current_user = $website->query($query_current_user);
$row_current_user = mysqli_fetch_assoc($current_user);



if(isset($row_current_user['emp_id']))
{

$_SESSION['national_id_card_no']=$row_current_user['national_id_card_no'];
$_SESSION['emp_id']=$row_current_user['emp_id'];
$_SESSION['current_company']=$row_current_user['organization1'];
$_SESSION['current_company_name_ar']=$row_current_user['organization_arabic'];
$_SESSION['current_company_name_en']=$row_current_user['organization_english'];
$_SESSION['system_admin']=$row_current_user['system_admin'];
$_SESSION['company_admin']=$row_current_user['company_admin'];

$var1=$row_current_user['organization1'];
$var2=$row_current_user['organization_arabic'];
$var3=$row_current_user['organization_english'];
	
$_SESSION['current_company']=$row_current_user['organization1'];
	

echo '<script type="text/javascript">
           window.location = "'.$server.'application/"
      </script>';

}
else
{

///// end check duplicate ///
echo '<script type="text/javascript">
           window.location = "'.$server.'?wrong_login=1"
      </script>';


	//declare two session variables and assign them





}

}


	?>
	</head>
	<body <?php if($_SESSION['language']=='EN') { ?> style="text-align:left" <?php }?>>
		<section class="login-box" style="margin-top:140px">
			<header>
				<figure>
					<img src="assets/images/company_logo.png" />
				</figure>
			</header>
			<main class="main">
				<form method="post" action="index.php">
					<fieldset class="email" <?php if($_SESSION['language']=='EN') { ?> style="text-align:left" <?php }?>>
						<label for="email"><?php echo $vUsername; ?></label>
						<input type="text" name="username" id="email" placeholder="" />
					</fieldset>
					<fieldset class="password" <?php if($_SESSION['language']=='EN') { ?> style="text-align:left" <?php }?>>
						<label for="password"><?php echo $vPassword; ?></label>
						<input type="password" name="password" id="password" placeholder="" />
					</fieldset>
					<fieldset class="login" style="margin-top:10px">
						<input type="submit" name="login" value="<?php echo $vLogin; ?>" />
<br/> <br/>
						<?php if($_SESSION['language']=='EN') { ?>
							<div style="text-align:right; width:100%">
						<a style="color:black" href="?language=AR" class="arabic">اللغة العربية</a>
					</div>
					<?php } ?>

					<?php if($_SESSION['language']=='AR') { ?>
						<div style="text-align:left; width:100%">
					<a style="color:black" href="?language=EN" >
English Language
</a></div>
				<?php } ?>

						<p class="question" style="display:none">Don't have an account?</p>
					</fieldset>
				</form>
			</main>
			<footer class="footer">
				<h3>Powered by Poeple ERP</h3>
			</footer>
		</section>
	</body>
</html>
