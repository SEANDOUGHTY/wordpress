<?php
/*	Name: Front-Page
 *	Purpose: To build the front-page (HOMEPAGE) of the website 
 */
?>
<!--Get the code from the header.php file-->
<?php get_header(); ?>
<!--HOME HEADER-->
<!--Purpose: Displays the HOME page banner with the TAGlab logo and name-->
<div class="home-header"></div>
		
<div class="content">
	<section class='row'>
		<!--HOMEPAGE CONTENT-->
		<!--Purpose: Displays a small blurb about TAGlab-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<div class="small-11 medium-10 large-8 small-centered columns">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<!--The Title-->
								<h1 class="small-12 paragraph-title"><?php the_title(); ?></h1>
								<!--The Paragraph-->
								<div class="small-12 large-9 small-centered columns paragraph-content">
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
			
		<!--HIGHLIGHT REEL-->
		<!--Purpose: Displays at most 3 highlights from TAGlab (Articles or Publications)-->
		<div class="row">	
			<div class="small-11 small-centered columns highlights" data-equalizer='reel'>
				<!--HIGHLIGHTS TITLE-->
				<h1>Highlights</h1>
				<div class="small-12 large-10 small-centered columns" >
					<!--Accessing the Posts from news_feed, publications, and projects-->
					<?php $args = array( 'post_type' => array('news_feed','publications','projects')); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<?php $c = 0; ?>
					<!--THE LOOP-->
					<!--Purpose: To loop through all given posts of the given Post Type-->
					<!--Condition: The loop will end when there are no more posts or there are 3 highlights -->
					<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts() && $c < 3) : $loop -> the_post(); ?>
						<!--If the Post is a Highlight then Display-->
						<?php if(has_term('HomePageCards','connection')): ?>
							<?php $c = $c + 1; ?> 
							<div class="small-12 medium-6 large-4 columns end">
								<?php $type = get_post_type(); ?>
								<?php if ($type == 'Publications'): ?>
									<div class="small-11 small-centered columns card Publication" data-equalizer-watch='reel'>
								<?php else: ?>
									<div class="small-11 small-centered columns card" data-equalizer-watch='reel'>
								<?php endif; ?>
									<article class='post' data-equalizer-watch='reel'>
										<!--THUMBNAIL-->
										<!--Purpose: If there exists a thumbnail then display the thumbnail-->
										<?php if (has_post_thumbnail()) : ?>
											<?php $thumbnail = '';
								        		  $thumbnail = wp_get_attachment_url(get_post_thumbnail_id($post->ID,'featured'));
	    									?>
											<div class="card-thumbnail">
												<div class='card-thumbnail-img' style='background-image: url(<?php echo $thumbnail; ?>); height:12em; '>
													 
												</div>
											</div>	
										<?php endif; ?>
										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
										<div class='card-content'>
											<!--The Title-->
											<h2> <?php the_title();?> </h2>
											<?php if ('news_feed'==$type): ?>
												<!--The Content-->
												<p> <?php the_excerpt(); ?></p>
												<!--CARD LINK-->
												<!--Purpose: Give the link to the full article-->
												<a class='card-link' href='#' data-reveal-id="myModal<?php echo $c; ?>">Read Full Article</a>
												<div id="myModal<?php echo $c; ?>" class="reveal-modal medium " data-reveal aria-labelledby="modalTitle<?php echo $c; ?>" aria-hidden="true" role="dialog">
													<h2 id="modalTitle<?php echo $c; ?>"><?php the_title(); ?></h2>
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
											<?php elseif ('publications'==$type): ?>
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
											<?php elseif ('projects'==$type): ?>
												<!--The Content-->
												<p> <?php the_excerpt(); ?></p>
												<!--CARD LINK-->
												<!--Purpose: Give the link to the full article-->
												<a class='card-link' href='<?php the_permalink();?>'>Explore</a>
											<?php endif; ?>
										</div>
									</article>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>
<!--Get the code from the footer.php file-->
<?php get_footer(); ?>