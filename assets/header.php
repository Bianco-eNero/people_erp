<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $application_name; ?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<?php if(!isset($_GET['report'])) { ?>
<link rel="stylesheet" href="<?php echo $server; ?>assets/css/style.css" type="text/css" />
<?php } ?>
<?php
if($_SESSION['language']=='AR')
{
?>
<?php
if($chart_page=='1')
{
?>
<link rel="stylesheet" href="<?php echo $server; ?>assets/css/arabic_for_chart.css" type="text/css" />
<?php
}
else {
  {
    ?>
    <link rel="stylesheet" href="<?php echo $server; ?>assets/css/arabic.css" type="text/css" />
    <?php
  }
}
?>

<?php } ?>
<script type="text/javascript" src="<?php echo $server; ?>assets/js/code.js"></script>

<?php
if($use_bootstrap=='1')
{
 ?>
<!-- Latest compiled and minified CSS https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css -->
<link rel="stylesheet" href="<?php echo $server; ?>assets/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js -->
<script src="<?php echo $server; ?>assets/js/bootstrap.min.js"></script>

<?php
}
?>

<script type="text/javascript">
<!--
function MM_jumpMenuCompany(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
        </script>

<script type="text/javascript">
<!--
function MM_jumpMenu1(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
        </script>


<script type="text/javascript">
<!--
function MM_jumpMenu2(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
        </script>

<?php
//// end redirect to register if not logged in ////

set_time_limit(0);

////

 ?>

 <script type = "text/javascript">
    jQuery('#select-link').click(function() {
      if (jQuery('#dynamic_select').val() != '')
      {
          window.open(jQuery('#dynamic_select').val(),'_blank');
      }
    });
</script>





<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
</script>


<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">

<style>
  * {
font-size: 100%;
font-family: 'Changa', sans-serif;
max-width:100%;


  }

  .arabic {
font-family: 'Changa', sans-serif;
  }
</style>



<style>
.wrap {
    display: flex;
    <?php if($_SESSION['language']=='EN') {  ?>
        background: linear-gradient(135deg,#865b7a 0%,#4b3545 100%);
    <?php } ?>

    <?php if($_SESSION['language']=='AR') {  ?>
        background: linear-gradient(135deg,#4b3545 0%,#865b7a 100%);
    <?php } ?>
    padding: 1rem 1rem 1rem 1rem;
    border-radius: 0.5rem;
    box-shadow: 7px 7px 30px -5px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.wrap:hover {
<?php if($_SESSION['language']=='EN') {  ?>
    background: linear-gradient(135deg,#865b7a 0%,#4b3545 100%);
<?php } ?>

<?php if($_SESSION['language']=='AR') {  ?>
    background: linear-gradient(135deg,#4b3545 0%,#865b7a 100%);
<?php } ?>



    color: white;
}

.ico-wrap {
    margin: auto;
}

.mbr-iconfont {
    font-size: 4.5rem !important;
    color: #313131;
    margin: 1rem;
    padding-right: 1rem;
}
.vcenter {
    margin: auto;
}

.mbr-section-title3 {
    text-align: left;
}
h2 {
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
.display-5 {
    font-family: 'Source Sans Pro',sans-serif;
    font-size: 1.4rem;
}
.mbr-bold {
    font-weight: 700;
}

 p {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    line-height: 25px;
}
.display-6 {
    font-family: 'Source Sans Pro',sans-serif;
    font-size: 1rem;
}

    </style>


<style>

.tabs {

  margin: 0 auto;
  padding: 0 10px;
}
#tab-button {
  display: table;
  table-layout: fixed;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}
#tab-button li {
  display: table-cell;
  width: 20%;
}
#tab-button li a {
  display: block;
  padding: .5em;
  background: #eee;
  border: 1px solid #ddd;
  text-align: center;
  color: #000;
  text-decoration: none;
}
#tab-button li:not(:first-child) a {
  border-left: none;
}
#tab-button li a:hover,
#tab-button .is-active a {
  border-bottom-color: transparent;
  background: #fff;
}
.tab-contents {
  padding: .5em 2em 1em;
  border: 1px solid #ddd;
}



.tab-button-outer {
  display: none;
}
.tab-contents {
  margin-top: 20px;
}
@media screen and (min-width: 768px) {
  .tab-button-outer {
    position: relative;
    z-index: 2;
    display: block;
  }
  .tab-select-outer {
    display: none;
  }
  .tab-contents {
    position: relative;
    top: -1px;
    margin-top: 0;
  }
}
</style>

<script>
	$(function() {
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});
</script>


<style>
	.text_hany
	{


    padding: 6px;
    margin: 5px;
    border-color: silver;
    border-width: 1px;
    border-style: solid;
    border-width: 1px;
	}

  @media print {
  .dont_print_me {
  		display:none;
  	margin-top: -100px;
  }
  }

	.active a {

  background-color: whitesmoke !important;

}

</style>



<script>
function goBack() {
    window.history.back();
}
</script>

<?php
function timeDiff_new($t1, $t2)
{
   if($t1 > $t2)
   {
      $time1 = $t2;
      $time2 = $t1;
   }
   else
   {
      $time1 = $t1;
      $time2 = $t2;
   }
   $diff = array(
      'years' => 0,
      'months' => 0

   );
   foreach(array('years','months','days')
         as $unit)
   {
      while(TRUE)
      {
         $next = strtotime("+1 $unit", $time1);
         if($next < $time2)
         {
            $time1 = $next;
            $diff[$unit]++;
         }
         else
         {
            break;
         }
      }
   }
   return($diff);
}
$today_date=date('Y-m-d');




function timeDiff($t1, $t2)
{
   if($t1 > $t2)
   {
      $time1 = $t2;
      $time2 = $t1;
   }
   else
   {
      $time1 = $t1;
      $time2 = $t2;
   }
   $diff = array(
      'years' => 0,
      'months' => 0

   );
   foreach(array('years','months','days')
         as $unit)
   {
      while(TRUE)
      {
         $next = strtotime("+1 $unit", $time1);
         if($next < $time2)
         {
            $time1 = $next;
            $diff[$unit]++;
         }
         else
         {
            break;
         }
      }
   }
   return($diff);
}
$today_date=date('Y-m-d');



function Get_Date_Difference__y($start_date, $end_date)

    {
        $diff = abs(strtotime($end_date) - strtotime($start_date));
        $years = floor($diff / (365*60*60*24));
        echo $years;
    }

	function Get_Date_Difference__y_perc40($start_date, $end_date)

    {
        $diff = abs(strtotime($end_date) - strtotime($start_date));
        $years = floor($diff / (365*60*60*24));
        echo $years/40*100;
    }

?>

<style>
	.tile-progress {
background-color: #303641;
color: #fff;
}
.tile-progress {
background: #00a65b;
color: #fff;
margin-bottom: 20px;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
-webkit-background-clip: padding-box;
-moz-background-clip: padding;
background-clip: padding-box;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px;
}
.tile-progress .tile-header {
padding: 15px 20px;
padding-bottom: 40px;
}
.tile-progress .tile-progressbar {
height: 2px;
background: rgba(0,0,0,0.18);
margin: 0;
}
.tile-progress .tile-progressbar span {
background: #fff;
}
.tile-progress .tile-progressbar span {
display: block;
background: #fff;
width: 0;
height: 100%;
-webkit-transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
-moz-transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
-o-transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
transition: all 1.5s cubic-bezier(0.230,1.000,0.320,1.000);
}
.tile-progress .tile-footer {
padding: 20px;
text-align: right;
background: rgba(0,0,0,0.1);
-webkit-border-radius: 0 0 3px 3px;
-webkit-background-clip: padding-box;
-moz-border-radius: 0 0 3px 3px;
-moz-background-clip: padding;
border-radius: 0 0 3px 3px;
background-clip: padding-box;
-webkit-border-radius: 0 0 3px 3px;
-moz-border-radius: 0 0 3px 3px;
border-radius: 0 0 3px 3px;
}
.tile-progress.tile-red {
background-color: #f56954;
color: #fff;
}
.tile-progress {
background-color: #303641;
color: #fff;
}
.tile-progress.tile-blue {
background-color: #0073b7;
color: #fff;
}
.tile-progress.tile-aqua {
background-color: #00c0ef;
color: #fff;
}
.tile-progress.tile-green {
background-color: #00a65a;
color: #fff;
}
.tile-progress.tile-cyan {
background-color: #00b29e;
color: #fff;
}
.tile-progress.tile-purple {
background-color: #ba79cb;
color: #fff;
}
.tile-progress.tile-pink {
background-color: #ec3b83;
color: #fff;
}

</style>

<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
</script>

<script>
var input = document.getElementById('search');
input.focus();
input.select();
</script>


<!-- include libraries(jQuery, bootstrap) -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>



<script>
    $(document).ready(function() {
      $('#summernote').summernote({
      placeholder: 'Hi',
      tabsize: 2,
      height: 300
    });
    });
  </script>



<?php if($this_is_pop<>'1')
{

?>



<div class="dont_print_me">
<?php if(!isset($_GET['report'])) { ?>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5be419470e6b3311cb786956/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<?php } ?>
</div>

<?php
}
?>




<!--End of Tawk.to Script-->
