<?php get_header(); ?>
<div class="content">
	<section class='row'>
		<div class="home-header">
			<div class='row'>
				<div class="small-12 columns">
					<h4>TAGlab</h4>
					<h5>Technologies for Aging Gracefully</h5>
				</div>
			</div>
		</div>
		
		<!-- Page Content -->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<div class="small-12 medium-8 small-centered columns Title">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="small-12 medium-9 small-centered columns paragraph-content">
							<p><?php the_content(); ?></p>
						</div>
					<?php endwhile; endif;?>
				</div>
			</div>
		</div><!-- End Paragraph -->
			
		<!-- Highlights Content -->
		<div class="row">	
			<div class="small-12 small-centered columns highlights" data-equalizer='reel'>
				<h1>Highlights</h1>
				<div class="small-10 small-centered columns" >
					<!--Looping the posts of the News and Publication Page-->
					<?php $args = array( 'post_type' => array('news_feed','publications')); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<?php $c = 0; ?>
					<!--At most 3 Hightlights-->
					<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts() && $c < 3) : $loop -> the_post(); ?>
						<!--If the News Article or Publication is a Highlight then Display-->
						<?php if(has_term('highlight','connection')): ?>
							<?php $c = $c + 1; ?> 
							<div class="small-12 medium-4 columns end">
								<div class="small-11 small-centered columns card" data-equalizer-watch='reel'>
									<!--If there is a thumbnail for the post-->
									<article class='post' data-equalizer-watch='reel'>
										<?php if (has_post_thumbnail()) : ?>
											<div class='img-container'>
												<?php the_post_thumbnail('small'); ?>
											</div>
										<?php endif; ?>
										<p class='date'> <?php the_time('F Y'); ?> </p>
										<!--The Title-->
										<h6> <?php the_title();?> </h6>
										<!--The Content-->
										<p> <?php the_excerpt(); ?></p>
										<a href='<?php the_permalink();?>'>Read Full Article</a>
									</article>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- End Highlights Content -->
	</section>
</div>

<?php get_footer(); ?>