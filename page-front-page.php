<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section>
	<?php $banner_images = get_field('banner_images'); ?>
	<div class="full-height-banner fade-in" style="background-image: url('<?php $banner_image = $banner_images[0]; echo $banner_image['image']['url']; ?>');">
		<div class="full-height-banner-overlay"></div>
		<div class="full-height-banner-text">
			<h1><?php the_field('banner_text'); ?></h1>
		</div>
		<a href="#after-banner"><div class="scroll-down"></div></a>
	</div>
</section>
<section id="after-banner">
<div class="container-fluid">

	<h1>PROGETTI</h1>

	 <?php include(locate_template('loop-homepage.php' )); ?>


	</div>
	<div class="container"><div class="row">
		<div class="text-center col-md-12">
		<a href="<?php echo home_url() . ''; ?>/progetti" class="arrow next-arrow">VEDI TUTTI I PROGETTI</a>
		</div></div></div>
</section>

<?php if(have_rows('company_logos')): ?>
<section class="sec-big-pad company-logo-strip">
<div class="row"><div class="container">
<?php $i = 0; while(have_rows('company_logos')): the_row(); ?>
<?php if($i < 5): ?>
<?php $image = get_sub_field('logo'); ?>
<div class="companyLogo" id ="logo_<?php echo $i++; ?>">
	<div class="companyLogo-image" style="background-image: url('<?php echo $image['url']; ?>');">


	</div>

</div>
<?php endif; ?>
<?php endwhile; ?>
	</div>
	</div>

</section>
<?php endif; ?>
	<section class="sec-big-pad">
	<div class="container"><div class="row"><div class="col-md-8 col-md-offset-2">
		<div class="quote off-screen">“Design is a funny word. Some people think design means how it looks. But of course, if you dig deeper, it’s really how it works.”
	<div class="cite">Steve Jobs</div>
	</div>
		</div></div></div>
	</section>
<?php endwhile; endif; ?>
<div class="edit-this">
	<?php edit_post_link(); ?>
</div>

<?php get_footer(); ?>

<script>

	var client_logos = [
	<?php while(have_rows('company_logos')): the_row('company_logos'); ?>
		"<?php $image = get_sub_field('logo'); echo $image['sizes']['medium']; ?>",
		<?php endwhile; ?>
	];

	var target_div = 0;
	var target_img = 5;
	var num_imgs = client_logos.length;
	function change_logo() {
		$('#logo_' + target_div % 5 + ' > div').fadeOut('medium', function() {
    	$(this).css('background-image', 'url("' + client_logos[target_img % num_imgs] + '")').fadeIn();
		});
		target_img++;
		target_div++;
    setTimeout(change_logo, 3000);
	}
	// change_logo();
	// setInterval(function(){change_logo();}, 3000);

</script>
