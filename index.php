<?php // Template Name: Index
get_header(); ?>

<div role="main" class="content index">
  <div class="layout">
    
    <?php get_template_part('loop', 'article'); ?>
     
  </div>
</div>

<?php get_footer(); ?>