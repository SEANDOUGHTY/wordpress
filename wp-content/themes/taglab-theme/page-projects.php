<!--The Name of the Template-->
<?php
/*
	Template Name: Projects Page
*/
?>
<!--Loading the header.php above each file-->
<?php get_header(); ?>
<!--The Content on the Publications Page-->
<div class="content">
	<section class='row'>
		<!--PAGE CONTENT-->
		<!--Purpose: Displays a small blurb about the Page-->
		<div class="row">
			<div class="small-12 small-centered columns paragraph">
				<div class="small-11 medium-10 large-8 small-centered columns">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!--The Title-->
						<h1 class="small-12 paragraph-title">Our Projects</h1>
						<!--The Paragraph-->
						<div class="small-12 large-9 small-centered columns paragraph-content">
							<p><?php the_content(); ?></p>
						</div>
					<?php endwhile; endif;?>
				</div>
			</div>
		</div>

		<div class="row">					
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
					<div class='small-11 small-centered columns page-content' data-equalizer='grid'>
						<!--The Grid of Posts-->
						<div class="small-12 large-10 small-centered columns projectsbox">
							<!--Accessing the Posts from projects-->
							<?php $args = array( 'post_type' => 'projects', 'orderby'   => 'menu_order', 'order' => 'ASC'); ?>
							<?php $loop = new WP_Query( $args ); ?>
							<!--THE LOOP-->
							<!--Purpose: To loop through all given posts of the given Post Type (projects)-->
							<!--Condition: The loop will end when there are no more posts-->
							<?php if ( $loop -> have_posts() ) : while ( $loop -> have_posts()) : $loop -> the_post(); ?>
								<!--Card Container-->
								<div class="small-12 medium-6 large-4 columns end">
									<div class="small-11 small-centered columns card" data-equalizer-watch='grid'>
										<article class='post' data-equalizer-watch='grid'>
										<!--THUMBNAIL-->
										<!--Purpose: If there exists a thumbnail then display the thumbnail-->
										<?php if (has_post_thumbnail()) : ?>
											<?php $thumbnail = '';
								        		$thumbnail = get_the_post_thumbnail($post->ID,'featured');
    										?>
											<div class="card-thumbnail">
												<div class='card-thumbnail-img' >
													 <?php echo $thumbnail; ?>
												</div>
											</div>	
										<?php endif; ?>
											
										<!--CARD CONTENT-->
										<!--Purpose: If there exists content display the content as an excerpt-->
										<div class='card-content'>
											<!--The Title-->
											<h2> <?php the_title();?> </h2>
											<!--CARD LINK-->
											<!--Purpose: Give the link to the full article-->
											<a class='card-link' href='<?php the_permalink();?>'>Explore</a>
										</div>
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
		</div>
	</section>
</div>
<!--Loading the footer.php above each file-->
<?php get_footer(); ?><!--The Name of the Template-->