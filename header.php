<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">

<title><?php print SITE_TITLE; ?><?php wp_title('–',true,'left');?></title>

<meta name="description" content="">
<meta name="author" content="Katana">

<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">

<link rel="stylesheet" href="<?php print TEMPPATH; ?>/css/style.css?v=0">

<!--[if (lt IE 9) & (!IEMobile)]><script src="<?php print TEMPPATH; ?>/js/selectivizr-min.js"></script><![endif]-->
<script src="<?php print TEMPPATH; ?>/js/modernizr-2.6.2-min.js"></script>

<link rel="shortcut icon" href="<?php print TEMPPATH; ?>/img/icon/favicon.png">
<link rel="apple-touch-icon-precomposed" href="<?php print TEMPPATH; ?>/img/icon/apple-touch-icon-precomposed.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-title" content="<?php print SITE_TITLE; ?>">

<meta name="msapplication-TileImage" content="<?php print TEMPPATH; ?>/img/icon/apple-touch-icon-precomposed.png">
<meta name="msapplication-TileColor" content="#48D">

<!--[if IEMobile]><meta http-equiv="cleartype" content="on"><![endif]-->
<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script><script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script><![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class('flexloading'); ?>>

<header role="banner" class="head">

    <h1 class="site_title"><a href="<?php bloginfo('url'); ?>" title="The Homepage of <?php print SITE_TITLE; ?>"><?php print SITE_TITLE; ?></a></h1>

    <nav>
      <?php wp_nav_menu(array('theme_location' => 'nav')); ?>
      <h1 class="menu_bar">Menu</h1>
    </nav>
    
    
  </div>
</header>
