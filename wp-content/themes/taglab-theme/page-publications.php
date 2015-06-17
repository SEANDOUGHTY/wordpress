<!--The Name of the Template-->
<?php
/*
	Template Name: Publication Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on Each Page-->
<div class="content">
	<!--The Title Banner-->
	<section class='row'>
		<div class='small-9 small-centered columns page-header Title'>
			<center>
				<!--Loop to get the Title and Content from each Post-->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h3 style='margin-top: 20px;'> <?php the_title();?> </h3>
					<p> <?php the_content();?> </p>
				<?php endwhile; ?>
				<!--If the page is blank-->
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</center>
		</div>
	</section>
	<!--The Content-->
	<section class='row'>
		<div class='small-9 small-centered columns page-content'>
			<center>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--The Grid of Posts-->
						<div class="row">
							<div class="small-10 small-centered columns"  data-equalizer='grid'>
								<!--Loop to get the Title and Content from each Post-->
								<?php $args = array( 'post_type' => 'publications'); ?>
								<?php $loop = new WP_Query( $args ); ?>
								<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
									<!--Card Container-->
									<div class='small-12 medium-6 large-4 columns end'>
										<div class="small-11 small-centered columns card panel"  data-equalizer-watch='grid'>
											<article class="post panel"  data-equalizer-watch='grid'>
												<!--The Date-->
												<p class='date'> <?php the_time('F Y'); ?> </p>
												<!--The Title-->
												<h6> <?php the_title(); ?></h6>
												<!--The Content-->
												<p> <?php the_excerpt(); ?></p>
												<a href='<?php the_permalink();?>'>Read the full article</a>
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
			</center>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>