<?php get_header(); ?>


 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<h1>Our Work</h1>
			
			<section id="infinite-scroll">
<div class="container-fluid">
	<?php 

  	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

 	 include(locate_template('loop.php' )); ?>

	<div class="col-md-12">
	
		<?php  if ($loop->max_num_pages > 1): ?>

                    <?php endif; ?>
                    
	</div>
	</div>

</section>
			

	<div class="row">
	<div class="col-md-12 text-center">
				                  <div class="down-arrow arrow view-more" onclick="view_more_projects();">View more projects</div>
       
	</div>
                   </div>

			



<?php get_footer(); ?>
