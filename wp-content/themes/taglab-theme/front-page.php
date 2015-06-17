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
			<div class="small-12 small-centered columns highlights" data-equalizer>
				<h1>Highlights</h1>
				<h2>This is header 2</h2>
				<h3>This is header 3</h3>
				<h4>This is header 4</h4>
				<h5>This is header 5</h5>
				<h6>This is header 6</h6>
				<div class="small-10 small-centered columns" >
					<!--Looping the posts of the News Page-->
					<?php $args = array( 'post_type' => array('news_feed','publications')); ?>
					<?php $loop = new WP_Query( $args ); ?>
					<?php $c = 0; ?>
					<?php if ($loop -> have_posts() ) : while ( $loop -> have_posts() && $c < 3) : $loop -> the_post(); ?>
						<?php if(has_term('highlight','connection')): ?>
							<?php $c = $c + 1; ?> 
							<div class="small-12 medium-4 columns end" data-equalizer-watch>
								<div class="small-11 small-centered columns card">
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
									?></p>	<a href='<?php the_permalink();?>'>Read the full article</a>
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