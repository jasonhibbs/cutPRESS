
<?php
  if (have_posts()):while(have_posts()):the_post(); endwhile; endif;
  
  if (is_single()) { ?>
<meta property="og:type" content="article" />
<meta property="article:author" content="<?php print SITE_URL; ?>" />
<meta property="og:title" content="<?php single_post_title(''); ?>" />
<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
  <?php
    if (function_exists('wp_get_attachment_thumb_url')) { ?>
  <link rel="image_src" href="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); ?>" />
  <meta property="og:image" content="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); ?>" />
<!--
  <meta property="og:image:width" content="500" />
  <meta property="og:image:height" content="375" />
-->
  <?php } else { ?>
  <link rel="image_src" href="<?php print TEMP_PATH; ?>/img/icon/apple-touch-icon-precomposed.png" />
  <meta property="og:image" content="<?php print TEMP_PATH; ?>/img/icon/apple-touch-icon-precomposed.png" />
<!--
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="400" />
-->
  <?php }
  } else { ?>
<meta property="og:title" content="<?php print SITE_TITLE; ?>" />
<meta property="og:image" content="<?php print TEMP_PATH; ?>/img/icon/apple-touch-icon-precomposed.png" />
<!--
<meta property="og:image:width" content="152" />
<meta property="og:image:height" content="152" />
-->
<meta property="og:description" content="<?php print SITE_TITLE; ?>" />
<meta property="og:type" content="website" /><?php } ?>

<meta property="og:site_name" content="<?php print SITE_TITLE; ?>" />
<meta property="og:url" content="<?php the_permalink() ?>"/>
<meta property="og:locale" content="en_GB">


<?php
  if ((!is_home()) && (has_post_thumbnail())) { ?>
<meta property="twitter:card" content="photo">
<meta property="twitter:title" content="<?php single_post_title(''); ?>">
<meta property="twitter:image:src" content="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); ?>">
<meta property="twitter:domain" content="<?php the_permalink() ?>">
<?php } else { ?>
<meta property="twitter:card" content="summary">
<meta property="twitter:title" content="<?php print SITE_TITLE; ?>">
<meta property="twitter:description" content="<?php print SITE_TITLE; ?>">
<meta property="twitter:image:src" content="<?php print TEMP_PATH; ?>/img/icon/apple-touch-icon-precomposed.png">
<meta property="twitter:domain" content="<?php the_permalink() ?>">
<?php } ?>
<meta property="twitter:site" content="<?php print SITE_TITLE; ?>">
<meta property="twitter:creator" content="<?php print SITE_TITLE; ?>">
<?php wp_reset_postdata(); ?>