<!--The Name of the Template-->
<?php
/*
	Template Name: About Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on Each Page-->
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about TAGlab-->
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

		<div class="row">					
			<div class="small-11 small-centered columns highlights"  data-equalizer='reel'>
				<!--EXPLORE TITLE-->
				<h1>Explore</h1>
				<div class='small-12 large-10 small-centered columns'>
					<!--Accessing the Posts from Projects, Publications, news_feed Feed, People-->
					<?php $args = array( 'post_type' => array('projects','publications','news_feed','people')); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<!--THE LOOP-->
					<!--Purpose: To loop through all given posts of the given Post Type-->
					<!--Condition: The loop will end when there are no more posts-->
					<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts() && $c < 3) : $loop -> the_post(); ?>
						<!--If the Post is a Explore then Display-->
						<?php if(has_term('AboutPageCards','connection')): ?>
							<?php $c = $c + 1; ?> 
							<div class="small-12 medium-6 large-4 columns end">
								<div class="small-11 small-centered columns card" data-equalizer-watch='reel'>
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
											<!--The Content-->
											<p> <?php the_excerpt(); ?></p>
											<!--CARD LINK-->
											<!--Purpose: Give the link to the full article-->
											<a href='<?php the_permalink();?>'>Read Full Article</a>
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
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>