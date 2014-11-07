<article <?php post_class(); ?>>
  <header>
    <h1 class="entry-title url"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanlink to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
  </header>
  
  <?php if ( has_post_thumbnail() ) { ?>
  <figure><?php the_post_thumbnail(); ?></figure>
  <?php } ?>
  
  <div class="the_content entry-content">
    <?php the_content(); ?>  
  </div>
  
  <small>
    Posted <time class="published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d m Y'); ?></time> in <?php the_category(', '); ?>, by <span class="author"><?php the_author_posts_link() ?></span>
  </small>
</article>