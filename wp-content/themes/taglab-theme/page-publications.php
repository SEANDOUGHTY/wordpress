<!--The Name of the Template-->
<?php
/*
	Template Name: Publications Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on Each Page-->
<div class="content">
	<section class='row'>
		<div class='small-9 small-centered columns page-header'>
			<center>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<div class="small-12 small-centered columns news" data-equalizer>
							<!--The Title of the Publications Page-->
							<div class='Title'><h3><?php the_title();?> </h3></div>
							<div class="small-10 small-centered columns" >
								<!--Looping the posts of the News Page-->
								<?php $args = array( 'post_type' => 'Publications'); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<div class='small-12 medium-6 large-4 columns end' >
										<div class="small-11 small-centered columns card" data-equalizer-watch>
											<article class="post">
												<!--The Title-->
												<h2> <?php the_title(); ?></h2>
												<!--The Content-->
												<p> <?php the_excerpt(); ?></p>
												<a href='<?php the_permalink();?>'>Read the full article</a>
												<ul class='post-meta no-bullet'>
												<li class='category'>Related Links: <?php the_terms( $post->ID, 'connection', '', ', ', ' ' ); ?></li>
														<!-- <li class='date'>on <?php the_time('F j, Y'); ?></li> -->	
												</ul>
												<?php if (get_the_post_thumbnail()) : ?>
												<div class='img-container'>
													<?php the_post_thumbnail('large'); ?>
												</div>
												<?php endif; ?>
											</article>
										</div>
									</div>		
								<?php endwhile; ?>
								<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</center>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>