<a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vBasicBata); ?></li></a>
<a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vOccupationalData); ?></li></a>
<a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vLeaves); ?></li></a>
<a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vTimeControl); ?></li></a>
<a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vSalariesAndBenefits); ?></li></a>
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
        <a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vMedicalSystem); ?></li></a>
        <a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vTraining); ?></li></a>
        <a href="<?php echo $server; ?>application/my/"><li><?php echo  str_replace('ال', '', $vPenalties); ?></li></a>
        <a href="<?php echo $server; ?>application/my/observation"><li><?php echo  str_replace('ال', '', $vObservation); ?></li></a>
    </div>
</div>