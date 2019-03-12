<meta charset="utf-8">
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

<title> <?php echo $ApplicationTitle ; ?> </title>
<meta name="description" content="">
<meta name="author" content="">







<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $server; ?>assets/smart_theme/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $server; ?>assets/smart_theme/css/font-awesome.min.css">

<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $server; ?>assets/smart_theme/css/smartadmin-production-plugins.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $server; ?>assets/smart_theme/css/smartadmin-production.min2.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $server; ?>assets/smart_theme/css/smartadmin-skins.min.css">

<!-- SmartAdmin RTL Support -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $server; ?>assets/smart_theme/css/smartadmin-rtl.min.css">

<!-- We recommend you use "your_style.css" to override SmartAdmin
specific styles this will also ensure you retrain your customization with each SmartAdmin update.
<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->


<!-- FAVICONS -->
<link rel="shortcut icon" href="<?php echo $server; ?>images/logo-o.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $server; ?>images/logo-o.ico" type="image/x-icon">

<!-- GOOGLE FONT -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">



<!-- Specifying a Webpage Icon for Web Clip
Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
<link rel="apple-touch-icon" href="<?php echo $server; ?>assets/smart_theme/img/splash/sptouch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $server; ?>assets/smart_theme/img/splash/touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $server; ?>assets/smart_theme/img/splash/touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $server; ?>assets/smart_theme/img/splash/touch-icon-ipad-retina.png">

<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Startup image for web apps -->
<link rel="apple-touch-startup-image" href="<?php echo $server; ?>assets/smart_theme/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
<link rel="apple-touch-startup-image" href="<?php echo $server; ?>assets/smart_theme/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
<link rel="apple-touch-startup-image" href="<?php echo $server; ?>assets/smart_theme/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

<!-- Include Summernote --->

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>



<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


<style>
/*
* Glyphicons
*
* Special styles for displaying the icons and their classes in the docs.
*/

.bs-glyphicons {
padding-left: 0;
padding-bottom: 1px;
margin-bottom: 20px;
list-style: none;
overflow: hidden;
}
.bs-glyphicons li {
float: left;
width: 25%;
height: 115px;
padding: 10px;
margin: 0 -1px -1px 0;
font-size: 12px;
line-height: 1.4;
text-align: center;
border: 1px solid #ddd;
}
.bs-glyphicons .glyphicon {
margin-top: 5px;
margin-bottom: 10px;
font-size: 24px;
}
.bs-glyphicons .glyphicon-class {
display: block;
text-align: center;
}

.bs-glyphicons li:hover {
background-color: rgba(86,61,124,.1);
}

.droidFontRegular {
font-family:droidFontRegular;
}

@media (min-width: 768px) {
.bs-glyphicons li {
width: 12.5%;
}


@media print {
a[href]:after {
content: none !important;
}

}

@media print {
.divo {
background-color: firebrick;
}
}


}


<?php
if($_SESSION['language']=='AR')
{
?>
.my_fonts {
font-family: droidFontRegular;

}

.label_h1 {
right: 0px;
}
<?php

}
else
{
?>
.my_fonts { font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana," sans-serif";

}

.label_h1 {
left: 0px;
}

<?php
}
?>

</style>



<?php
if($_SESSION['language']=='AR')
{
?>

<style>

@import url(https://fonts.googleapis.com/earlyaccess/amiri.css);
@import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
@import url(https://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css);
@import url(https://fonts.googleapis.com/earlyaccess/lateef.css);
@import url(https://fonts.googleapis.com/earlyaccess/scheherazade.css);
@import url(https://fonts.googleapis.com/earlyaccess/thabit.css);

{
direction:rtl;
color:#444;
}

h3{
background:#222;
color:#f9f9f9;
padding:5px;
}

.amiri{font-family: 'Amiri', serif;}
.droid-arabic-kufi{font-family: 'Droid Arabic Kufi', serif; font-weight: 100}
.droid-arabic-kufi-bold{font-family: 'Droid Arabic Kufi', serif; font-weight: 500}
.droid-arabic-naskh{font-family: 'Droid Arabic Naskh', serif;}
.lateef{font-family: 'Lateef', serif;}
.scheherazade{font-family: 'Scheherazade', serif;}
.thabit{font-family: 'Thabit', serif;}


body {

font-family: "Droid Arabic Kufi", Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif; font-weight:700;
}


@media print {
.dont_print_me {
display:none;
margin-top: -100px;
}
}

</style>
<?php
}
?>


<style>
.dynamicTile .col-sm-2.col-xs-4{
padding:5px;
}

.dynamicTile .col-sm-4.col-xs-8{
padding:5px;
}

#tile1{
background: rgb(0,172,238);
}

#tile2{
background: rgb(243,243,243);
}

#tile3{
background: rgb(71,193,228);
}

#tile4{
background-image: url('http://handsontek.net/demoimages/tiles/facebook.png');
background-size: cover;
}

#tile5{
background: rgb(175,26,63);
}

#tile6{
background: rgb(62,157,215);
}

#tile7{
background: white;
}

#tile8{
background: rgb(209,70,37);
}

#tile9{
background: rgb(0,142,0);
}

#tile10{
background: rgb(0,93,233);
}

.tilecaption{
position: relative;
top: 50%;
transform: translateY(-50%);
-webkit-transform: translateY(-50%);
-ms-transform: translateY(-50%);
margin:0!important;
text-align: center;
color:white;
font-family: Segoe UI;
font-weight: lighter;
}


.frm_title {
border-bottom-color: orange;
border-bottom-style: solid;
border-bottom-width: 1px;
padding-bottom: 13px;
padding-bottom: 13px;
padding-right: 0px;
padding-left: 0px;

}


</style>




<script>
function popupCenter(url, title, w, h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}
</script>


<script src="https://use.fontawesome.com/b4af73c59f.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>

<link href="<?php echo $server; ?>includes/modal/assets/stylesheets/bootstrap.min.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="<?php echo $server; ?>includes/modal/release/featherlight.min.css" />
<style>
    h1, h2, h3, h4{
        font-family:inherit;
        font-weight:100!important;
    }
</style>