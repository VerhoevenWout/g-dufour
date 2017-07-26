<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container-fluid"><div class="row">
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="top-banner full-width" style="background-image: url('<?php $image = get_field('case_study_banner'); echo $image['url'];?>');"></div>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
				<p class="text-center"><?php the_field('what_we_did'); ?></p>
				<div class="container"><div class="row">

					<?php if ( is_singular( 'case-studies' ) ):?>
						<div class="case-images">
						<?php while(have_rows('flexible_content')): the_row('flexible_content');?>

							<?php if( get_row_layout() == 'before_and_after' ): ?>
								<div class="before-and-after-container bottom-border">
									<p>PRIMA</p>
									<a href="<?php $image = get_sub_field('before_field'); echo $image['sizes']['large']; ?>" data-lightbox="image"><div class="before-and-after before" style="background:transparent url('<?php $image = get_sub_field('before_field'); echo $image['sizes']['large']; ?>') center center no-repeat; background-size:cover;"></div></a>
								</div>
								<div class="before-and-after-container bottom-border">
									<p>DOPO</p>
									<a href="<?php $image = get_sub_field('after_field'); echo $image['sizes']['large']; ?>" data-lightbox="image"><div class="before-and-after after" style="background:transparent url('<?php $image = get_sub_field('after_field'); echo $image['sizes']['large']; ?>') center center no-repeat; background-size:cover;"></div></a>
								</div>
							<?php endif; ?>

							<?php if( get_row_layout() == 'before_and_after_without_title' ): ?>
								<div class="before-and-after-container">
									<a href="<?php $image = get_sub_field('before_field'); echo $image['sizes']['large']; ?>" data-lightbox="image"><div class="before-and-after before" style="background:transparent url('<?php $image = get_sub_field('before_field'); echo $image['sizes']['large']; ?>') center center no-repeat; background-size:cover;"></div></a>
								</div>
								<div class="before-and-after-container">
									<a href="<?php $image = get_sub_field('after_field'); echo $image['sizes']['large']; ?>" data-lightbox="image"><div class="before-and-after after" style="background:transparent url('<?php $image = get_sub_field('after_field'); echo $image['sizes']['large']; ?>') center center no-repeat; background-size:cover;"></div></a>
								</div>
							<?php endif; ?>

							<?php if( get_row_layout() == 'full_width_picture' ): ?>
								<a href="<?php $image = get_sub_field('full_width_picture_field'); echo $image['sizes']['large']; ?>" data-lightbox="image"><img src="<?php $image = get_sub_field('full_width_picture_field'); echo $image['sizes']['large'];?>"></a>
							<?php endif; ?>

						<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<?php if ( is_singular( 'categories' ) ):?>
						<div class="case-images">
							<?php $i = 1; while(have_rows('image_repeater')): the_row('image_repeater');?>
								<div class="grid-2-box-small">
									<div class="">
										<a href="<?php $image = get_sub_field('category_image_field'); echo $image['sizes']['large']; ?>" data-lightbox="image"><div class="box-height" style="background:transparent url('<?php $image = get_sub_field('category_image_field'); echo $image['sizes']['large']; ?>') center center no-repeat; background-size:cover;"><span class="image-number"><?php echo $i; $i++ ?></span></div></a>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

				<?php if(get_field('testimonial')): ?>
					<!-- <div class="col-md-8 col-md-offset-2">
						<div class="quote">“<?php the_field('testimonial');?>”
							<div class="cite"><?php the_field('author');?></div>
						</div>
					</div> -->
				<?php endif; ?>
				</div></div>
			</div>
		</article>

		<div class="text-center">
			<?php if ( is_singular( 'case-studies' ) ):?>
				<a class="prev-arrow arrow" href="<?php echo home_url(); ?>/progetti">TORNA AI PROGETTI</a>
			<?php endif; ?>
			<?php if ( is_singular( 'categories' ) ):?>
				<a class="prev-arrow arrow" href="<?php echo home_url(); ?>/categorie">TORNA ALLE CATEGORIE</a>
			<?php endif; ?>
		</div>
		<div class="next-project next-project-container">

		<?php
		global $post;
		$post = get_next_post();
		if(!$post){
			$first_post = new WP_Query(array(
				'posts_per_page' => 1,
				'post_type' => 'case-studies',
				'orderby' => 'menu_order',
				'order' => 'DESC'
			));
			while ( $first_post->have_posts() ) {
			$first_post->the_post();
			$post = $first_post->post;
			}
		}
		setup_postdata($post);
		if(get_field('featured_landscape')):
			$image = get_field('featured_landscape');
		else:
			$image = get_field('placeholder_image','options');
		endif;
		?>
		<div class="next-project">
			<a href="<?php the_permalink(); ?>">
				<?php if ( is_singular( 'case-studies' ) ):?>
					<div class="top-banner" style="background-image: url('<?php echo $image['url']; ?>');"><div class="next-project-title overlay-text top"><div class="small">Prossimo progetto</div><?php the_title(); ?></div></div>
				<?php endif; ?>
				<?php if ( is_singular( 'categories' ) ):?>
					<div class="top-banner" style="background-image: url('<?php echo $image['url']; ?>');"><div class="next-project-title overlay-text top"><div class="small">Prossima categoria</div><?php the_title(); ?></div></div>
				<?php endif; ?>
			</a>
		</div>
	</div>
	</div></div>
	<?php endwhile; endif; ?>
	<div class="edit-this">
		<?php edit_post_link(); ?>
	</div>

<?php get_footer(); ?>
