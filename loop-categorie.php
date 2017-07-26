<?php
//  	$paged = ($paged) ? get_query_var('paged') : 1;
$args = array(
  'post_type' => 'categories', // enter your custom post type
  'post_status' => 'publish',
  'posts_per_page'=> '5',  // overrides posts per page in theme settings
  'paged' => $paged,
  'order' => 'asc',
  'orderby' => 'menu_order',
);
$loop = new WP_Query( $args );
if( $loop->have_posts() ):?>
  <div class="row">
    <div class="col-md-12">
    <?php while( $loop->have_posts() ): $loop->the_post(); global $post; ?>
      <div class="grid-2-box-small off-screen">
        <?php if(get_field('featured_image')):
          $image = get_field('featured_image');
          else:
          $image = get_field('placeholder_image','options');
        endif;
       ?>
       <div><a href="<?php the_permalink(); ?>"><div class="overflow-hidden"><div class="box-height" style="background-image: url('<?php echo $image['sizes']['large']; ?>');"></div><div class="case-study-title overlay-text"><?php the_title(); ?></div></div></a></div>
      </div>
      <?php wp_reset_postdata(); ?>
    <?php endwhile; ?>
    </div>
  </div>
<?php else : ?>
  <h2>Nothing found</h2>
<?php endif; ?>
