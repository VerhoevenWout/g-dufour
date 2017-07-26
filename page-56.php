<!-- SERVIZI -->
<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="top-banner fade-in" style="background-image: url('<?php $image = get_field('top_banner'); echo $image['url'];?>');"></div>
			<h1 style="margin-top: 50px"><?php the_title(); ?></h1>
			<article class="post" id="post-<?php the_ID(); ?>">


<div class="container">
<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">

				<?php the_content(); ?>

</div>
			</div>
</div>

		</article>
			<section class="sec-big-pad text-center">
		<?php while(have_rows('what-we-do')): the_row(); ?>
				<a href="#<?php echo str_replace('&', '' , str_replace(' ', '', get_sub_field('title'))); ?>" class="padded-link"><?php the_sub_field('title'); ?></a>
<?php endwhile; ?>
</section>


		<div class="alt-bg">

<?php  $i = 0; while(have_rows('what-we-do')): the_row(); ?>
	<?php if($i++ == 3){ ?>
				<div class="top-banner fade-in" style="background-image: url('<?php $image = get_field('middle_banner'); echo $image['sizes']['large'];?>');"></div>

<?php } ?>
	<section class="sec-big-pad icon-anim-sec" id="<?php echo str_replace('&', '' , str_replace(' ', '', get_sub_field('title'))); ?>" >
	<div class="container"><div class="row">


<div class="col-md-12">
	<?php if(get_sub_field('title') == "Design"): ?>
	<div class="anim-icon"><svg xmlns="http://www.w3.org/2000/svg"  class="pen" viewBox="0 0 90 90"><path d="M4 84.8l6.9-22.8L67.8 6.4c0 0 19.8-6.8 17.9 15.3L28.4 77.3 4 84.8z" class="stroke pen-main"/><path d="M10.9 62c0 0 12.9 1.3 17.5 15.3" class="stroke pen-line"/><path d="M61.9 12c0 0 12.9 1.3 17.5 15.3" class="stroke pen-line"/></svg>
	</div>
	<?php elseif(get_sub_field('title') == "Furniture"): ?>
	<div class="anim-icon"><svg xmlns="http://www.w3.org/2000/svg" class="chair" viewBox="0 0 90 90"><line class="leg-1 stroke" x1="19.6" y1="42.4" x2="8.1" y2="88.6" class="a"/><path class="chair-body stroke" d="M1.1 1.4l5.6 30.8c0 0 0.5 9.8 11.3 10.3s36 0 36 0" class="a"/><line class="leg-2 stroke" x1="41.8" y1="42.4" x2="52.8" y2="88.6" class="a"/></svg></div>
	<?php elseif(get_sub_field('title') == "Aftercare"): ?>
	<div class="anim-icon"><svg xmlns="http://www.w3.org/2000/svg" class="magic-wand" viewBox="0 0 90 90"><polyline points=" 4.333,84.857 51.568,38.542 58.086,53.25 66.741,40.885 84.979,40.157 74.614,27.944 78.762,11.583 62.323,15.612 49.857,5.265
	49.267,23.334 36.743,31.905 51.568,38.542 " class="stroke "/></svg></div>
	<?php elseif(get_sub_field('title') == "Plan"): ?>
	<div class="anim-icon"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve" class="set-square">
	<g>
	<polygon class="stroke outer-path" points="85,85 5,85 5,5 	"/>
	</g>
	<g>
	<polygon class="stroke inner-path" points="51.814,73.147 16.852,73.147 16.852,38.186 	"/>
	</g>
	<line class="stroke lines"  x1="16.889" y1="16.889" x2="12.611" y2="21.166"/>
	<line class="stroke lines"  x1="25.777" y1="25.777" x2="21.5" y2="30.055"/>
	<line class="stroke lines"  x1="34.666" y1="34.666" x2="30.389" y2="38.943"/>
	<line class="stroke lines"  x1="43.555" y1="43.555" x2="39.278" y2="47.832"/>
	<line class="stroke lines"  x1="52.444" y1="52.444" x2="48.167" y2="56.722"/>
	<line class="stroke lines"  x1="61.333" y1="61.333" x2="57.056" y2="65.61"/>
	<line class="stroke lines"  x1="70.223" y1="70.223" x2="65.944" y2="74.499"/>
	</svg>
	</div>
	<?php elseif(get_sub_field('title') == "Investigate"): ?>
	<div class="anim-icon"><svg class="magnify" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
	<g>
	<g>
	<path class="stroke circle" d="M65.354,34.425c0,8.319-3.541,15.832-9.232,21.183c-5.427,5.104-12.811,8.242-20.945,8.242
	C18.51,63.851,5,50.676,5,34.425C5,18.174,18.51,5,35.177,5C51.844,5,65.354,18.174,65.354,34.425z"/>
	</g>
	<line class="stroke handle" x1="85" y1="85" x2="56.122" y2="55.608"/>
	</g>
	</svg></div>
	<?php elseif(get_sub_field('title') == "Cost & Programme"): ?>
	<div class="anim-icon"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
	<g>
	<circle class="stroke" cx="11.667" cy="46.332" r="6.667"/>
	<line class="stroke" x1="11.667" y1="5" x2="11.667" y2="39.666"/>
	<line class="stroke" x1="11.667" y1="52.999" x2="11.667" y2="85"/>
	<g>
	<circle class="stroke" cx="45" cy="60.372" r="6.667"/>
	<line class="stroke" x1="45" y1="5" x2="45" y2="53.706"/>
	<line class="stroke" x1="45" y1="67.039" x2="45" y2="85"/>
	</g>
	<path class="stroke" d="M25,62.777"/>
	<circle class="stroke" cx="78.333" cy="22.333" r="6.667"/>
	<line class="stroke" x1="78.333" y1="5" x2="78.333" y2="15.734"/>
	<line class="stroke" x1="78.333" y1="29" x2="78.333" y2="85"/>
	</g>
	</svg>
	</div>
	<?php else: ?>
	<?php endif; ?>
</div>

	<div class="col-md-12 padding-0">
		<div class="col-md-4"></div>
		<div class="col-md-8">
			<h2 class="text-left with-icon"><?php the_sub_field('title'); ?></h2>
		</div>
	</div>

	<div class="col-md-4">
		<?php if(have_rows('bullets')): ?>
		<ul class="p-style">
		<?php while(have_rows('bullets')): the_row(); ?>
			<li><span><?php the_sub_field('bullet'); ?></span></li>
		<?php endwhile; ?>
		</ul>
		<?php endif; ?>
	</div>

	<div class="col-md-8">
		<?php the_sub_field('text'); ?>
	</div>


	</div></div>

	</section>
	<?php endwhile; ?>
	</div>

<?php endwhile; endif; ?>
<div class="edit-this">
	<?php edit_post_link(); ?>
</div>

<?php get_footer(); ?>
