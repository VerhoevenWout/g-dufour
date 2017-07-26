<!-- CONTACT -->
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section class="map-contain">
		<div id="map-canvas" class="top-banner"></div>
	</section>
	<section class="contact-heading">
	<h1><?php the_title(); ?></h1>
	<div class="container">
			<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<p class="intro"><?php the_field('contact_paragraph','options'); ?></p>
				<p class="intro"><a href="https://www.google.co.uk/maps/dir/''/loop+interiors/@51.5122037,-0.2081694,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x487604d5aa93707f:0x91527bdcdde4b170!2m2!1d-0.1381299!2d51.5122246"><?php the_field('footer_address','options'); ?></a></p>
				<div class="inline"><p class="intro"><a href="tel:<?php the_field('footer_phone','options'); ?>"><span class="pink">T</span> <?php the_field('footer_phone','options'); ?></a></p></div>
				<div class="inline"><p class="intro"><a href="mailto:<?php the_field('footer_email','options'); ?>"><span class="pink">E</span> <?php the_field('footer_email','options'); ?></a></p></div>

					</div>
					</div>
					</div>
					</section>
	<section>
		<div class="container">
			<div class="row">
				<h2>RICHIEDI INFORMAZIONI</h2>
				<div class="col-sm-10 col-sm-offset-1">
					<div id="form-messages"></div>

					<form id="contact_form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="action" value="contact_form">
						<div class="row">
							<div class="col-md-6">
								<div class="input-layout">
									<input id="title" name="title" type="text" value="" required/>
									<label class="required" for="title">NOME*</label>
								</div>
								<div class="input-layout">
									<input id="email" name="email" type="text" value="" required/>
									<label class="required" for="email">Email*</label>
								</div>
							</div>
							<div class="col-md-6">
									<div class="input-layout">
									<input id="name" name="name" type="text" value="" required/>
									<label class="required" for="name">COGNOME*</label>
								</div>
								<div class="input-layout">
									<input id="subject" name="subject" type="text" value="" required/>
									<label class="required" for="subject">OGGETTO*</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="input-layout">
									<textarea id="message" name="message" rows="7" cols="30" required></textarea>
									<label class="required" for="message">IL TUO MESSAGGIO*</label>
								</div>
							</div>
							<div class="col-md-12 text-center">
								<div class="arrow">
									<input type="submit" class="btn" value="INVIA" />
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>

	<!-- <section class="twitter-carousel">
		<div class="container">
			<div class="row">
			<div class="col-md-8 col-md-offset-2">
		<svg xmlns="http://www.w3.org/2000/svg" class="linkedin-svg social-svg" viewBox="0 0 216 146"><path d="M172.2 33.2c-5.1 2.2-10.1 3.5-15.2 4.1 5.7-3.4 9.6-8.3 11.6-14.5 -5.2 3.1-10.8 5.2-16.7 6.4 -5.2-5.5-11.6-8.3-19.2-8.3 -7.3 0-13.5 2.6-18.6 7.7 -5.1 5.1-7.7 11.3-7.7 18.6 0 2 0.2 4 0.7 6 -10.8-0.5-20.8-3.2-30.3-8.1 -9.4-4.9-17.4-11.3-24-19.4 -2.4 4.1-3.6 8.5-3.6 13.3 0 4.5 1.1 8.7 3.2 12.5 2.1 3.9 5 7 8.6 9.4 -4.2-0.2-8.2-1.3-11.9-3.3v0.3c0 6.4 2 11.9 6 16.7 4 4.8 9 7.8 15.1 9.1 -2.3 0.6-4.6 0.9-6.9 0.9 -1.5 0-3.2-0.1-5-0.4 1.7 5.3 4.8 9.6 9.3 13 4.5 3.4 9.6 5.1 15.3 5.3 -9.6 7.5-20.4 11.2-32.7 11.2 -2.3 0-4.5-0.1-6.4-0.3 12.2 7.9 25.7 11.8 40.4 11.8 9.3 0 18.1-1.5 26.3-4.4 8.2-3 15.2-6.9 21-11.9 5.8-5 10.8-10.7 15-17.1 4.2-6.5 7.3-13.2 9.4-20.2 2.1-7 3.1-14.1 3.1-21.1 0-1.5 0-2.7-0.1-3.4C164.2 43.1 168.6 38.6 172.2 33.2z"/></svg><?php echo do_shortcode('[twitget]'); ?>
		</div>
		</div>
		</div>
	</section> -->





<?php endwhile; endif; ?>
<div class="edit-this">
	<?php edit_post_link(); ?>
</div>

<?php get_footer(); ?>
