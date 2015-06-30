<?php 
include('globalVars.php');
require_once("vendor/Mobile_Detect.php"); 
$detect = new Mobile_Detect; // http://mobiledetect.net/
$isTablet = $detect->isTablet();
$isMobile = $detect->isMobile();// && !$isTablet;

$bodyClass = "";

if($isMobile) {
    $bodyClass = $bodyClass . " u-isMobile";
}
if($isTablet) {
    $bodyClass = $bodyClass . " u-isTablet";
}
if(!$isMobile && !$isTablet) {
    $bodyClass = $bodyClass . " u-isDesktop";
}

?>
<!doctype html>
<!-- Header -->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <?php //<meta name="viewport" content="width=device-width, initial-scale=1">  ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title><?= isset($PageTitle) ? $PageTitle : "Splash'N Boots"?></title>
    
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'> -->

    <!-- Global Styles -->
    <link rel="stylesheet" href="<?php echo $templateDir;?>/css/app.css"/>
    <?php // http://www.idangero.us/swiper/get-started/#.VX-J8lVVhHw ?>
    <link rel="stylesheet" href="<?php echo $templateDir;?>/css/vendor/Swiper-dist/css/swiper.min.css"/>

<?php /*
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    
    <link rel="stylesheet" href="<?php echo $templateDir;?>/css/vendor/pure/side-menu.css"> <!-- Slide menu from: http://purecss.io/layouts/side-menu/ -->
    */ ?>

    <!-- Additional tags here -->
    <?php if (function_exists('customPageHeader')) {
      customPageHeader();
    } ?>

  </head>
  <body class="<?php echo $bodyClass;?>">
    <?php // FACEBOOK SDK - for: https://developers.facebook.com/docs/plugins/page-plugin ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=285490071519250";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <?php include('NavAreaMobile.php'); ?>
    <div id="l-wrapper" class="l-wrapper">

    <?php
    // ---------- ADD VIDEO / PICTURE MASTHEAD ----------
    include('Masthead.php');

    // ------ Social Links ------
    //include('SocialLinks.php');
    
    // -------- Add the nav -----------
    include("NavArea.php");
    ?>