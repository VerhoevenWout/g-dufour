<?php /* Template Name: Team page */ ?>
	<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">

			<h1 class="pink" style="margin-top: 50px"><?php the_title(); ?></h1>
<div class="container">
<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">

				<?php the_content(); ?>

</div>
			</div>
</div>

		</article>
	
	
	
<section>
<div class="container-fluid">
<h2>Meet the Team</h2><div class="row text-center">
<?php while(have_rows('team_members')): the_row(); ?>
<div class="team-member">
<div class="overflow-hidden">
<div class="team-member__photo" style="background-image: url('<?php $image = get_sub_field('image'); echo $image['sizes']['team-photo'];?>');">
	
	<div class="team-member__overlay-text">
<div class="team-member__name"><?php the_sub_field('name'); ?></div>
<div class="team-member__position"><?php the_sub_field('position'); ?></div>
</div>
	</div></div>
	<div class="team-member__email">
		<div><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></div>
		<?php if(get_sub_field('phone')): ?><div><a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a></div><?php endif; ?>
	</div>
</div>
	<?php endwhile; ?>
	</div></div>
	</section>

	
		<?php endwhile; endif; ?>


<?php get_footer(); ?>


