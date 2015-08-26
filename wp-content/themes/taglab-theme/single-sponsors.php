<!--The Sponnsor Page-->
<?php get_header(); ?>
<!--The Content on the Single Sponsors Page-->
<div class="content">
	<section class='row'>
		<div class="row">					
			<div class='small-12 small-centered columns page-content'>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="small-11 large-10 small-centered columns">
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type (sponsors)-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
								<!--Card Container-->
								<div class="small-12 medium-6 large-4 small-centered columns card Publication">
									<article class='post'>
									<!--THUMBNAIL-->
									<!--Purpose: If there exists a thumbnail then display the thumbnail-->
									<?php if (has_post_thumbnail()) : ?>
										<?php $sponsor = '';
							 				  $sponsor = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    								?>
	    								<?php $link = get_post_custom_values( 'Link' )[0]; ?>
										<center>
											<div style='width: 100%;'>
												<div class='card-thumbnail-img'>
													<a href='<?php echo $link; ?>'>
														<img src='<?php echo $sponsor; ?>' style='background-size: contain;'>
													</a>
												</div>
											</div>	
										</center> 	
									<?php endif; ?>
										
									<!--CARD CONTENT-->
									<!--Purpose: If there exists content display the content as an excerpt-->
									<div class='card-content'>
										<!--The Title-->
										<h2 style='padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;'> <?php the_title();?> </h2>
										<!--The Content-->
										<p style='padding-top: 0; padding-bottom: 0; margin-top: 0; margin-bottom: 0;'> <?php
														if (is_sticky()) {
  															global $more;    // Declare global $more (before the loop).
  															$more = 1;       // Set (inside the loop) to display all content, including text below more.
  															the_content();
														} else {
  															global $more;
  															$more = 0;
  															the_content('Read the rest of this entry »');
														}
												?></p>
									</div>
									</article>
								</div>
							<?php endwhile; ?>
							<!--If the page is blank-->
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>