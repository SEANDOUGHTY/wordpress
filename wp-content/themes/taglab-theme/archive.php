<?php
/*
	Template Name: Blog Page
*/
?>
<?php get_header(); ?>
<div class="content">
	<section class='row'>
		<div class='small-9 small-centered columns page-header'><center>
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
					<div class="small-12 small-centered columns news" data-equalizer>
						<h1><?php wp_title(''); ?></h1>
						<div class="small-10 small-centered columns" >
							<?php if ( have_posts() ) : while ( have_posts()) : the_post(); ?>
								<div class='small-12 medium-4 columns end' data-equalizer-watch>
									<div class="small-11 small-centered columns card">
										<article class="post">
										<h2> <?php the_title();?> </h2>
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
										?></p>	<a>Read the full article</a>
										<ul class='post-meta no-bullet'>
											<li class='author'>
												<span class='wp-author small'>
													<?php echo get_avatar(get_the_author_meta('ID'),24); ?>	
												</span>
												by <?php the_author_posts_link(); ?>
											</li>
											<li class='category'>in <?php the_category(', '); ?></li>
											<li class='date'>on <?php the_time('F j, Y'); ?></li>	
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
						</div><!-- #content -->
					</div><!-- #primary -->
				</div>
			</div>
		</center></div>
	</section>
</div>

<?php get_footer(); ?>