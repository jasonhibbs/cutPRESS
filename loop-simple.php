<?php // Starting the loop
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <h1><?php the_title(); ?></h1>
  <div class="the_content"><?php the_content(); ?></div>

<?php // We’ve finished with the loop
  endwhile;
  endif;
  wp_reset_postdata(); ?>