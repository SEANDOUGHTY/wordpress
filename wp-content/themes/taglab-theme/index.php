<?php
/*	Name: Index
 *	Purpose: To build the DEFAULT Page/Post template of the website if Page or Home Do Not Exist 
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
						<div class="small-11 medium-10 large-8 small-centered columns">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<!--The Title-->
								<h1 class="small-12 paragraph-title"><?php the_title(); ?></h1>
								<!--The Paragraph-->
								<div class="small-12 large-9 small-centered columns paragraph-content">
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
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>