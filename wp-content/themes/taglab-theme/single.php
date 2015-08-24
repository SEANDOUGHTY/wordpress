<!--The Single Page-->
<?php get_header(); ?>
<!--The Content on the Single Page-->
<div class="content">
	<section class='row'>
		<div class="row">					
			<div class='small-12 small-centered columns page-content'>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="small-11 medium-8 small-centered columns">
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
								<!--Card Container-->
								<div class="small-11 small-centered columns card">
									<article class='post' data-equalizer-watch='grid'>
									<!--CARD CONTENT-->
									<!--Purpose: If there exists content display the content as an excerpt-->
									<div class='card-content'>
										<!--The Title-->
										<h2> <?php the_title();?> </h2>
										<!--The Content-->
										<p> <?php
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