<?php
/*
	Template Name: Blog Page
*/
?>
<?php get_header(); ?>
<!--The Content on the Single Page-->
<div>
	<section class='row'>
		<div class="row">					
			<div class='small-12 small-centered columns page-content'>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="small-11 large-10 small-centered columns">
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
								<!--Card Container-->
								<div>
										<article data-equalizer-watch='grid'>

										<div class='personcard'>

										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
											<div class='card-content'>
											<!--The Title-->
											<div class='personimage'> 
												<?php the_post_thumbnail(); ?> 
											</div>
											<div class='personcontent'>
												<h2> <?php the_title();?> </h2>
												<!--The Content-->
												<p class="personpage"> <?php the_content();?> </p>
											</div>
										</div>

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