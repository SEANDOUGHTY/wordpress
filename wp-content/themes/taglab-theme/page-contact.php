<?php
/*
 * Template Name: Contact Page
 */
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on Each Page-->
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about TAGlab-->
		<div class="row" style='margin-bottom: 3em;'>
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!--The Paragraph-->
						<?php the_content(); ?></p>
					<?php endwhile;?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div><!-- #content -->
			</div><!-- #primary -->
			<div style='margin-top: 0em; margin-bottom: 3em;' class="small-12 medium-10 small-centered columns contact-mapBox" data-equalizer='Card'>
				<div class="small-12 large-4 columns card" data-equalizer-watch='Card'>
					<div class="card-thumbnail">
						<div class="card-thumbnail-img tb-bahen"></div>
					</div>
					<div class="card-content">
						<h2>Technologies for Aging Gracefully Lab</h2>
						<p>Department of Computer Science <br> 
							University of Toronto <br>
							Bahen Centre for Information Technology <br>
							Room 7201 <br>
							40 St. George Street <br> Toronto, Ontario M5S 2E4</p>
					</div>
				</div>
				<div class="small-12 large-8 columns contact-map card" data-equalizer-watch='Card'>
					<iframe
						width="750"
						height="550"
						frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAtVHtQRods81pERg3ZOQb3-MObTQ6HQuY
							&q=Bahen Centre,Toronto+ON" allowfullscreen>
					</iframe>
				</div>
			</div>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>