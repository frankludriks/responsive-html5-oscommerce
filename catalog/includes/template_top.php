<?php
/*
 $Id$

 osCommerce, Open Source E-Commerce Solutions
 http://www.oscommerce.com

 Copyright (c) 2013 osCommerce

 Released under the GNU General Public License
 */

$oscTemplate -> buildBlocks();

if (!$oscTemplate -> hasBlocks('boxes_column_left')) {
  $oscTemplate -> setGridContentWidth($oscTemplate -> getGridContentWidth() + $oscTemplate -> getGridColumnWidth());
}

if (!$oscTemplate -> hasBlocks('boxes_column_right')) {
  $oscTemplate -> setGridContentWidth($oscTemplate -> getGridContentWidth() + $oscTemplate -> getGridColumnWidth());
}
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?> class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo tep_output_string_protected($oscTemplate -> getTitle()); ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<?php echo $oscTemplate -> getBlocks('header_tags'); ?>
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<link rel="shortcut icon" href="/hello">
<link rel="apple-touch-icon" href="/hello">
<link rel="apple-touch-icon" sizes="72x72" href="/hello">
<link rel="apple-touch-icon" sizes="114x114" href="/hello">
<link rel="apple-touch-icon" sizes="144x144" href="/hello">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch-icon-precomposed.png">

<!--[if lt IE 9]>
  <script src="js/html5.js"></script>
<![endif]-->
<!--[if (gt IE 8) | (IEMobile)]><!-->
  <link rel="stylesheet" href="css/responsive.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="css/ie.css" />
<![endif]-->

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="ext/colorbox/colorbox.css">
<link rel="stylesheet" href="css/stylesheet.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

<?php
  if (tep_not_null(JQUERY_DATEPICKER_I18N_CODE)) {
?>
<script src="ext/jquery/ui/i18n/jquery.ui.datepicker-<?php echo JQUERY_DATEPICKER_I18N_CODE; ?>.js"></script>
<script>
      $.datepicker.setDefaults($.datepicker.regional['<?php echo JQUERY_DATEPICKER_I18N_CODE; ?>']);</script>
<?php
}
?>
</head>
<body>
<!--[if lt IE 8]>
   <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->  
<div id="bodyWrapper" >
<header>
<?php
require (DIR_WS_INCLUDES . 'header.php');
 ?>
</header> 
<section role="main">
<div id="bodyContent" class="grid-<?php echo $oscTemplate -> getGridContentWidth(); ?> <?php echo($oscTemplate -> hasBlocks('boxes_column_left') ? 'push-' . $oscTemplate -> getGridColumnWidth() : ''); ?> ">
