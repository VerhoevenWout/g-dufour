<?php get_header(); ?>



			<div class="top-banner" style="background-image: url('<?php $image = get_field('top_banner','options'); echo $image['sizes']['large'];?>');"></div>

		
		
	<div class="container"><div class="row"><div class="col-md-8 col-md-offset-2">
			  <h1>Thank you <?php echo $_GET["vname"]; ?></h1>
				  <?php if($_GET["state"] == 'success'): 
							
								$output_messgae = the_field('contact_success');

						else: 
						the_field('contact_fail');
					endif; ?>
			  </div>
			 </div>
</div>
	


<?php get_footer(); ?>