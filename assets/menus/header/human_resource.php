<a href="<?php echo $server; ?>application/human_resource/organization/"><li><?php echo str_replace('ال', '', $vOrganizationSystem); ?></li></a>
<a href="<?php echo $server; ?>application/human_resource/personnel/"><li><?php echo str_replace('ال', '', $vEmployees); ?></li></a>
<a href="<?php echo $server; ?>application/human_resource/salaries_benefits/"><li><?php echo str_replace('ال', '', $vSalaries); ?></li></a>
<a href="<?php echo $server; ?>application/human_resource/medical_management/"><li><?php echo str_replace('ال', '', $vMedicalSystem); ?></li></a>
<a href="<?php echo $server; ?>application/human_resource/training/"><li><?php echo str_replace('ال', '', $vTraining); ?></li></a>
<a href="<?php echo $server; ?>application/human_resource/compl_pension/"><li><?php echo str_replace('ال', '', $vComplementaryPension); ?></li></a>
<a id="menuButton" href="#"><li><?php echo $vOthers ; ?><i class="fas fa-sort-down fa-fw"></i></li></a>
<style>
    .display-block{display: block!important;}
    .dropdownitem a li{color: #000000!important;}
    .dropdownitem a li:hover{background-color: #e9ecef!important;}
    .dropdownitem a :hover{background-color: #e9ecef!important;}
</style>
<script>
    $('#menuButton').click(function(){
        $('.dropdown-menu').toggleClass('display-block');
    });
</script>
<div class="dropdown" <?php  if($_SESSION['language']=='EN'){echo 'style="left: 39%"';}?>>
    <div class="dropdown dropdown-menu dropdownitem" aria-labelledby="dropdownMenuLink">
        <a href="<?php echo $server; ?>application/human_resource/public_relations/"><li><?php echo $vPublicRelations; ?></li></a>
        <a href="<?php echo $server; ?>application/human_resource/time_control/"><li><?php echo str_replace('ال', '', $vTime); ?></li></a>
        <a href="<?php echo $server; ?>application/human_resource/saving_insurance/"><li><?php echo $vSavingInsurance ; ?></li></a>
        <a href="<?php echo $server; ?>application/human_resource/reports/"><li><?php echo $vReports ; ?></li></a>
        <a href="<?php echo $server; ?>application/human_resource/settings/"><li><?php echo $vSettings ; ?></li></a>
    </div>
</div>
