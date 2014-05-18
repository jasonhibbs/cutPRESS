<?php // Starting the loop
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="hentry">
  <h1 class="entry-title url"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanlink to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
  <small>Posted <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d m Y'); ?></time> in <?php the_category(', '); ?>, by <span class="author"><?php the_author_posts_link() ?></span></small>
  
  <?php if ( has_post_thumbnail() ) { ?>
  <figure>
    <?php the_post_thumbnail(); ?>
  </figure>
  <?php } ?>
  
  <div class="entry-content">
    <?php the_content(); ?>  
  </div>
</article>

<?php // We’ve finished with the loop
  endwhile;
  endif;
  wp_reset_postdata(); ?>