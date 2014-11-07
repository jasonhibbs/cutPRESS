<?php // Template Name: Blog
get_header(); ?>

<div role="main" class="content">
  <div class="layout">
  
    <?php get_template_part('loop', 'article'); ?>
  
  </div>
</div>

<?php get_footer(); ?>