
<?php
// medical_active = 1 --> clinicAdmin
if($_SESSION['medical_active']==1) {?>
<a href="<?php echo $server; ?>application/medical/clinicAdmin"><li><?php echo $vMedicalCases; ?></li></a>
<?php }?>

<?php
// medical_active = 2 --> doctor
 if($_SESSION['medical_active']==2) {?>
<a href="<?php echo $server; ?>application/medical/doctor"><li><?php echo $vMedicalCases; ?></li></a>
<a href="<?php echo $server; ?>application/medical/doctor"><li><?php echo $vCalendar; ?></li></a>
<a href="<?php echo $server; ?>application/medical/doctor"><li><?php echo $vHospitalTransfers; ?></li></a>
<a href="<?php echo $server; ?>application/medical/doctor"><li><?php echo $vReports; ?></li></a>
<a href="<?php echo $server; ?>application/medical/doctor"><li><?php echo $vSettings; ?></li></a>
<?php }?>