<?php // Template Name: Single
get_header(); ?>

<div role="main" class="content">
  <div class="layout">
  
    <div class="the_post">
      <?php get_template_part('loop', 'article'); ?>
    </div>
  
  </div>
</div>

<?php get_footer(); ?>