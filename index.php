<?php // Template Name: Index
get_header(); ?>

<div role="main" class="content">
  <div class="layout">
  
    <div class="the_posts">
      <?php get_template_part('content', 'article'); ?>
    </div>
  
  </div>
</div>

<?php get_footer(); ?>