<?php get_header(); ?>

			<div class="top-banner" style="background-image: url('<?php $image = get_field('top_banner','options'); echo $image['sizes']['large'];?>');"></div>


		<article class="post" id="post-<?php the_ID(); ?>">

			<h2>404 Page not found</h2>


			<div class="entry">
<div class="container"><div class="row"><div class="col-md-8 col-md-offset-2 text-center" style="padding-bottom:40px;">
				<p>We can't find the page you were looking for. Please use the search in the menu or alternatively return to the <a href="<?php echo home_url(); ?>">homepage</a>.</p>
	</div></div></div>

			</div>


		</article>
		


<?php get_footer(); ?>