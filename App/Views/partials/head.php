<!DOCTYPE html>
<html lang="en">
<head>

	<title><?= $title ?></title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="icon" href="/app/views/img/fly1.png" type="image/png" sizes="16x16">

	<!-- Main Font -->
    <script src="/App/Views/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="/App/Views/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/bootstrap-grid.css">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="/App/Views/css/main.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/noty.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/metroui.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/fonts.min.css">
	<link rel="stylesheet" type="text/css" href="/App/Views/css/imgareaselect-default.css">


</head>
<?php if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} ?>