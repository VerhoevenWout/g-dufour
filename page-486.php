<!-- CATEGORIE -->

<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- <div class="top-banner" style="background-image: url('<?php $image = get_field('top_banner'); if(!$image): $image = get_field('top_banner','options'); endif; echo $image['url']; ?>');"></div> -->
    <div class="container"><div class="row"><div class="col-md-8 col-md-offset-2">
  		<article class="post" id="post-<?php the_ID(); ?>">
  			<h1><?php the_title(); ?></h1>
  			<!-- <div class="entry">
  				<?php the_content(); ?>
  			</div> -->
  		</article>

		</div></div></div>
    <?php include(locate_template('loop-categorie.php' )); ?>
	<?php endwhile; endif; ?>
	<div class="edit-this">
		<?php edit_post_link(); ?>
	</div>
<?php get_footer(); ?>
