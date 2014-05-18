<?php // Paging Nav
  global $wp_query;
  if ($wp_query->max_num_pages > 1) {
  
  $big = 999999999; // need an unlikely integer 
?>
<nav class="pagination_links">
  <?php
  echo paginate_links( array(
    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format'    => '?page=%#%',
    'current'   => max( 1, get_query_var('paged') ),
    'total'     => $wp_query->max_num_pages,
    'prev_text' => __('<i class="fa fa-angle-left"></i>Newer'),
  	'next_text' => __('Older<i class="fa fa-angle-right"></i>')
  )); ?>
</nav>
<?php } ?>