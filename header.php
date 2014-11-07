<!doctype html>
<!--[if lt IE 9]>     <html class="no-js lt-ie9" <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js gt-ie8" <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#"><!--<![endif]-->
<head>
<meta charset="utf-8">

<title><?php print SITE_TITLE; ?><?php wp_title('–',true,'left');?></title>

<meta name="description" content="<?php print SITE_DESC; ?>">
<meta name="designer" content="Jason Hibbs">

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">

<link rel="stylesheet" href="<?php print TEMP_PATH; ?>/css/style.css">

<link rel="shortcut icon" href="<?php print TEMP_PATH; ?>/img/icon/favicon.png">
<link rel="apple-touch-icon-precomposed" href="<?php print TEMP_PATH; ?>/img/icon/apple-touch-icon-precomposed.png">
<meta name="apple-mobile-web-app-title" content="<?php print SITE_TITLE; ?>">

<script src="<?php print TEMP_PATH; ?>/js/modernizr-2.7.1.min.js"></script>
<!--[if IEMobile]><meta http-equiv="cleartype" content="on"><![endif]-->
<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script><script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script><![endif]-->

<?php get_template_part('meta', 'opengraph'); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class('fixed'); ?>>

<header role="banner" class="head">
  <div class="layout">
    <h1 class="site_title"><a href="<?php print SITE_URL; ?>" title="The Homepage of <?php print SITE_TITLE; ?>"><?php print SITE_TITLE; ?></a></h1>
    <?php get_template_part('nav', 'primary'); ?>
  </div>
</header>