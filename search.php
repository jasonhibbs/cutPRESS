<?php // Template Name: Search
get_header(); ?>

<div role="main" class="content search">
  <div class="layout">
  
    <h1 class="page_title">Search Results for “<?php echo $s; ?>”</h1>
        
    <?php get_template_part('loop', 'article'); ?>
      
  </div>
</div>

<?php get_footer(); ?>