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
				<div class="small-12 medium-8 small-centered columns">
				<h1 class="small-12 paragraph-title">Research for the journey through life</h1>
					<div class="small-12 medium-9 small-centered columns paragraph-content">
						<p>TAGlab works at the intersection of aging and technology, seeking to identify and address common issues of aging where technology can provide some benefit.</p>
						<p>We design aides, systems, and experiences that support aging throughout the life course with the goal of fostering a sense of community, identity, and autonomy for our users.</p>
						</div>
				</div>
			</div>
		</div><!-- End Paragraph -->
			
			<!-- Highlights Content -->
		<div class="row">	
			<div class="small-12 small-centered columns highlights" data-equalizer>
				<h1>Highlights</h1>
				
				<div class="small-10 small-centered columns" >
					<?php $c = 0; ?>
					<?php if ( have_posts() ) : while ( have_posts() && $c < 3) : the_post(); ?>
						<?php $c = $c + 1; ?> 
						<div class="small-12 medium-4 columns" data-equalizer-watch>
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
								?></p>	<a>Read the full article</a>
							</div>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div><!-- End Highlights Content -->
	</section>
</div>

<?php get_footer(); ?>