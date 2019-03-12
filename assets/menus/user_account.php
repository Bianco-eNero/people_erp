<div <?php if($_SESSION['language']=='AR') { ?>style="float: left" <?php } ?> <?php if($_SESSION['language']=='EN') { ?>style="float: right" <?php } ?>>

<section class="account dont_print_me" style="max-width: 140px;margin-left: 30px">
				  <ul>
<li style="display:none" id="activities"><i class="far fa-clock"></i></li>
<li style="display:none" id="conversations"><i class="fas fa-comments"></i><i class="circle">1</i></li>
<li style="display:none" id="customization"><img src="../img/settings-small.png" /><i class="fas fa-caret-down"></i></li>
<li id="avatar" style="z-index: 2; position:relative; min-width:140px;">
    <section class="dropdown" id="avatar-menu" style="float: left">
      <ul style="">
        <li><a href="<?php echo $server; ?>application/my"><?php echo $v5adamaty;?></a></li>
        <li><a href="">Support</a></li>
        <li><a href="">Shortcuts</a></li>
      </ul>
      <hr />
      <ul>
        <?php
        if($_SESSION['language']=='AR')
        {
         ?>
        <li><a href="<?php echo $english_link; ?>">English Language</a></li>
      <?php } ?>
      <?php
      if($_SESSION['language']=='EN')
      {
       ?>

        <li><a href="<?php echo $arabic_link; ?>">اللغة العربية</a></li>
      <?php } ?>
        <li><a href="<?php echo $server; ?>index.php">Log out</a></li>
      </ul>
    </section>
    <img src="<?php echo $server; ?>assets/images/avatar.png" /> <?php
    if($_SESSION['language']=='AR') {
	    $name=explode(' ',trim($row_current_user['name_arabic']));
        echo $name[0].' '.$name[1];
    }
    else {
	    $name=explode(' ',trim($row_current_user['name_english']));
	    echo $name[0].' '.$name[1];
    }
    ?> <i class="fas fa-caret-down"></i>
</li>

					  </ul>





</section>
<section style="<?php if($_SESSION['language']=='AR') { ?> float: left <?php } else { ?>float: right <?php } ?>; margin-top:10px">
	<form method="get" action="<?php echo $server; ?>application/go/">
        <?php

        if( !isset($select_company) ){?>

            <select name="jumpMenu" id="jumpMenuCompany" onchange="MM_jumpMenuCompany('parent',this,0)" style="font-size: 12px; border-style: solid">
                <option value="index.php"> <?php echo $vCompany ; ?></option>
               <?php do { ?>
                    <option value="?company=<?php echo $row_orgs['organization']; ?>">
                    <?php if($_SESSION['language']=='AR') { echo $row_orgs['organization_arabic_name']; } ?>
                    <?php if($_SESSION['language']=='EN') { echo $row_orgs['organization_name_english']; } ?>
                    </option>
                <?php } while ($row_orgs = mysqli_fetch_assoc($orgs)); ?>
            </select>
        <?php }?>



    	<input dir="ltr" type="text" name="page" style=" direction: ltr; width: 120px; height: 26px; border-color: silver; border-style: solid;
  <?php if($_SESSION['language']=='AR') { ?> float: left; <?php } ?>
  <?php if($_SESSION['language']=='EN') { ?> float: right; <?php } ?>
    margin-left: 8px;margin-right: 8px;
    font-size: 14px;" placeholder="<?php echo 'GO!'; ?>">


	</form>
</section>

</div>
