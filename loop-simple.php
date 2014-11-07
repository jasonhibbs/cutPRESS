<?php if ( have_posts() ) : ?>
    
  <div class="have_posts">
    
    <?php while ( have_posts() ) : the_post(); ?>
  
      <?php get_template_part('content', 'simple'); ?>
  
    <?php endwhile; ?>
  
  </div>
  
  <?php else: ?>
  
  <div class="no_posts">

    <p><?php _ex('We couldn’t find what you were looking for!', 'Page not found copy', 'Theme'); ?></p>
    
  </div>
  
<?php endif; wp_reset_postdata(); ?>