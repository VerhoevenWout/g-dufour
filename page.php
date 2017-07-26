<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
						<div class="top-banner" style="background-image: url('<?php $image = get_field('top_banner'); if(!$image): $image = get_field('top_banner','options'); endif; echo $image['url']; ?>');"></div>
<div class="container"><div class="row"><div class="col-md-8 col-md-offset-2">

		<article class="post" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>


			<div class="entry">

				<?php the_content(); ?>


			</div>


		</article>
		</div></div></div>

		<?php endwhile; endif; ?>


<?php get_footer(); ?>
