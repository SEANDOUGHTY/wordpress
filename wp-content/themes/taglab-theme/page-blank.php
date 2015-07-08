<?php
/*
 * Template Name: Blank Page
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
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>