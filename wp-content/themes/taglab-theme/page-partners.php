<!--The Name of the Template-->
<?php
/*
	Template Name: Partners Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on the Publications Page-->
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about the Page-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<div class="small-11 medium-10 small-centered columns">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<!--The Title-->
								<h1 class="small-12 paragraph-title"><?php the_title(); ?></h1>
								<!--The Paragraph-->
								<div class="small-12 medium-10 small-centered columns paragraph-content">
									<p><?php the_content(); ?></p>
								</div>
							<?php endwhile;?>
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>
						</div>				
					</div><!-- #content -->
				</div><!-- #primary -->
			</div>
		</div>

		<!-- Partner Logos -->
		<div class="small-12 small-centered columns partners-logoBox">
			<div class="row">					
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<div class="small-11 small-centered columns"  data-equalizer='grid'> 
							<!--Accessing the Posts from sponspors-->
							<?php $args = array( 'post_type' => 'sponsors',	'posts_per_page' => '-1'); ?>
							<?php $loop = new WP_Query( $args ); ?>
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type (sponsors)-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
							<!--Card Container-->
								<div class="small-12 medium-6 large-4 columns end">
									<div class="small-11 small-centered columns card Publication" data-equalizer-watch='grid'>
										<article class='post' data-equalizer-watch='grid'>
											<!--THUMBNAIL-->
											<!--Purpose: If there exists a thumbnail then display the thumbnail-->
											<?php if (has_post_thumbnail()) : ?>
												<?php $sponsor = '';
							 						  $sponsor = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    										?>
												<center>
													<div style='width: 100%;'>
														<div class='card-thumbnail-img'>
															<img src='<?php echo $sponsor; ?>' style='background-size: contain;'>
														</div>
													</div>	
												</center>
											<?php endif; ?>
										
											
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
<?php get_footer(); ?><!--The Name of the Template-->