<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>


		<?php while (have_posts()) : the_post(); ?>
<?php
				setup_postdata($post);

if(get_field('featured_landscape')):
	$image = get_field('featured_landscape');
else:
$image = get_field('placeholder_image','options');
endif;
	?>
		
			<div class="next-project">
			<a href="<?php the_permalink(); ?>">
			<div class="top-banner" style="background-image: url('<?php echo $image['sizes']['large']; ?>');"><div class="next-project-title overlay-text top"><?php the_title(); ?></div></div>
			</a>
			</div>

		<?php endwhile; ?>


	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>


<?php get_footer(); ?>
