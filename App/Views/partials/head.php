<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $title ?></title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="/App/Views/css/vendor/all.css" rel="stylesheet">

  <!-- Vendor CSS Standalone Libraries
        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->
  <!-- <link href="/App/Views/css/vendor/bootstrap.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/font-awesome.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/picto.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/datepicker3.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/railscasts.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/owl.carousel.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/slick.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/select2.css" rel="stylesheet"> -->
  <!-- <link href="/App/Views/css/vendor/jquery.countdown.css" rel="stylesheet"> -->

  <!-- APP CSS BUNDLE [css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "html" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "html" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "html" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/html/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
	<!-- <link rel="stylesheet" type="text/css" href="/App/Views/css/bootstrap.css"> -->
	<link href="/App/Views/css/app/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/noty.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/metroui.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/fonts.min.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/imgareaselect-default.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/summernote.css">
  
  <!-- App CSS CORE
This variant is to be used when loading the separate styling modules -->
  <!-- <link href="/App/Views/css/app/main.css" rel="stylesheet"> -->

  <!-- App CSS Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->

  <!-- <link href="/App/Views/css/app/essentials.css" rel="stylesheet" />
  <link href="/App/Views/css/app/material.css" rel="stylesheet" />
  <link href="/App/Views/css/app/layout.css" rel="stylesheet" />
  <link href="/App/Views/css/app/sidebar.css" rel="stylesheet" />
  <link href="/App/Views/css/app/sidebar-skins.css" rel="stylesheet" />
  <link href="/App/Views/css/app/navbar.css" rel="stylesheet" />
  <link href="/App/Views/css/app/messages.css" rel="stylesheet" />
  <link href="/App/Views/css/app/media.css" rel="stylesheet" />
  <link href="/App/Views/css/app/charts.css" rel="stylesheet" />
  <link href="/App/Views/css/app/maps.css" rel="stylesheet" />
  <link href="/App/Views/css/app/colors-alerts.css" rel="stylesheet" />
  <link href="/App/Views/css/app/colors-background.css" rel="stylesheet" />
  <link href="/App/Views/css/app/colors-buttons.css" rel="stylesheet" />
  <link href="/App/Views/css/app/colors-text.css" rel="stylesheet" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>	
<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} 
?>