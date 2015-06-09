<?php get_header(); ?>
<div class="content">
	<section class='row'>
		<div class='small-9 small-centered columns page-header'><center>
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<h1> <?php the_title();?> </h1>
						<p> <?php the_content();?> </p>
					<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div><!-- #content -->
			</div><!-- #primary -->
		</center></div>
	</section>
	<section class='row'>
		<div class='page-content'>
		</div>
	</section>
</div>

<?php get_footer(); ?>