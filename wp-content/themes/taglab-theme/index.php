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
		<div class='small-9 small-centered columns page-header'>
			<center>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">
						<!--Loop to get the Title and Content from each Post-->
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<h1> <?php the_title();?> </h1>
							<p> <?php the_content();?> </p>
						<?php endwhile; ?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</center>
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?>