<?php
/*
	Template Name: Blog Page
*/
?>
<?php get_header(); ?>
<div class="content">
	<section class='row'>
		<div class='small-9 small-centered columns page-header'>
			<center>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class='small-12 columns end' data-equalizer-watch>
								<div class="small-11 small-centered columns card">
									<article class="post">
										<center>
											<!--The Title-->
											<h2> <?php the_title(); ?></h2>
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
											<ul class='post-meta no-bullet'>
												<li class='category'>Related Links: <?php the_category(', '); ?></li>
												<!-- <li class='date'>on <?php the_time('F j, Y'); ?></li> -->	
											</ul>
											<?php if (get_the_post_thumbnail()) : ?>
											<div class='img-container'>
												<?php the_post_thumbnail('large'); ?>
											</div>
											<?php endif; ?>
										</center>
									</article>
								</div>
							</div>
						<?php endwhile; ?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					</div><!-- #content -->
				</div><!-- #primary -->
			</center>
		</div>
	</section>
	<section class='row'>
		<div class='page-content'>
		</div>
	</section>
</div>

<?php get_footer(); ?>