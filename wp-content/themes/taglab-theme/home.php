<?php
/**	Name: Home
 *	Purpose: To build the DEFAULT blog page for the website 
 */
?>
<?php
/*
	Template Name: Blog Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on Blog Page-->
<div class="content">
	<section class='row'>
		<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about the Posts Page-->
		<div class="row">					
			<div class='small-12 small-centered columns page-content'>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="small-11 large-10 small-centered columns"  data-equalizer='grid'>
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type (DEFAULT: posts)-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
								<!--Card Container-->
								<div class="small-12 medium-6 large-4 columns end">
									<div class="small-11 small-centered columns card" data-equalizer-watch='grid'>
										<article class='post' data-equalizer-watch='grid'>
										<!--THUMBNAIL-->
										<!--Purpose: If there exists a thumbnail then display the thumbnail-->
										<?php if (has_post_thumbnail()) : ?>
											<?php $thumbnail = '';
								        		$thumbnail = get_the_post_thumbnail($post->ID,'featured');
    										?>
											<div class="card-thumbnail">
												<div class='card-thumbnail-img' >
													 <?php echo $thumbnail; ?>
												</div>
											</div>	
										<?php endif; ?>
											
										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
										<div class='card-content'>
											<!--The Title-->
											<h2> <?php the_title();?> </h2>
											<!--The Excerpt-->
											<p> <?php the_excerpt(); ?></p>
											<!--CARD LINK-->
											<!--Purpose: Give the link to the full article-->
											<a class='card-link' href='#' data-reveal-id="myModal<?php echo $cardNum; ?>">Read Full Article</a>
											<div id="myModal<?php echo $cardNum; ?>" class="reveal-modal medium " data-reveal aria-labelledby="modalTitle<?php echo $cardNum; ?>" aria-hidden="true" role="dialog">
												<h2 id="modalTitle<?php echo $cardNum; ?>"><?php the_title(); ?></h2>
												<p><?php
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
												<a class="close-reveal-modal" aria-label="Close">&#215;</a>
											</div>
										</div>
										</article>
									</div>
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
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>